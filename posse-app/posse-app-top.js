'use strict'






// 学習時間棒グラフ
  var ctx = document.getElementById("graph-area");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
     //凡例のラベル
      labels: ["","2","","4","","6","","8","","10","","12","","14","","16","","18","","20","","22","","24","","26","","28","","30",""],
      datasets: [
        {
          label: '', //データ項目のラベル
          data: [1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8,1,2,3,4,5,6], //グラフのデータ,
          backgroundColor: "rgb(32, 91, 255)"
        }
      ]
    },
    options: {
      legend:{
        display:false
      },

      scales: {

        xAxes: [{
          display: true,
          stacked: false,
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          gridLines: {
            drawBorder: false,
            display:false
          },
          ticks: {
            // 目盛に記号を入れる
            callback: function(value) {
                return value + 'h';
            }
        }
        }]
      },
    }
  });

// Chart.types.Bar.extend({
//   name: "graph-area",
//   initialize: function (data) {
//     Chart.types.Bar.prototype.initialize.apply(this, arguments);

//     if (this.options.curvature !== undefined && this.options.curvature <= 1) {
//       var rectangleDraw = this.datasets[0].bars[0].draw;
//       var self = this;
//       var radius = this.datasets[0].bars[0].width * this.options.curvature * 0.5;

//       // override the rectangle draw with ours
//       this.datasets.forEach(function (dataset) {
//         dataset.bars.forEach(function (bar) {
//           bar.draw = function () {
//             // draw the original bar a little down (so that our curve brings it to its original position)
//             var y = bar.y;
//             // the min is required so animation does not start from below the axes
//             bar.y = Math.min(bar.y + radius, self.scale.endPoint - 1);
//             // adjust the bar radius depending on how much of a curve we can draw
//             var barRadius = (bar.y - y);
//             rectangleDraw.apply(bar, arguments);

//             // draw a rounded rectangle on top
//             Chart.helpers.drawRoundedRectangle(self.chart.ctx, bar.x - bar.width / 2, bar.y - barRadius + 1, bar.width, bar.height, barRadius);
//             ctx.fill();

//             // restore the y value
//             bar.y = y;
//           }
//         })
//       })
//     }
//   }
// });



  // 学習言語グラフ

  var ctx = document.getElementById("language-graph");
  var myDoughnutChart= new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["JavaScript", "CSS", "PHP", "HTML","Laravel","SQL","SHELL","情報システム基礎知識（その他）"], //データ項目のラベル
      datasets: [{
          borderWidth: 0,
          backgroundColor: [
              "#0345EC",
              "#0F71BD",
              "#20BDDE",
              "#3CCEFE",
              "#20BDDE",
              "#6D46EC",
              "#4A17EF",
              "#3105C0"
          ],
          data: [42, 18, 10, 10,7,6,4,3] //グラフのデータ
      }]
    },
    options: {

      legend:false,
      responsive: false,
      maintainAspectRatio: false,
      title: {
        display: true,
        //グラフタイトル
        text: ''
      }
    }
  });




  // 学習コンテンツ
  var ctx = document.getElementById("content-graph");
  var myDoughnutChart= new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["ドットインストール","N予備校","POSSE課題"], //データ項目のラベル
      datasets: [{
          borderWidth: 0,
          backgroundColor: [
              "#0345EC",
              "#0F71BD",
              "#20BDDE"
          ],
          data: [42,33,25] //グラフのデータ
      }]
    },
    options: {
      legend:false,
      responsive: false,
      maintainAspectRatio: false,
      title: {
        display: true,
        //グラフタイトル
        text: ''
      }
    }
  });



  // チェックボックスの動き
for (let i = 0; i < 11; i++){
  let clicked_checkbox = document.getElementById('clicked_checkbox_' + i);
  let clicked_content = document.getElementById("content-checkbox-" + i);
  clicked_checkbox.addEventListener('click', function () {
    clicked_checkbox.classList.toggle("modal-checkbox-checked");
    clicked_content.classList.toggle("content-checkbox-checked")
    clicked_checkbox.classList.toggle("modal-checkbox__checkbox");


})}
