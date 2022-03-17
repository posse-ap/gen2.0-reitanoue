

<?php
require("./dbconnect.php");
require("./chart.php");
?>

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
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.4/css/all.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css'>
  <script src='https://cdn.jsdelivr.net/npm/flatpickr'></script>
  <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
  <script src='https://npmcdn.com/flatpickr/dist/flatpickr.min.js'></script>
  <script src='https://npmcdn.com/flatpickr/dist/l10n/ja.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>

</head>

<body>



  <!-- ヘッダー -->
  <div class='header'>
    <div class='header__inner'>
      <div class='header__inner__logo'>
        <img src='https://posse.anti-pattern.co.jp/img/posseLogo.png' alt='POSSEのロゴ'>
      </div>
      <div class='header__inner__time'>
        <h2>4th week</h2>
      </div>
    </div>
    <button id='openModal' class='header__inner__button'>記録・投稿</button>
  </div>
  <!-- 大枠 -->

  <!-- 大枠の中身 -->
  <section class='main__inner'>
    <!-- 時間と棒グラフ -->
    <section class='main__inner__1'>
      <!-- 3つの時間ボックス -->
      <ul class='main__inner__1__time'>
        <li class='main__inner__1__time__box section__box'>
          <p class='main__inner__1__time__box__time__title'>Today</p>
          <p class='main__inner__1__time__box__time__result'>3</p>
          <p class='main__inner__1__time__box__time__unit'>hour</p>
        </li>
        <li class='main__inner__1__time__box section__box'>
          <p class='main__inner__1__time__box__time__title'>Month</p>
          <p class='main__inner__1__time__box__time__result'>120</p>
          <p class='main__inner__1__time__box__time__unit'>hour</p>
        </li>
        <li class='main__inner__1__time__box section__box'>
          <p class='main__inner__1__time__box__time__title'>Total</p>
          <p class='main__inner__1__time__box__time__result'>1348</p>
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
          <canvas id='language-graph'></canvas>
        </div>

        <div class='float flex main__inner__2__box__language' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #0345EC;'></span>
          <h4 style='font-family:”Google Sans”'>JavaScript</h4>
        </div>
        <div class='float flex main__inner__2__box__language' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #0F71BD;'></span>
          <h4>CSS</h4>
        </div>
        <div class='float flex main__inner__2__box__language' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #20BDDE;'></span>
          <h4>PHP</h4>
        </div>
        <div class='float flex main__inner__2__box__language' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #3CCEFE;'></span>
          <h4>HTML</h4>
        </div>
        <div class='float flex main__inner__2__box__language' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #20BDDE;'></span>
          <h4>Laravel</h4>
        </div>
        <div class='float flex main__inner__2__box__language' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #6D46EC;'></span>
          <h4>SQL</h4>
        </div>
        <div class='float flex main__inner__2__box__language' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #4A17EF;'></span>
          <h4>SHELL</h4>
        </div>
        <div class='float flex main__inner__2__box__language' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #3105C0;'></span>
          <h4>情報システム基礎知識（その他）</h4>
        </div>
      </div>

      <!-- 学習コンテンツ -->
      <div class='main__inner__2__box section__box'>
        <h2 class='float'>学習コンテンツ</h2>
        <div class='main__inner__2__box__graph'>
          <canvas id='content-graph'></canvas>
        </div>
        <div class='flex main__inner__2__box__content' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #0345EC;'></span>
          <h4>ドットインストール</h4>
        </div>
        <div class='flex main__inner__2__box__content' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #0F71BD;'></span>
          <h4>N予備校</h4>
        </div>
        <div class='flex main__inner__2__box__content' style='align-items: center;'>
          <span class='main__inner__2__box__circle' style='background: #20BDDE;'></span>
          <h4>POSSE課題</h4>
        </div>
      </div>
    </section>
  </section>

  <footer>
    <div class='foot-wrapper'>
      <div class='foot-nav'>
        <i class='fas fa-chevron-left' style='color: #026CBA;'></i>
        <h1>2020年4月</h1>
        <i class='fas fa-chevron-right' style='color: #A3C1D6'></i>
        <button id='openModal' class='responsive__inner__button'>記録・投稿</button>
        <!-- <a id='responsive_record_button' class='responsive__inner__button'>記録・投稿</a> -->
      </div>
    </div>
  </footer>



  <!-- モーダルエリアここから -->
  <section id='modalArea' class='modalArea'>
    <div id='modalBg' class='modalBg'></div>
    <div class='modalWrapper'>
      <div class='modalContents'>
        <div class='modal-content-1'>
          <!-- 学習日 -->
          <div class='grid'>
            <h3 class='modal-content-title float'>学習日</h3>
            <input type='date' name='study-date' autocomplete='date' class='modal-study-date'>
          </div>
          <!-- 学習コンテンツ -->
          <div class='grid'>
            <h3 class='modal-content-title float'>学習コンテンツ（複数選択可）</h3>
            <div class='float'>
              <div class='float'>
                <label class='modal-checkbox' for='nyobi ' id='content-checkbox-0'>
                  <div id='clicked_checkbox_0' class='modal-checkbox__circle'>
                    <input type='checkbox' name='study-contents' value='nyobi' id='nyobi'><span class='modal-checkbox__checkbox__check'></span>
                  </div>N予備校
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='.install' id='content-checkbox-1'>
                  <div id='clicked_checkbox_1' class='modal-checkbox__circle'>
                    <input type='checkbox' name='study-contents' value='.install' id='.install'><span class='modal-checkbox__checkbox__check'></span>
                  </div>ドットインストール
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='posse-task' id='content-checkbox-2'>
                  <div id='clicked_checkbox_2' class='modal-checkbox__circle'>
                    <input type='checkbox' name='study-contents' value='posse-task' id='posse-task'><span class='modal-checkbox__checkbox__check'></span>
                  </div>POSSE課題
                </label>
              </div>
            </div>
          </div>

          <!-- 学習言語 -->
          <div class='grid'>
            <h3 class='modal-content-title float'>学習言語（複数選択可）</h3>
            <div class='float'>
              <div class='float'>
                <label class='modal-checkbox' for='HTML' id='content-checkbox-3'>
                  <div id='clicked_checkbox_3' class='modal-checkbox__circle'>
                    <input type='checkbox' name='study-language' value='HTML' class='stretched-link' id='HTML'>
                    <span class='modal-checkbox__checkbox__check'></span>
                  </div> HTML
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='css' id='content-checkbox-4'>
                  <div id='clicked_checkbox_4' class='modal-checkbox__circle'>
                    <input type='checkbox' name='study-language' value='css' class='stretched-link' id='css'>
                    <span class='modal-checkbox__checkbox__check'></span>
                  </div>css
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='JavaScript' id='content-checkbox-5'>
                  <div id='clicked_checkbox_5' class='modal-checkbox__circle'>
                    <input type='checkbox' name='study-language' value='JavaScript ' class='stretched-link' id='JavaScript'>
                    <span class='modal-checkbox__checkbox__check'></span>
                  </div>JavaScript
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='PHP' id='content-checkbox-6'>
                  <div class='modal-checkbox__circle' id='clicked_checkbox_6'>
                    <input type='checkbox' name='study-language' value='PHP' class='stretched-link' id='PHP'>
                    <span class='modal-checkbox__checkbox__check'></span>
                  </div>PHP
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='Laravel' id='content-checkbox-7'>
                  <div class='modal-checkbox__circle' id='clicked_checkbox_7'>
                    <input type='checkbox' name='study-language' value='Laravel' class='stretched-link' id='Laravel'>
                    <span class='modal-checkbox__checkbox__check'></span>
                  </div>Laravel
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='SQL' id='content-checkbox-8'>
                  <div class='modal-checkbox__circle' id='clicked_checkbox_8'>
                    <input type='checkbox' name='study-language' value='SQL' class='stretched-link' id='SQL'>
                    <span class='modal-checkbox__checkbox__check'></span>
                  </div>SQL
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='SHELL' id='content-checkbox-9'>
                  <div class='modal-checkbox__circle' id='clicked_checkbox_9'>
                    <input type='checkbox' name='study-language' value='SHELL' class='stretched-link' id='SHELL'>
                    <span class='modal-checkbox__checkbox__check'></span>
                  </div>SHELL
                </label>
              </div>
              <div class='float'>
                <label class='modal-checkbox' for='basic-knowledge' id='content-checkbox-10'>
                  <div class='modal-checkbox__circle' id='clicked_checkbox_10'>
                    <input type='checkbox' name='study-language' value='basic-knowledge' class='stretched-link' id='basic-knowledge'>
                    <span class='modal-checkbox__checkbox__check'></span>
                  </div>情報システム基礎知識（その他）
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class='modal-content-2'>
          <div class='grid'>
            <h3 class='modal-content-title float'> 学習時間</h3>
            <label for='time'></label>
            <input type='number' onkeyup='value = value.length > 5 ? value.slice(0,5): value;' max='99999' name='study-time' autocomplete='time' class='modal-study-time' id='time'>
          </div>
          <div class='grid'>
            <h3 class='modal-content-title float'>Twitter用コメント</h3>
            <label for='text'></label>
            <input type='text' name='twitter-comment' autocomplete='text' id='text'>
            <textarea id='twitter_com' name='content'>
              </textarea>
            <label for='tweet'>
              <div style='display:flex; text-align: center; align-items: flex-end; padding: 10px;'>
                <div class='modal-checkbox__circle ' id='clicked_checkbox_tweet'>
                  <input type='checkbox' name='share-box' value='true' id='tweet' class='stretched-link'>
                  <span class='modal-checkbox__checkbox__check'></span>
                </div>
                Twitterにシェアする
              </div>
            </label>
          </div>
        </div>
      </div>
      <button id='modal-inner-button' class='modal-inner-button'>記録・投稿</button>
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
  <!-- 　完了画面ここまで -->







  <script src='./js/index.js' type='text/javascript'></script>

</body>

</html>
