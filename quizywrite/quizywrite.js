'use strict'
//画像配列
let images = [ 
    "https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png",
    "https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png",
    "https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png",
    "https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png",
];

//選択肢配列
let selections = [
    ["たかなわ","たかわ","こうわ"],
    ["かめいど","かめど","かめと"],
    ["こうじまち","おかとまち","かゆまち"],
    ["ごせいもん","おなりもん","おかどもん"],
    ["とどろき","たたりき","たたら"],
    ["せきこうい","いじい","しゃくじい"],
    ["ぞうしき","ざっしき","ざっしょく"],
    ["おかちまち","みとちょう","ごしろちょう"],
    ["ししぼね","ろっこつ","しこね"],
    ["こぐれ","こぼく","こしゃく"],
].map(shuffle);

//正解の配列
let true_answers = ["たかなわ","かめいど","こうじまち","おなりもん","とどろき","しゃくじい","ぞうしき","おかちまち","ししぼね","こぐれ"]

//配列の中身をシャッフル
function shuffle(arr) {
    for (let t = arr.length-1; t > 0; t--){
        const s =Math.floor(Math.random() * (t + 1));
        [arr[s],arr[t]]=[arr[t],arr[s]];
    }
    return arr;
}


//quiz-box記述
for (let i = 0; i < selections.length; i++) {
    let QuizBox =
    
    `<h4>${i+1}.この地名はなんて読む？</h4>`
    +`<img src="${images[i]}" alt="問題の画像">`
    +`<ul class="selection">`;
    selections[i].forEach(function(selection,index){
    QuizBox += `<li id="${i}-${index}" onclick="clickedFunction(${i},${index})" class="list" name="choice-${i}">${selection}</li>`;
    });
    QuizBox += `<div class="answer-box" id="answer-box-${i}">`
    +            `<p id="successText">正解！</p>`
    +            `<p class="quiz-result-explain">正解は「${true_answers[i]}」です！</p>`
    +           `</div>`

    +           `<div class="answer-box" id="fail-box-${i}">`
    +            `<p id="failText">不正解！</p>`
    +            `<p class="quiz-result-explain">正解は「${true_answers[i]}」です！</p>`
    +           `</div>`;
    //HTML内に入れる
    document.getElementById("quiz-box").insertAdjacentHTML('beforeend',QuizBox);
}

    // それぞれquestionNumber,choiceNumberに渡す
    var clickedFunction = (questionNumber,choiceNumber) => {
        //liをクリックした際に背景を赤にする
        let clicked_option = document.getElementById(questionNumber+"-"+choiceNumber);
        clicked_option.classList.add("fail");
        //クリック無効
        let choiceFunction = document.getElementsByName("choice-"+questionNumber);
        choiceFunction.forEach(choice => {
            choice.style.pointerEvents="none";
        });
        //解説ボックスの表示
        document.getElementById("answer-box-"+questionNumber).style.display="block";
        //正解の選択肢の背景を青にする
        for ( let p = 0; p < 3; p++ ){
            if(selections[questionNumber][p] == true_answers[questionNumber]){
                var true_choice = document.getElementById(questionNumber+"-"+p);
                true_choice.classList.add("succeed");
                true_choice.classList.remove("fail");//先ほどの「クリックした際に全て赤に変更」を取り除く
            }

        if(selections[questionNumber][choiceNumber] == true_answers[questionNumber]){
            //正解ボックスの表示
            document.getElementById("answer-box-"+questionNumber).style.display="block";
            document.getElementById("fail-box-"+questionNumber).style.display="none";
        }else{
            //不正解ボックスの表示
            document.getElementById("fail-box-"+questionNumber).style.display="block";
            document.getElementById("answer-box-"+questionNumber).style.display="none";
        }

    }

};