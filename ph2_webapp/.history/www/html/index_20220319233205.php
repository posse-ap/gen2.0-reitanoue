<?php
require("dbconnect.php");
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
  <link rel="stylesheet" href="./css/index.scss">
  <link rel='stylesheet' href='./css/reset.css'>
  <link rel='stylesheet' href='./css/responsive.css'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Sharp|Material+Icons+Round|Material+Icons+Two+Tone">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/77dc7f4ff2.js" crossorigin="anonymous"></script>
  <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

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
          <div id='languageGraph'></div>
        </div>

      </div>

      <!-- 学習コンテンツ -->
      <div class='main__inner__2__box section__box'>
        <h2 class='float'>学習コンテンツ</h2>
        <div class='main__inner__2__box__graph'>
          <div id='contentGraph'></div>
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
              <label for="nYobi" class="modal-checkbox" id="content_1">
                <input id="nYobi" type="checkbox" name="studyContent" value="N予備校">
                <i class='fa-solid fa-circle-check check' id="contentCheck_1"></i>
                N予備校
              </label>
              <label for="dotInstall" class="modal-checkbox" id="content_2">
                <input id="dotInstall" type="checkbox" name="studyContent" value="ドットインストール">
                <i class='fa-solid fa-circle-check check'  id="contentCheck_2"></i>
                ドットインストール
              </label>
              <label for="posseHw" class="modal-checkbox" id="content_3">
                <input id='posseHw' type="checkbox" name="studyContent" value="POSSE課題">
                <i class='fa-solid fa-circle-check check' id="contentCheck_3"></i>
                POSSE課題
              </label>
            </div>
          </div>










          <!-- 学習言語 -->
          <div class='grid'>
            <h3 class='modal-content-title float'>学習言語（複数選択可）</h3>
            <div class='float'>
              <label for="html" class="modal-checkbox" id="lang_1">
                <input id="html" type="checkbox" name="studyLanguage" value="HTML">
                <i class='fa-solid fa-circle-check check'></i>
                HTML
              </label>
              <label for="css" class="modal-checkbox" id="lang_2">
                <input id="css" type="checkbox" name="studyLanguage" value="CSS">
                <i class='fa-solid fa-circle-check check'></i>
                CSS
              </label>
              <label for="js" class="modal-checkbox" id="lang_3">
                <input id="js" type="checkbox" name="studyLanguage" value="JavaScript">
                <i class='fa-solid fa-circle-check check'></i>
                JavaScript
              </label>
              <label for="php" class="modal-checkbox" id="lang_4">
                <input id="php" type="checkbox" name="studyLanguage" value="php">
                <i class='fa-solid fa-circle-check che></i>
                PHP
              </label>
              <label for="laravel" class="modal-checkbox" id="lang_5">
                <input id="laravel" type="checkbox" name="studyLanguage" value="Laravel">
                <i class='fa-solid fa-circle-check' style='color: #ccc; margin-right:5px'></i>
                Laravel
              </label>
              <label for="sql" class="modal-checkbox" id="lang_6">
                <input id="sql" type="checkbox" name="studyLanguage" value="SQL">
                <i class='fa-solid fa-circle-check' style='color: #ccc; margin-right:5px'></i>
                SQL
              </label>
              <label for="shell" class="modal-checkbox" id="lang_7">
                <input id="shell" type="checkbox" name="studyLanguage" value="SHELL">
                <i class='fa-solid fa-circle-check' style='color: #ccc; margin-right:5px'></i>
                SHELL
              </label>
              <label for="basicKnowledge" class="modal-checkbox" id="lang_8">
                <input id="basicKnowledge" type="checkbox" name="studyLanguage" value="情報システム基礎知識（その他）">
                <i class='fa-solid fa-circle-check' style='color: #ccc; margin-right:5px'></i>
                情報システム基礎知識（その他）
              </label>
            </div>
          </div>
        </div>
        <div class='modal-content-2'>
          <div class='grid'>
            <h3 class='modal-content-title float'> 学習時間</h3>
            <label for='time'>
              <input type='number' onkeyup='value = value.length > 5 ? value.slice(0,5): value;' max='99999' name='study-time' autocomplete='time' class='modal-study-time' id='time'>
            </label>
          </div>
          <div class='grid'>
            <h3 class='modal-content-title float'>Twitter用コメント</h3>
            <textarea id='twitter_com' name='content'>
            </textarea>
            <div class='flex'>
              <i class='fa-solid fa-circle-check' style='color: #ccc;' id='tweetCheckmark'>
                <input type='checkbox' name='share-box' value='true' id='tweet' class='stretched-link'>
              </i>
              Twitterにシェアする
            </div>
          </div>
        </div>
      </div>
      <button id='modal-inner-button' class='modal-inner-button' onclick="func1();func2()">記録・投稿</button>
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
  <script src="./js/chart.js"></script>
</body>

</html>
