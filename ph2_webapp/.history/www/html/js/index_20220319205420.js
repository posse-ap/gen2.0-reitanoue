(function () {
  const modalArea = document.getElementById("modalArea");
  const openModal = document.getElementById("openModal");
  const closeModal = document.getElementById("closeModal");
  const modalBg = document.getElementById("modalBg");
  const toggle = [openModal, closeModal, modalBg];

  for (let x = 0, len = toggle.length; x < len; x++) {
    toggle[x].addEventListener(
      "click",
      function () {
        modalArea.classList.toggle("is-show");
      },
      false
    );
  }
})();





















// チェックボックスの動き
const func1 = () => {
      const elements = document.getElementsByName("studyContent");
for (let i = 1; i < ele; i++) {

};



//tweetのチェックボックス
document
  .getElementById("tweet")
  .addEventListener("click", function () {
    document.getElementById("tweetCheckmark").classList.toggle("checked"); //チェックボックスを青くする
  });

/*
 * 記録・投稿ボタン 動き
 */
let twitterCheckBox =
  document.getElementById("tweet"); /* Twitterのチェックボックスid */
let recordButton =
  document.getElementById("modal-inner-button"); /* 記録・投稿ボタンid */
let loadingModal = document.getElementById("loading"); /* ローディング画面id */
let determinationModal =
  document.getElementById("modalDone"); /* 記録・投稿完了画面id */
let closeDeterminationModal =
  document.getElementById("closeModalDone"); /* 記録・投稿完了画面閉じるid */

  document
  .getElementById("modal-inner-button")
  .addEventListener("click", function () {
    if (twitterCheckBox.checked) {
      console.log("twitter");
      if (languageCheck.checked === true) {
        console.log("学習コンテンツ：", checkbox.value);
      }
      let twitterContents =
        document.getElementById(
          "twitter_com"
        ).value; /* twitter用コメント欄id */
      window.open("https://twitter.com/intent/tweet?text=" + twitterContents);
      loadingModal.style.visibility = "visible";
      loadingModal.style.opacity = "1";
      window.setTimeout(function () {
        loadingModal.style.visibility = "hidden";
        loadingModal.style.opacity = "0";
        determinationModal.style.visibility = "visible";
        determinationModal.style.opacity = "1";
      }, 3000);
    } else {
      loadingModal.style.visibility = "visible";
      loadingModal.style.opacity = "1";
      window.setTimeout(function () {
        loadingModal.style.visibility = "hidden";
        loadingModal.style.opacity = "0";
        determinationModal.style.visibility = "visible";
        determinationModal.style.opacity = "1";
      }, 3000);
    }
  });

closeDeterminationModal.addEventListener("click", function () {
  determinationModal.style.visibility = "hidden";
  determinationModal.style.opacity = "0";
});








                        let languages = [
                          "HTML",
                          "css",
                          "JavaScript",
                          "PHP",
                          "Laravel",
                          "SQL",
                          "SHELL",
                          "basic-knowledge",
                        ];

                        for (let n = 0; n < languages.length; n++) {
                          var languageCheck = document.getElementById(languages[n]);
                        }
