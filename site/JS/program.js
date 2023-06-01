function InitiateHome() {
    var body = document.getElementById("body");

    body.style.setProperty("grid-template-areas", '"nav article"');
    body.style.setProperty("grid-template-rows", '100%');

    ExpandBar();
    ResizeText();
}

function ExpandBar() {
    var expand_button = document.getElementById("expand-button");
    var bar = document.getElementById("mainNav");
    var body = document.getElementById("body");

    bar.style.display = "block";
    expand_button.style.display = "none";
    body.style.setProperty("grid-template-columns", "20% 1fr");
}

function CollapseBar() {
    var expand_button = document.getElementById("expand-button");
    var bar = document.getElementById("mainNav");
    var body = document.getElementById("body");

    bar.style.display = "none";
    expand_button.style.display = "block";
    body.style.setProperty("grid-template-columns", "none");
}

function ResizeText() {
    var links = document.getElementsByClassName("link");
    var settings = document.getElementById("settings");
    var w = window.innerWidth;
    var font_size = (w / 15) + "%";

    settings.style.fontSize = font_size;
    for (var i = 0; i < links.length; i++) {
        links[i].style.fontSize = font_size;
    }
}

window.onresize = ResizeText;

document.addEventListener("click", (e) => {
    if (e.target.classList.contains("subject") ||
        e.target.classList.contains("chapter") ||
        e.target.classList.contains("lesson")) {
        if (e.target.children[0].checked == true) {
            e.target.children[0].checked = false;
            e.target.classList.remove("selected");
            CheckChapters(e.target, false);
        } else {
            e.target.children[0].checked = true;
            e.target.classList.add("selected");
            CheckChapters(e.target, true);
        }
    }
});

function CheckChapters(subject, state) {
    for (c = 1; c < subject.children.length; c++) {
        subject.children[c].children[0].checked = state;
        if (state == true)
            subject.children[c].classList.add("selected");
        else
            subject.children[c].classList.remove("selected");
        CheckLessons(subject.children[c], state);
    }
    return;
}

function CheckLessons(chapter, state) {
    for (l = 1; l < chapter.children.length; l++) {
        chapter.children[l].children[0].checked = state;
        if (state == true)
            chapter.children[l].classList.add("selected");
        else
            chapter.children[l].classList.remove("selected");
    }
    return;
}
