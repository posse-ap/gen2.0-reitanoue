<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>NEWS一覧</title>
    <link rel='stylesheet' href='../css/reset.css'>
    <link rel='stylesheet' href='../css/index.css'>
    <link rel='stylesheet' href='../css/responsive.css'>
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
            <p>NEWS一覧</p>
        </div>
    </header>

    <main>
        <ul>
            @foreach ($lists as $list)
                <a href="/news/{{ $list['id'] }}">
                    <li class="section__box news__box">
                        {{ $list['title'] }}
                    </li>
                </a>
            @endforeach
        </ul>


    </main>

</body>

</html>
