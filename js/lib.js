function onLoginClick() {
    window.location = '/user/auth';
}

function onLogoutClick() {
    window.location = '/user/logout';
}

function onAddNewsClick() {
    window.location = '/news/add';
}

function onRegClick() {
    if (document.getElementById("pswd-input").nodeValue.length < 8)
        document.getElementById("pswd-input").nodeValue 
}

function onAddNewsMouseOver() {
    document.getElementsByClassName("add-news-btn")[0].lastElementChild.setAttribute("src", "../../../img/addNewsFilled.png");
}

function onAddNewsMouseLeave() {
    document.getElementsByClassName("add-news-btn")[0].lastElementChild.setAttribute("src", "../../../img/addNews.png");
}

function onPrevMouseOver() {
    document.getElementById("prev").lastElementChild.setAttribute("src", "../../../img/prevFilled.png");
}

function onPrevMouseLeave() {
    document.getElementById("prev").lastElementChild.setAttribute("src", "../../../img/prev.png");
}

function onNextMouseOver() {
    document.getElementById("next").lastElementChild.setAttribute("src", "../../../img/nextFilled.png");
}

function onNextMouseLeave() {
    document.getElementById("next").lastElementChild.setAttribute("src", "../../../img/next.png");
}

function onToTopMouseOver() {
    document.getElementById("to-top-btn").lastElementChild.setAttribute("src", "../../../img/toTopFilled.png");
}

function onToTopMouseLeave() {
    document.getElementById("to-top-btn").lastElementChild.setAttribute("src", "../../../img/toTop.png");
}