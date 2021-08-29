'use strict';
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
let quizeSet = [
    ["たかなわ","こうわ","たかわ"],
    ["かめいど","かめど","かめと"],
    ["こうじまち","おかとまち","かゆまち"],
    ["ごせいもん","おなりもん","おかどもん"],
    ["とどろき","たたりき","たたら"],
    ["せきこうい","いじい","しゃくじい"],
    ["ざっしょく","ざっしき","ぞうしき"],
    ["みとちょう","おかちまち","ごしろちょう"],
    ["ろっこつ","ししぼね","しこね"],
    ["こぐれ","こばく","こしゃく"],
].map(shuffle);

//正解の配列
let true_answers = ["たかなわ","かめいど","こうじまち","おなりもん","とどろき","しゃくじい","ぞうしき","おかちまち","ししぼね","こぐれ"]
    
    // let false_answers_1st = ["たかわ","かめど","おかとまち","ごせいもん","たたら","せきこうい","ざっしょく","みとちょう","しこね","こしゃく"]
    // let false_answers_2nd = ["こうわ","かめと","かゆまち","おかどもん","たたりき","いじい","ざっしき","ごしろちょう","ろっこつ","こばく"]
    


//シャッフル
function shuffle(arr) {
    for (let k = arr.length - 1; k > 0; k--) { // i = ランダムに選ぶ終点のインデックス
      const j = Math.floor(Math.random() * (k + 1));  // j = 範囲内から選ぶランダム変数
      [arr[j], arr[k]] = [arr[k], arr[j]]; // 分割代入 i と j を入れ替える
    }
    return arr;
}


//本体
for(let i = 0; i < 10; i++) {
    let question_box =
        `<h1>`+ `${i+1}.この地名はなんて読む？` + `</h1>`+

        `<div class="quiz-image-container">`+
            `<img class="quiz-image" src="` + images [i] + `">`+
        `</div>`+
        
        `<div class="box1">`+
            `<ul id="choices">`;
            for(let x =0; x < 3; x++){
                question_box = question_box+
                `<li id='${i}-${x}' onclick="onclickFunction(${i},${x})">`+quizeSet[i][x] +`</li>`
            };
            question_box = question_box+
            `</ul>`+
            `</div>`+    
        `<div class="quiz-result" id="ans-${i}-a">`+
            `<p class ="quiz-result-title quiz-result-title-succeeded" >正解！</p>`+
            `<p class ="quiz-result-explanation">正解は「`+true_answers[i]+`」です！</p>`+
        `</div>`+
        `<div class="quiz-result" id="ans-${i}-b">`+
            `<p class ="quiz-result-title quiz-result-title-failed" >不正解！</p>`+
            `<p class ="quiz-result-explanation">正解は「`+true_answers[i]+`」です！</p>`+
        `</div>`;
    document.getElementById('quiz-box').insertAdjacentHTML('beforeend',question_box);

var onclickFunction = function (question_number,clicked_number){

    let clicked_option = document.getElementById(question_number+"-"+clicked_number)
    clicked_option.classList.add("failed");

    // let choice0 = document.getElementById(question_number+"-0");
    // let choice1 = document.getElementById(question_number+"-1");
    // let choice2 = document.getElementById(question_number+"-2");
    
    for ( let t = 0; t < 3; t++){
        if (quizeSet[question_number][t] == true_answers[question_number]){
            let true_choice = document.getElementById(question_number+"-"+t);
            true_choice.classList.remove("failed");
            true_choice.classList.add("succeeded");
            
        }
    }


    
}





    // let true_explanation = document.getElementById("ans-" + i + "-a")
    // let false_explanation = document.getElementById("ans-" + i  + "-b")
    



        //  //正解を選択した際の動き
        // clicked_option_true.addEventListener('click',function() {
        //     clicked_option_true.classList.add("succeeded"); //文字を白に、背景を青にする
        //     true_explanation.style.display ="block"; //解説ボックスを表示する
        //     clicked_option_false_1st.style.pointerEvents="none"; //不正解１をクリック無効にする
        //     clicked_option_false_2nd.style.pointerEvents="none"; //不正解２をクリック無効にする
        // });

        // //不正解⑴を選択した際の動き  
        // clicked_option_false_1st.addEventListener('click',function() {
        //     clicked_option_false_1st.classList.add("failed"); //文字を白に、背景を赤にする
        //     clicked_option_true.classList.add("succeeded"); //正解のボックスの色を変更
        //     false_explanation.style.display ="block"; //解説ボックスを表示する
        //     clicked_option_true.style.pointerEvents="none"; //正解をクリック無効にする
        //     clicked_option_false_2nd.style.pointerEvents="none"; //不正解２をクリック無効にする
        // });
   
        // //不正解⑵を選択した際の動き
        // clicked_option_false_2nd.addEventListener('click',function() {
        //     clicked_option_false_2nd.classList.add("failed"); //文字を白に、背景を赤にする
        //     clicked_option_true.classList.add("succeeded"); //正解のボックスの色を変更
        //     false_explanation.style.display ="block"; //解説ボックスを表示する
        //     clicked_option_true.style.pointerEvents="none"; //正解をクリック無効にする
        //     clicked_option_false_1st.style.pointerEvents="none"; //不正解１をクリック無効にする
        // });
  

};







