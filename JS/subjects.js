var chapterMenu;
var subjectMenu;

function InitiateSubjects() {
    var body = document.getElementById("body");

    body.style.setProperty("grid-template-areas", '"nav article"');
    body.style.setProperty("grid-template-rows", '100%');

    ExpandBar();
    ResizeText();

    chapterMenu = document.getElementById("chapter-menu");
    subjectMenu = document.getElementById("subject-menu");
}

function CollapseExpandSubject(ref) {
    var container = ref.parentElement.lastElementChild;
    if (container.style.display == "none") {
        container.style.display = "block"
        return;
    }
    container.style.display = "none";
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

document.addEventListener("contextmenu", (event) => {
    console.log(event.target);
    if(event.target.classList[0]!="subject-name" && event.target.classList[0]!="chapters"){
        subjectMenu.classList.remove("visible");
        chapterMenu.classList.remove("visible");
        return;
    }

    event.preventDefault();

    const { clientX: mouseX, clientY: mouseY } = event;

    subjectMenu.style.top = `${mouseY}px`;
    subjectMenu.style.left = `${mouseX}px`;
    chapterMenu.style.top = `${mouseY}px`;
    chapterMenu.style.left = `${mouseX}px`;

    if(event.target.classList[0]=="subject-name"){
        chapterMenu.classList.remove("visible");
        subjectMenu.classList.add("visible");
    }

    if(event.target.classList[0]=="chapters"){
        subjectMenu.classList.remove("visible");
        chapterMenu.classList.add("visible");
    }
});

document.addEventListener("click", (e) => {
    if (e.target.offsetParent != subjectMenu && e.target.offsetParent != chapterMenu) {
        subjectMenu.classList.remove("visible");
        chapterMenu.classList.remove("visible");
    }
});
