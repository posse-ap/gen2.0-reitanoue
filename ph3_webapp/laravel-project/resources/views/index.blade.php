<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>POSSEAPP</title>
    <link rel='stylesheet' href='./css/index.css'>
    <link rel='stylesheet' href='./css/reset.css'>
    <link rel='stylesheet' href='./css/responsive.css'>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://kit.fontawesome.com/77dc7f4ff2.js" crossorigin="anonymous"></script>
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.1.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

</head>

<body>



    <!-- ヘッダー -->
    <header class='header'>
        <div class='header__inner'>
            <div class='header__inner__logo'>
                <img src='https://posse.anti-pattern.co.jp/img/posseLogo.png' alt='POSSEのロゴ'>
            </div>
            <div class='header__inner__time'>
                <p>4th week</p>
            </div>
            <p>welcome:{{ $user->email }}</p>
        </div>
        <button id='openModal' class='header__inner__button'>記録・投稿</button>
    </header>
    <!-- 大枠 -->

    <!-- 大枠の中身 -->
    <section class='main__inner'>
        <!-- 時間と棒グラフ -->
        <section class='main__inner__1'>
            <!-- 3つの時間ボックス -->
            <ul class='main__inner__1__time'>
                <li class='main__inner__1__time__box section__box'>
                    <p class='main__inner__1__time__box__time__title'>Today</p>
                    <p class='main__inner__1__time__box__time__result'>{{ $today }}</p>
                    <p class='main__inner__1__time__box__time__unit'>hour</p>
                </li>
                <li class='main__inner__1__time__box section__box'>
                    <p class='main__inner__1__time__box__time__title'>Month</p>
                    <p class='main__inner__1__time__box__time__result'>{{ $month }}</p>
                    <p class='main__inner__1__time__box__time__unit'>hour</p>
                </li>
                <li class='main__inner__1__time__box section__box'>
                    <p class='main__inner__1__time__box__time__title'>Total</p>
                    <p class='main__inner__1__time__box__time__result'>{{ $total }}</p>
                    <p class='main__inner__1__time__box__time__unit'>hour</p>
                </li>
            </ul>
            <!-- 棒グラフ -->
            <div class='main__inner__1__timeGraph section__box'>
                <canvas id='bargraph-area' name='barGraph-area'></canvas>
            </div>
        </section>
        <!-- 学習言語と学習コンテンツ -->
        <section class='main__inner__2'>
            <!-- 学習言語 -->
            <div class='main__inner__2__box section__box'>
                <h2 class='float'>学習言語</h2>
                <div class='main__inner__2__box__graph'>
                    <canvas id='language-graph-area'></canvas>
                </div>

                @foreach ($language_titles as $language)
                    <div class='float flex main__inner__2__box__language' style='align-items: center;'>
                        <span class='main__inner__2__box__circle' style='background: {{ $language->color }};'></span>
                        <h4 style='font-family:”Google Sans”'>{{ $language->language }}</h4>
                    </div>
                @endforeach
            </div>

            <!-- 学習コンテンツ -->
            <div class='main__inner__2__box section__box'>
                <h2 class='float'>学習コンテンツ</h2>
                <div class='main__inner__2__box__graph'>
                    <canvas id='content-graph-area'></canvas>
                </div>

                @foreach ($content_titles as $content)
                    <div class='float flex main__inner__2__box__content' style='align-items: center;'>
                        <span class='main__inner__2__box__circle' style='background: {{ $content->color }};'></span>
                        <h4 style='font-family:”Google Sans”'>{{ $content->content }}</h4>
                    </div>
                @endforeach
            </div>
        </section>
    </section>
    <div class="section__box todays__record">
        <h4> {{ now()->format('Y年m月d日') }} の記録</h4>
        <ul class="flex record__title">
            <li>No.</li>
            <li>学習時間</li>
            <li>学習コンテンツ</li>
            <li>学習言語</li>
        </ul>
        <ul class="flex">
            <li>
                @foreach($today_study_records as $today_study_record)
                <div>{{ $loop->iteration }}</div>
                @endforeach
            </li>
            <li>

                @foreach($today_study_records as $today_study_record)
                <div>{{ $today_study_record->study_hour }}h</div>
                @endforeach
            </li>
            <li>

                @foreach($today_study_records as $today_study_record)
                <div>{{ $today_study_record->content }}</div>
                @endforeach
            </li>
            <li>

                @foreach($today_study_records as $today_study_record)
                <div>{{ $today_study_record->language }}</div>
                @endforeach
            </li>
            
        </ul>
    </div>

    <footer>
        <div class='foot-wrapper'>
            <div class='foot-nav'>
                <i class='fas fa-chevron-left' style='color: #026CBA;'></i>
                <p>{{ now()->format('Y年m月') }}</p>
                <i class='fas fa-chevron-right' style='color: #A3C1D6'></i>
                <button id='openModalResponsive' class='responsive__inner__button'>記録・投稿</button>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <i class="fa-solid fa-right-from-bracket logout__button">
            <input type="submit" value="ログアウト" type="hidden">
            </i>
        </form>
    </footer>



    <!-- モーダルエリアここから -->
    <section id='modalArea' class='modalArea'>
        <div id='modalBg' class='modalBg'></div>
        <div class='modalWrapper' id="modalWrapper">
            <div class='modalContents' id="modalContents">
                <form ction="/{{ request()->path() }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex modal-flex">
                        <div class='modal-content-1'>
                            <!-- 学習日 -->
                            <div class='grid' id="appendTo">
                                <h3 class='modal-content-title float'>
                                    <label for="studyDate">
                                        学習日
                                    </label>
                                </h3>
                                <input type="text" name="study_date" id="studyDate" autocomplete='date'
                                    class='modal-study-date'>
                            </div>
                            <!-- 学習コンテンツ -->
                            <div class='grid'>
                                <h3 class='modal-content-title float'>学習コンテンツ</h3>
                                <div class='float'>
                                    @foreach ($content_titles as $content)
                                        <label for="{{ $content->content }}" class="modal-checkbox">
                                            <input id="{{ $content->content }}" type="radio" name="content"
                                                value="{{ $content->id }}" required>
                                            <i class='fa-solid fa-circle-check checkmark'></i>
                                            {{ $content->content }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- 学習言語 -->
                            <div class='grid'>
                                <h3 class='modal-content-title float'>学習言語</h3>
                                <div class='float'>
                                    @foreach ($language_titles as $language)
                                        <label for="{{ $language->language }}" class="modal-checkbox">
                                            <input id="{{ $language->language }}" type="radio" name="language"
                                                value="{{ $language->id }}" required>
                                            <i class='fa-solid fa-circle-check checkmark'></i>
                                            {{ $language->language }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class='modal-content-2'>
                            <div class='grid'>
                                <h3 class='modal-content-title float'> 学習時間</h3>
                                <label for='time'>
                                    <input type='number'
                                        onkeyup='value = value.length > 5 ? value.slice(0,5): value;' max='99999'
                                        name='study_hour' autocomplete='time' class='modal-study-time'
                                        id='time'>
                                </label>
                            </div>
                            <div class='grid'>
                                <h3 class='modal-content-title float'>Twitter用コメント</h3>
                                <textarea id='twitter_com' maxlength="140" placeholder="140文字以内"></textarea>
                                <div>
                                    <label for='tweet'>
                                        <input type='checkbox' name='share-box' value='true' id='tweet'
                                            class='stretched-link'>
                                        <i class='fa-solid fa-circle-check checkmark' id='tweetCheckmark'></i>
                                    </label>
                                    Twitterにシェアする
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id='modal-inner-button' class='modal-inner-button' type="submit" value="記録・投稿">
                </form>
                <!-- カレンダー画面の中に表示される決定ボタン 下一行-->
                <button id="determination__button" class="calender__modal__determination__button"><a
                        href="#modalArea">決定</a></button>
            </div>
            <div id='closeModal' class='closeModal'>
                ×
            </div>
        </div>
    </section>
    <!-- モーダルエリアここまで -->


    <!-- ローディング画面ここから -->
    <section id='loading' class='modalArea'>
        <div class='modalBg'></div>
        <div class='modalWrapper'>
            <div class='loader-wrap'>
                <div class='loader'>Loading...</div>
            </div>
        </div>
    </section>

    <!-- 完了画面ここから -->
    <section id='modalDone' class='modalArea'>
        <div class='modalBg'></div>
        <div class='modalWrapper'>
            <div class='modalContentsDone'>
                <span class='circle'>
                    <div class='check'></div>
                </span>
                <div class='modal-done-text'>
                    <h4> AWESOME!</h4>
                    <h3>記録・投稿<br>完了しました</h3>
                </div>
            </div>
            <div id='closeModalDone' class='closeModal'>
                ×
            </div>
        </div>
    </section>
    <!-- 完了画面ここまで -->

    <!-- カレンダー -->
    <div id="calendar"></div>
    <script src='./js/index.js' type='text/javascript'></script>
    <script>
        "use strict";
        // 学習時間棒グラフ
        Chart.register(ChartDataLabels);
        var ctx0 = document.getElementById("bargraph-area").getContext("2d");
        var myBarChart = new Chart(ctx0, {
            type: "bar",
            //凡例のラベル
            data: {
                labels: [
                    @for ($i = 1; $i < 32; $i++)
                        "{{ $i }}",
                    @endfor
                ],
                datasets: [{
                    xAxisID: "x",
                    yAxisID: "y",
                    label: "学習時間",

                    data: [
                        @foreach ($bars as $bar)
                            {{ $bar->sum_hour }},
                        @endforeach
                    ],

                    backgroundColor: "#0f71bd",
                    borderWidth: 1,
                }, ],
            },
            options: {
                plugins: {
                    legend: false,
                },

                scales: {
                    display: true,
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        grid: {
                            display: false,
                        },
                        display: true,
                        stacked: true,
                        legend: false,
                        beginAtZero: true,
                        gridLines: {
                            drawBorder: false,
                            display: false,
                            title: "",
                            format: "#.#h",
                        },
                        ticks: {
                            display: true,
                            stepSize: 2,
                            // 目盛に記号を入れる
                            callback: function(value) {
                                return value + "h";
                            },
                        },
                    },
                },
            },
        });






        // 学習言語グラフ
        let languageStudy = [
            @foreach ($languages as $language)
                {{ $language->sum_hour }},
            @endforeach
        ];
        let sumLanguageStudy = languageStudy.reduce(function(sum, acc) {
            return sum + acc;
        });


        var ctx1 = document.getElementById("language-graph-area").getContext("2d");
        var myBarChart = new Chart(ctx1, {
            type: "doughnut",
            //凡例のラベル
            data: {
                labels: [
                    'CSS', 'HTML', 'Javascript', 'Laravel', 'PHP', 'SHELL', 'SQL', 'その他'
                ],
                datasets: [{
                    label: "学習言語",
                    data: [
                        @foreach ($languages as $language)
                            {{ $language->sum_hour }},
                        @endforeach
                    ],
                    datalabels: {
                        color: "#ffffff",
                        formatter: function(value, context) {
                            return Math.floor(value / sumLanguageStudy * 100) + "%";
                        }
                    },
                    backgroundColor: [
                        "#0f70bd",
                        "#0445ec",
                        "#b29ef3",
                        "#3005c0",
                        "#4a17ef",
                        "#3ccefe",
                        "#20bdde",
                        "#6c46eb",
                    ],
                    borderColor: 'transparent'
                }, ],
            },
            options: {
                plugins: {
                    legend: false,
                    labels: {
                        render: 'percentage',
                    }
                },

            },
        });


        // 学習コンテンツグラフ
        let contentStudy = [
            @foreach ($contents as $content)
                {{ $content->sum_hour }},
            @endforeach
        ];
        let sumContentStudy = contentStudy.reduce(function(acc, sum) {
            return acc + sum;
        });
        var ctx2 = document.getElementById("content-graph-area").getContext("2d");
        var myBarChart = new Chart(ctx2, {
            type: "doughnut",
            //凡例のラベル
            data: {
                labels: [
                    'N予備校', 'POSSE課題', 'ドットインストール'
                ],
                datasets: [{
                    label: "学習コンテンツ",
                    data: [
                        @foreach ($contents as $content)
                            {{ $content->sum_hour }},
                        @endforeach
                    ],
                    datalabels: {
                        color: "#ffffff",
                        formatter: function(value, context) {
                            return Math.floor(value / sumContentStudy * 100) + "%";
                        }
                    },
                    backgroundColor: [
                        "#0445ec",
                        "#0f70bd",
                        "#20bdde"
                    ],
                    borderColor: 'transparent'
                }, ],
            },
            options: {
                plugins: {
                    legend: false,
                },

            },
        });
    </script>
</body>


</html>
