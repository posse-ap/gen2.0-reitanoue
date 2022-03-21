<?php





$bar_stmt = $db->prepare("SELECT study_date,sum(study_hour) as sum_study_hour
  FROM study_reports
  GROUP BY study_date
  HAVING DATE_FORMAT(study_date, '%Y%m')=DATE_FORMAT(NOW(), '%Y%m')");
$bar_stmt->execute();
$bars = $bar_stmt->fetchAll();


$language_stmt = $db->prepare("SELECT languages.name,languages.color,sum(study_reports.study_hour) as sum_study_hour
  FROM study_reports
  JOIN languages ON study_reports.language_id = languages.id
  WHERE DATE_FORMAT(study_date, '%Y%m')=DATE_FORMAT(NOW(), '%Y%m')
  GROUP BY languages.name,languages.color");

$language_stmt->execute();
$languages = $language_stmt->fetchAll();

$content_stmt = $db->prepare("SELECT contents.name,contents.color,sum(study_reports.study_hour) as sum_study_hour
  FROM study_reports
  JOIN contents ON study_reports.content_id = contents.id
  WHERE DATE_FORMAT(study_date, '%Y%m')=DATE_FORMAT(NOW(), '%Y%m')
  GROUP BY contents.name,contents.color");

$content_stmt->execute();
$contents = $content_stmt->fetchAll();














?>
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/77dc7f4ff2.js" crossorigin="anonymous"></script>
<script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js'></script>
<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>


<script>
  "use strict";

  // 学習時間棒グラフ

  var ctx0 = document.getElementById("bargraph-area").getContext("2d");
  var myBarChart = new Chart(ctx0, {
    type: "bar",
    //凡例のラベル
    data: {
      labels: [
        <?php foreach ($bars as $bar) {
          echo substr($bar["study_date"], 9, 2) . ",";
        } ?>
      ],
      datasets: [{
        xAxisID: "x",
        yAxisID: "y",
        label: "学習時間",
        data: [
          <?php foreach ($bars as $bar) {
            echo $bar["sum_study_hour"] . ",";
          } ?>
        ],
        backgroundColor: "#0f71bd",
        borderWidth: 1,
      }, ],
    },
    options: {
      indexAxis: "x",
      plugins: {
        legend: false,
      },

      scales: {
        display: true,
        x: {
          grid: {
            display: false,
          },
          display: true,
          categoryPercentage: 0.6, // ┐省略時の値
          barPercentage: 0.6,
          stacked: true,
          ticks: {
            display: true,
            maxTicksLimit: 20,
            maxRotation: 0,
            minRotation: 0,
            autoSkip: true,
            min: 0,
            max: 31,
            stepSize: 2,
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































  //学習言語グラフ///////////////////////////////////
  // api load
  google.load("visualization", "1.0", {
    packages: ["corechart"]
  });

  //callback
  google.setOnLoadCallback(drawChart0);

  // グラフ用 function
  function drawChart0() {
    var dataLang = new google.visualization.arrayToDataTable([
      ["language", "portion"],
      <?php foreach ($languages as $language) { ?>["<?= $language["name"] ?>", <?= $language["sum_study_hour"] ?>],
      <?php } ?>
    ]);

    var optionsLang = {
      legend: false,
      title: "",
      fontName: "sans-serif",
      width: 250,
      height: 250,
      chartArea: {
        width: "100%",
        height: "100%"
      },
      colors: [
        <?php foreach ($languages as $language) { ?> "#<?= $language["color"] ?>",
        <?php } ?>

      ],

      legend: {
        position: "none"
      },
      tooltip: false,
      pieSliceText: "percentage",
      //グラフ内文字
      pieSliceTextStyle: {
        fontSize: 10
      },
      pieSliceBorderColor: "transparent",
      pieHole: 0.5,
      backgroundColor: "transparent",
    };


    var chartLang = new google.visualization.PieChart(
      document.getElementById("languageGraph")
    );
    chartLang.draw(dataLang, optionsLang);
  }



















  //コンテンツグラフ

  // api load
  google.load("visualization", "1.0", {
    packages: ["corechart"]
  });

  //callback
  google.setOnLoadCallback(drawChart1);

  // グラフ用 function
  function drawChart1() {
    var dataContent = new google.visualization.arrayToDataTable([
      ["content", "portion"],
      <?php foreach ($contents as $content) { ?>["<?= $content["name"] ?>", <?= $content["sum_study_hour"] ?>],
      <?php } ?>
    ]);
    var optionsContent = {
      fontName: "sans-serif",
      width: 250,
      height: 250,
      chartArea: {
        width: "100%",
        height: "100%"
      },
      colors: [
        <?php foreach ($contents as $content) { ?> "#<?= $content["color"] ?>",
        <?php } ?>
      ],
      legend: {
        position: "none"
      },
      tooltip: {
        legend: false,
        textStyle: {
          bold: "false",
          fontSize: 10
        },
      },
      pieSliceText: "percentage",
      pieSliceTextStyle: {
        fontSize: 10
      },
      pieSliceBorderColor: "transparent",
      pieHole: 0.5,
      backgroundColor: "transparent",
    };

    var chartContent = new google.visualization.PieChart(
      document.getElementById("contentGraph")
    );
    chartContent.draw(dataContent, optionsContent);
  }
</script>
