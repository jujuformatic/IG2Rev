function Initiate(){
    var body = document.getElementById("body");

    body.style.setProperty("grid-template-areas",'"nav header" "nav article');

    ExpandBar();
    ResizeText();
}

function ExpandBar(){
    var expand_button = document.getElementById("expand-button");
    var bar = document.getElementById("mainNav");
    var body = document.getElementById("body");

    bar.style.display="block";
    expand_button.style.display="none";
    body.style.setProperty("grid-template-columns","20% 1fr");
    body.style.setProperty("grid-template-areas",'"nav header" "nav article');
}

function CollapseBar(){
    var expand_button = document.getElementById("expand-button");
    var bar = document.getElementById("mainNav");
    var body = document.getElementById("body");

    bar.style.display="none";
    expand_button.style.display="block";
    body.style.setProperty("grid-template-columns","none");

    body.style.setProperty("grid-template-areas",'"header" "article');

}

function ResizeText(){
    var links = document.getElementsByClassName("link");
    var settings = document.getElementById("settings");
    var w = window.innerWidth;
    var font_size=(w/15)+"%";

    settings.style.fontSize=font_size;
    for(var i=0;i<links.length;i++){
        links[i].style.fontSize = font_size;
    }
}

window.onresize = ResizeText;
