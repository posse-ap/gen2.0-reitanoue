'use strict';

let selection_id =1

let clicked_option =document.getElementById("ans-0-a") //変数でclicked_optionを宣言
document.getElementById('0-' + selection_id + '-0').addEventListener('click',function() {
    document.getElementById("0-1-0").classList.add("succeeded"); //文字を白に、背景を青にする
    clicked_option.style.display ="block"; //解説ボックスを表示する
    document.getElementById("0-0-1").style.pointerEvents="none"; //たかわをクリック無効にする
    document.getElementById("0-0-2").style.pointerEvents="none"; //こうわをクリック無効にする
});


document.getElementById('0-0-1').addEventListener('click',function() {
    document.getElementById("0-0-1").classList.add("failed"); //文字を白に、背景を赤にする
    document.getElementById("0-1-0").classList.add("succeeded"); //正解のボックスの色を変更
    document.getElementById("ans-0-b").style.display ="block"; //解説ボックスを表示する
    document.getElementById("0-1-0").style.pointerEvents="none"; //たかなわをクリック無効にする
    document.getElementById("0-0-2").style.pointerEvents="none"; //こうわをクリック無効にする
});


document.getElementById('0-0-2').addEventListener('click',function() {
    document.getElementById("0-0-2").classList.add("failed"); //文字を白に、背景を赤にする
    document.getElementById("0-1-0").classList.add("succeeded"); //正解のボックスの色を変更
    document.getElementById("ans-0-b").style.display ="block"; //解説ボックスを表示する
    document.getElementById("0-1-0").style.pointerEvents="none"; //たかなわをクリック無効にする
    document.getElementById("0-0-1").style.pointerEvents="none"; //たかわをクリック無効にする
});
    












//let choices = document.getElementById('choices');

