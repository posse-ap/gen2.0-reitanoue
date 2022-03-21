<?php



?>


<script>
  "use strict";

  // 学習時間棒グラフ

  var ctx0 = document.getElementById("bargraph-area").getContext("2d");;
  var myBarChart = new Chart(ctx0, {
    type: "bar",
    //凡例のラベル
    data: {
      labels: [
        1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21,
        22, 23, 24, 25, 26, 27, 28, 29, 30, 31
      ],
      datasets: [{
        xAxisID: "x",
        yAxisID: "y",
        label: "学習時間",
        data: [],
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
      ["JavaScript", 48],
      ["CSS", 12],
      ["PHP", 10],
      ["HTML", 10],
      ["Laravel", 7],
      ["SQL", 6],
      ["SHELL", 4],
      ["情報システム基礎知識（その他）", 3],
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
        "#0345EC",
        "#0F71BD",
        "#20BDDE",
        "#3CCEFE",
        "#20BDDE",
        "#6D46EC",
        "#4A17EF",
        "#3105C0",
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
      ["N予備校", 1000],
      ["ドットインストール", 680],
      ["POSSE課題", 240.4],
    ]);
    var optionsContent = {
      fontName: "sans-serif",
      width: 250,
      height: 250,
      chartArea: {
        width: "100%",
        height: "100%"
      },
      colors: ["#0345EC", "#0F71BD", "#20BDDE"],
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
