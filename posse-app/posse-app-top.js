'use strict'






// 学習時間棒グラフ
  var ctx = document.getElementById("graph-area");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
     //凡例のラベル
      labels: ["","2","","4","","6","","8","","10","","","","","","","","","","","","","","","","","","","","","","",""],
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
            // 目盛にドル記号を入れる
            callback: function(value) {
                return value + 'h';
            }
        }
        }]
      },
    }
  });



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
              "#3105C0",
              
          ],
          data: [42, 18, 10, 10,7,6,4,3] //グラフのデータ
      }]
    },
    options: {
      legend:false,
      responsive: true,
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
      responsive: true,
      maintainAspectRatio: false,
      title: {
        display: true,
        //グラフタイトル
        text: ''
      }
    }
  });











  

//   // カレンダー

//   const week = ["日", "月", "火", "水", "木", "金", "土"];
//   const today = new Date();
//   // 月末だとずれる可能性があるため、1日固定で取得
//   var showDate = new Date(today.getFullYear(), today.getMonth(), 1);
  
//   // 初期表示
//   window.onload = function () {
//       showProcess(today, calendar);
//   };
//   // 前の月表示
//   function prev(){
//       showDate.setMonth(showDate.getMonth() - 1);
//       showProcess(showDate);
//   }
  
//   // 次の月表示
//   function next(){
//       showDate.setMonth(showDate.getMonth() + 1);
//       showProcess(showDate);
//   }
  
//   // カレンダー表示
//   function showProcess(date) {
//       var year = date.getFullYear();
//       var month = date.getMonth();
//       document.querySelector('#header').innerHTML = year + "年 " + (month + 1) + "月";
  
//       var calendar = createProcess(year, month);
//       document.querySelector('#calendar').innerHTML = calendar;
//   }
  
// // カレンダー作成
// function createProcess(year, month) {
//   // 曜日
//   var calendar = "<table><tr class='dayOfWeek'>";
//   for (var i = 0; i < week.length; i++) {
//       calendar += "<th>" + week[i] + "</th>";
//   }
//   calendar += "</tr>";

//   var count = 0;
//   var startDayOfWeek = new Date(year, month, 1).getDay();
//   var endDate = new Date(year, month + 1, 0).getDate();
//   var lastMonthEndDate = new Date(year, month, 0).getDate();
//   var row = Math.ceil((startDayOfWeek + endDate) / week.length);

//   // 1行ずつ設定
//   for (var i = 0; i < row; i++) {
//       calendar += "<tr>";
//       // 1colum単位で設定
//       for (var j = 0; j < week.length; j++) {
//           if (i == 0 && j < startDayOfWeek) {
//               // 1行目で1日まで先月の日付を設定
//               calendar += "<td class='disabled'>" + (lastMonthEndDate - startDayOfWeek + j + 1) + "</td>";
//           } else if (count >= endDate) {
//               // 最終行で最終日以降、翌月の日付を設定
//               count++;
//               calendar += "<td class='disabled'>" + (count - endDate) + "</td>";
//           } else {
//               // 当月の日付を曜日に照らし合わせて設定
//               count++;
//               if(year == today.getFullYear()
//                 && month == (today.getMonth())
//                 && count == today.getDate()){
//                   calendar += "<td class='today'>" + count + "</td>";
//               } else {
//                   calendar += "<td>" + count + "</td>";
//               }
//           }
//       }
//       calendar += "</tr>";
//   }
//   return calendar;
// }