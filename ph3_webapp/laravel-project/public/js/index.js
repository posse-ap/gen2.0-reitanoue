(function () {
    const modalArea = document.getElementById("modalArea");
    const openModal = document.getElementById("openModal");
    const openModalResponsive = document.getElementById("openModalResponsive");
    const closeModal = document.getElementById("closeModal");
    const modalBg = document.getElementById("modalBg");
    const toggle = [openModal, openModalResponsive, closeModal, modalBg];

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

/*
 *カレンダー
 */

/* 以下クリックでモーダル風にカレンダー表示 */
let sample = document.getElementById("studyDate"); /* flatpickrが発火するid */
let mainWrapper =
    document.getElementById("modalContents"); /* モーダルを覆うid */
let determinationButton = document.getElementById(
    "determination__button"
); /* 完了ボタンid */
let displayCalenderId =
    document.getElementById("appendTo"); /* カレンダー表示範囲のdivタグのid */

/* カレンダーと決定ボタン表示するクリックイベント */
function displayCalender() {
    mainWrapper.style.visibility =
        "collapse"; /* モーダル内の要素を見えなくする */

    let fpPlus = flatpickr(sample, {
        shorthandCurrentMonth: true,
        nextArrow: '<span class="custom">＞</span>',
        prevArrow: '<span class="custom">＜</span>',
        inline: true /* 常にカレンダーを開いた状態で表示 */,
    });
    flatpickr("study__date", fpPlus); /* ここまで flatpickr オプション変更 */

    determinationButton.style.visibility = "visible";
    displayCalenderId.style.position = "absolute";
    displayCalenderId.style.left = "29rem";
    displayCalenderId.style.top = "0.1rem";
}
sample.addEventListener("click", displayCalender);

/* カレンダーと決定ボタン非表示にするクリックイベント */
function closeCalender() {
    mainWrapper.style.visibility = "visible";
    let fpPlus = flatpickr(sample, {
        dateFormat: "Y年n月j日", // フォーマットの変更
        shorthandCurrentMonth: true,
        nextArrow: '<span class="custom">></span>',
        prevArrow: '<span class="custom"><</span>',
        inline: false /* ボタンを押したらカレンダー閉じる */,
    });
    flatpickr("study__date", fpPlus); /* ここまで flatpickr オプション変更 */

    determinationButton.style.visibility = "hidden";
    displayCalenderId.style.position = "relative";
    displayCalenderId.style.left = "0rem";
    displayCalenderId.style.top = "0rem";
}
determinationButton.addEventListener("click", closeCalender);

// チェックボックスの動き
function chbg1(chkID) {
    Myid = document.getElementById(chkID);
    if (Myid.checked == true) {
        Myid.parentNode.style.backgroundColor = "#e7f5ff";
    } else {
        Myid.parentNode.style.backgroundColor = "#f5f5f8";
    }
}
function chbg2(chkID) {
    Myid = document.getElementById(chkID);
    if (Myid.checked == true) {
        Myid.parentNode.style.backgroundColor = "#e7f5ff";
    } else {
        Myid.parentNode.style.backgroundColor = "#f5f5f8";
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
            window.open(
                "https://twitter.com/intent/tweet?text=" + twitterContents
            );
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
