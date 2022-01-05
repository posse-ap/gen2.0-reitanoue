"use strict";


// チェックボックスの動き
for (let i = 0; i < 11; i++) {
  let clicked_checkbox = document.getElementById("clicked_checkbox_" + i);
  let clicked_content = document.getElementById("content-checkbox-" + i);
  clicked_checkbox.addEventListener("click", function () {
    clicked_checkbox.classList.toggle("modal-checkbox__circle-checked"); //チェックボックスを青くする
    clicked_checkbox.classList.toggle("modal-checkbox__circle"); //もとのチェックボックスの色を取り除く
    clicked_content.classList.toggle("modal-checkbox-checked"); //チェックボックス全体の背景を変える
  });
}

//tweetのチェックボックス
document.getElementById("tweet").addEventListener("click", function () {
  document.getElementById("clicked_checkbox_tweet").classList.toggle("modal-checkbox__circle-checked"); //チェックボックスを青くする
  document.getElementById("clicked_checkbox_tweet").classList.toggle("modal-checkbox__circle");
  const loader = document.getElementById("loading-wrapper");
  loader.classList.add("completed");
});

function post() {
  tweet();
}

//ツイート投稿
let tweet_content = document.getElementById("tweet");
function tweet() {
  let twitter_text = document.getElementById("twitter_com").value;
  if (tweet_content.checked) {
    window.open("https://twitter.com/intent/tweet?text=" + twitter_text);
  }
}



