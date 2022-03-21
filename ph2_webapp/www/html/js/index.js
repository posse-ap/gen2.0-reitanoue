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



let contentElements = document.getElementsByName("studyContent");
for (let i = 0; i < contentElements.length; i++) {
  if (contentElements[i].checked) {
    document.getElementsByClassName(".checkmark").classList.toggle(".checked");
  }
}

let langElements = document.getElementsByName("studyLanguage");
for (let i = 0; i < langElements.length; i++) {
  if (langElements[i].checked) {
    document.getElementsByClassName(".checkmark").classList.toggle(".checked");
  }
}



// コンソールに引数を返す動き（コンテンツ）
const func1 = () => {
  const contentElements = document.getElementsByName("studyContent");
  for (let i = 0; i < contentElements.length; i++) {
    if (contentElements[i].checked) {
      console.log(contentElements[i].value);
    }
  }
};

// コンソールに引数を返す動き（言語）
const func2 = () => {
  const langElements = document.getElementsByName("studyLanguage");
  for (let i = 0; i < langElements.length; i++) {
    if (langElements[i].checked) {
      console.log(langElements[i].value);
    }
  }
};


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

// let languages = [
//   "HTML",
//   "css",
//   "JavaScript",
//   "PHP",
//   "Laravel",
//   "SQL",
//   "SHELL",
//   "basic-knowledge",
// ];

// for (let n = 0; n < languages.length; n++) {
//   var languageCheck = document.getElementById(languages[n]);
// }
