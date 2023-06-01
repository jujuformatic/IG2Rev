var lessonMenu = document.getElementById("lesson-menu");

var targetLesson;

function Initiate() {
    var body = document.getElementById("body");

    body.style.setProperty("grid-template-areas", '"nav header" "nav article');

    ExpandBar();
    ResizeText();

    lessonMenu = document.getElementById("lesson-menu");
}

function ExpandBar() {
    var expand_button = document.getElementById("expand-button");
    var bar = document.getElementById("mainNav");
    var body = document.getElementById("body");

    bar.style.display = "block";
    expand_button.style.display = "none";
    body.style.setProperty("grid-template-columns", "20% 1fr");
    body.style.setProperty("grid-template-areas", '"nav header" "nav article');
}

function CollapseBar() {
    var expand_button = document.getElementById("expand-button");
    var bar = document.getElementById("mainNav");
    var body = document.getElementById("body");

    bar.style.display = "none";
    expand_button.style.display = "block";
    body.style.setProperty("grid-template-columns", "none");

    body.style.setProperty("grid-template-areas", '"header" "article');

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
    HideEdit();

    if (!event.target.classList.contains("lesson-item")) {
        lessonMenu.classList.remove("visible");
        return;
    }

    event.preventDefault();

    const { clientX: mouseX, clientY: mouseY } = event;

    lessonMenu.style.top = `${mouseY}px`;
    lessonMenu.style.left = `${mouseX}px`;

    if (event.target.classList.contains("lesson")) {
        targetLesson = event.target;
    } else if (event.target.parentElement.classList.contains("lesson")) {
        targetLesson = event.target.parentElement;
    }
    else if (event.target.parentElement.parentElement.classList.contains("lesson")) {
        targetLesson = event.target.parentElement.parentElement;
    }
    lessonMenu.classList.add("visible");
});

document.addEventListener("click", (e) => {
    if (
        e.target.parentElement.parentElement != lessonMenu &&
        e.target.parentElement.parentElement.parentElement != lessonMenu) {
        lessonMenu.classList.remove("visible");
    }
});

function ShowEdit(){
    var name = document.getElementById("new-name");
    var desc = document.getElementById("new-description");
    var submit = document.getElementById("new-submit");

    var options = document.getElementsByClassName("lesson-menu-item");
    Array.from(options).forEach((option)=>{
        option.style.display="none";
    })

    name.style.display="block";
    desc.style.display="block";
    submit.style.display="block";
    
    name.value=targetLesson.children[0].innerText;
    desc.value=targetLesson.children[1].innerText;
}

function HideEdit(){
    var name = document.getElementById("new-name");
    var desc = document.getElementById("new-description");
    var submit = document.getElementById("new-submit");

    var options = document.getElementsByClassName("lesson-menu-item");
    Array.from(options).forEach((option)=>{
        option.style.display="block";
    })

    name.style.display="none";
    desc.style.display="none";
    submit.style.display="none";    
}