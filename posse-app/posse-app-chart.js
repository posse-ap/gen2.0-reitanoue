"use strict";

// 学習時間棒グラフ

var ctx0 = document.getElementById("bargraph-area");
var myBarChart = new Chart(ctx0, {
  type: "bar",
  //凡例のラベル
  data: {
    labels: [
      1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21,
      22, 23, 24, 25, 26, 27, 28, 29, 30, 31,
    ],
    datasets: [
      {
        label: "学習時間",
        data: [
          2, 1, 4, 3, 1, 5, 3, 2, 6, 3, 3, 2, 2, 1, 2, 5, 3, 4, 3, 2, 4, 2, 1,
          4, 0, 7, 3, 4, 1, 1, 3,
        ],
        backgroundColor: "#1985CA",
        borderWidth: 1,
      },
    ],
  },
  options: {
    legend: {
      display: false,
    },
    maintainAspectRatio: false,

    scales: {
      xAxes: [
        {
          categoryPercentage: 0.8, // ┐省略時の値
          barPercentage: 0.8,
          display: true,
          stacked: false,
          gridLines: {
            display: false,
          },
        },
      ],
      yAxes: [
        {
          gridLines: {
            drawBorder: false,
            display: false,
            title: "",
            format: "#.#h",
          },
          ticks: {
            stepSize: 2,
            // 目盛に記号を入れる
            callback: function (value) {
              return value + "h";
            },
          },
        },
      ],
    },
  },
});

// 学習言語グラフ

var ctx1 = document.getElementById("language-graph");
var myDoughnutChart0 = new Chart(ctx1, {
  type: "doughnut",
  data: {
    labels: [
      "JavaScript",
      "CSS",
      "PHP",
      "HTML",
      "Laravel",
      "SQL",
      "SHELL",
      "情報システム基礎知識（その他）",
    ], //データ項目のラベル
    datasets: [
      {
        borderWidth: 0,
        backgroundColor: [
          "#0345EC",
          "#0F71BD",
          "#20BDDE",
          "#3CCEFE",
          "#20BDDE",
          "#6D46EC",
          "#4A17EF",
          "#3105C0",
        ],
        data: [42, 18, 10, 10, 7, 6, 4, 3], //グラフのデータ
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    legend: false,
    responsive: false,
    cutoutPercentage: 50,
    maintainAspectRatio: false,
    title: {
      display: false,
      //グラフタイトル
      text: "",
    },
  },

});

// 学習コンテンツ
var ctx2 = document.getElementById("content-graph");
var myDoughnutChart1 = new Chart(ctx2, {
  type: "doughnut",
  data: {
    labels: ["ドットインストール", "N予備校", "POSSE課題"], //データ項目のラベル
    datasets: [
      {
        borderWidth: 0,
        backgroundColor: ["#0345EC", "#0F71BD", "#20BDDE"],
        data: [42, 33, 25], //グラフのデータ
        labelColor: "white",
        labelFontSize: "16",
      },
    ],
  },
  options: {
    legend: false,
    responsive: false,
    // maintainAspectRatio: false,
    title: {
      display: false,
      //グラフタイトル
      text: "",
    },
  },
});
