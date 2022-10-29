<script>

    "use strict";

// 学習時間棒グラフ

var ctx0 = document.getElementById("bargraph-area").getContext("2d");
var myBarChart = new Chart(ctx0, {
    type: "bar",
    //凡例のラベル
    data: {
        labels: [
            "",
            "2",
            "",
            "4",
            "",
            "6",
            "",
            "8",
            "",
            "10",
            "",
            "12",
            "",
            "14",
            "",
            "16",
            "",
            "18",
            "",
            "20",
            "",
            "22",
            "",
            "24",
            "",
            "26",
            "",
            "28",
            "",
            "30",
            "",
        ],
        datasets: [
            {
                xAxisID: "x",
                yAxisID: "y",
                label: "学習時間",
                data: [
                    //ここにLaravelを用いてデータを入れる
                ],
                backgroundColor: "#0f71bd",
                borderWidth: 1,
            },
        ],
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
                    callback: function (value) {
                        return value + "h";
                    },
                },
            },
        },
    },
});

//学習言語グラフ
// api load

google.load("visualization", "1.0", {
    packages: ["corechart"],
});

//callback
google.setOnLoadCallback(drawChart0);

// グラフ用 function
function drawChart0() {
    var dataLang = new google.visualization.arrayToDataTable([
        ["language", "portion"],
    ]);

    var optionsLang = {
        legend: false,
        title: "",
        fontName: "sans-serif",
        width: 250,
        height: 250,
        chartArea: {
            width: "100%",
            height: "100%",
        },
        colors: [],

        legend: {
            position: "none",
        },
        tooltip: false,
        pieSliceText: "percentage",
        //グラフ内文字
        pieSliceTextStyle: {
            fontSize: 10,
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
    packages: ["corechart"],
});

//callback
google.setOnLoadCallback(drawChart1);

// グラフ用 function
function drawChart1() {
    var dataContent = new google.visualization.arrayToDataTable([
        ["content", "portion"],
    ]);
    var optionsContent = {
        fontName: "sans-serif",
        width: 250,
        height: 250,
        chartArea: {
            width: "100%",
            height: "100%",
        },
        colors: [],
        legend: {
            position: "none",
        },
        tooltip: {
            legend: false,
            textStyle: {
                bold: "false",
                fontSize: 10,
            },
        },
        pieSliceText: "percentage",
        pieSliceTextStyle: {
            fontSize: 10,
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