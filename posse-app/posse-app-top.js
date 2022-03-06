(function () {
  const modalArea = document.getElementById("modalArea");
  const openModal = document.getElementById("openModal");
  const closeModal = document.getElementById("closeModal");
  const modalBg = document.getElementById("modalBg");
  const toggle = [openModal, closeModal, modalBg];

  for (let i = 0, len = toggle.length; i < len; i++) {
    toggle[i].addEventListener(
      "click",
      function () {
        modalArea.classList.toggle("is-show");
      },
      false
    );
  }
})();

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
  document
    .getElementById("clicked_checkbox_tweet")
    .classList.toggle("modal-checkbox__circle-checked"); //チェックボックスを青くする
  document
    .getElementById("clicked_checkbox_tweet")
    .classList.toggle("modal-checkbox__circle");
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

const formElements = document.forms.contactForm;
