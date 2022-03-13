"use strict";

// 学習時間棒グラフ

var ctx0 = document.getElementById("bargraph-area").getContext("2d");
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
        xAxisID: "x",
        yAxisID: "y",
        label: "学習時間",
        data: [
          2, 1, 4, 3, 1, 5, 3, 2, 6, 3, 3, 2, 2, 1, 2, 5, 3, 4, 3, 2, 4, 2, 1,
          4, 0, 7, 3, 4, 1, 1, 3,
        ],
        backgroundColor: "blue",
        borderWidth: 1,
      },
    ],
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
          callback: function (value) {
            return value + "h";
          },
        },
      },
    },
  },
});

// 学習言語グラフ

var languageGraphPlugin1 = {
  afterDatasetsDraw: function (chart) {
    var ctx = chart.ctx;
    chart.data.datasets.forEach(function (dataset, 系列) {
      var meta = chart.getDatasetMeta(系列);
      if (!meta.hidden) {
        meta.data.forEach(function (element, 要素) {
          // ステップ１　数値を文字列に変換
          var 要素値 = dataset.data[要素];
          var dataString = 要素値.toString();
          var 百分率 = "" + 1 * 要素値.toFixed(1).toString() + "%";
          // ステップ２　文字列の書体
          ctx.fillStyle = "white"; // 色
          var fontSize = 14; // サイズ
          var fontStyle = "bold"; // 書体 'bold', 'italic'
          var fontFamily = "sans-serif"; // フォントの種類 'sans-serif', 'ＭＳ 明朝'
          ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
          // ステップ３　文字列の位置の基準点
          ctx.textAlign = "center"; // 文字列　start, end, left, right, center
          ctx.textBaseline = "middle"; // 文字高　middle, top, bottom
          // ステップ４　文字列のグラフでの位置
          var padding = 5; // 点と文字列の距離
          var position = element.tooltipPosition();
          //文字列の表示　 fillText(文字列, Ｘ位置, Ｙ位置)
          ctx.fillText(
            dataString,
            position.x,
            position.y - fontSize / 2 - padding
          ); // 人数の表示
          ctx.fillText(百分率, position.x, position.y + fontSize / 2); //
        });
      }
    });
  },
};

var ctx1 = document.getElementById("language-graph").getContext("2d");
var myDoughnutChart0 = new Chart(ctx1, {
  type: "doughnut", // グラフの種類 pie 円グラフ, doughnut ドーナッツチャート, polarArea 鶏頭図
  data: {
    labels: [
      // 'JavaScript',
      // 'CSS',
      // 'PHP',
      // 'HTML',
      // 'Laravel',
      // 'SQL',
      // 'SHELL',
      // '情報システム基礎知識（その他）',
    ], // 軸のラベル
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
    responsive: false,
    title: {
      // 図のタイトル表示
      display: false,
      text: "",
    },
    legend: false,
  },
  plugins: [languageGraphPlugin1],
});

// 学習コンテンツ

var languageGraphPlugin2 = {
  afterDatasetsDraw: function (chart) {
    var ctx = chart.ctx;
    chart.data.datasets.forEach(function (dataset, 系列) {
      var meta = chart.getDatasetMeta(系列);
      if (!meta.hidden) {
        meta.data.forEach(function (element, 要素) {
          // ステップ１　数値を文字列に変換
          var 要素値 = dataset.data[要素];
          var dataString = 要素値.toString();
          var 百分率 = "" + 1 * 要素値.toFixed(1).toString() + "%";
          // ステップ２　文字列の書体
          ctx.fillStyle = "white"; // 色
          var fontSize = 14; // サイズ
          var fontStyle = "bold"; // 書体 'bold', 'italic'
          var fontFamily = "sans-serif"; // フォントの種類 'sans-serif', 'ＭＳ 明朝'
          ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);
          // ステップ３　文字列の位置の基準点
          ctx.textAlign = "center"; // 文字列　start, end, left, right, center
          ctx.textBaseline = "middle"; // 文字高　middle, top, bottom
          // ステップ４　文字列のグラフでの位置
          var padding = 5; // 点と文字列の距離
          var position = element.tooltipPosition();
          //文字列の表示　 fillText(文字列, Ｘ位置, Ｙ位置)
          ctx.fillText(
            dataString,
            position.x,
            position.y - fontSize / 2 - padding
          ); // 人数の表示
          ctx.fillText(百分率, position.x, position.y + fontSize / 2); //
        });
      }
    });
  },
};

var ctx2 = document.getElementById("content-graph").getContext("2d");
var myDoughnutChart1 = new Chart(ctx2, {
  type: "doughnut",
  data: {
    labels: [
      // 'ドットインストール', 'N予備校', 'POSSE課題'
    ], //データ項目のラベル
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
  plugins: [languageGraphPlugin2],
});
