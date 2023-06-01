<?php
include_once "libs/maLibUtils.php";
include_once "libs/maLibSQL.pdo.php";
include_once "libs/maLibSecurisation.php";
include_once "libs/modele.php";

$idchapter = valider("chapter");
$MatiereName = urldecode(valider("MatiereName"));
$ChapterName = urldecode(valider("ChapterName"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/chapter.css">
    <script src="JS/chapter.js"></script>
    <title>IG2Rev</title>
</head>

<body onload="Initiate()" id="body">
    <header id="pageHeader">
        <div id="location">
            <?php
            echo "<br>" . $MatiereName . "/<b>" . $ChapterName . "</b>";
            ?>
        </div>
        <div id="search">
            <br>
            <img src="ressources/search.jpg">
            <input type="text">
        </div>
    </header>
    <nav id="mainNav">
        <div id="logo">
            <img src="ressources/IG2Rev_Logo.png">
        </div>
        <div id="collapse-button" onclick="CollapseBar()">
            <img src="ressources/collapse.jpeg">
        </div>
        <div  class="link" onclick="location.href='index.php?view=accueil'">
            <h1>Accueil</h1>
        </div>
        <div id="selected-link" class="link" onclick="location.href='index.php?view=subjects'">
            <h1>Fiches</h1>
        </div>
        <div class="link" onclick="location.href='index.php?view=program'">
            <h1>Entrainement</h1>
        </div>
        <div class="link">
            <h1>Test</h1>
        </div>
        <div id="settings" onclick="location.href='index.php?view=settings'">
            <h1>
                <?php echo valider("pseudo", "SESSION");
                ?>
            </h1>
        </div>
    </nav>
    <article id="mainArticle">
        <?php
        $tablesson = SelectUserChapterLesson(valider("idUser", "SESSION"), $idchapter);
        foreach ($tablesson as $lesson) {
            echo "<div class=\"lesson\" id=".$lesson["Id"]." onclick=\"location.href='index.php?view=lesson&lesson=" . $lesson["Id"] . "&MatiereName=" . urlencode($MatiereName) . "&ChapterName=" . urlencode($ChapterName) . "&LessonName=" . urlencode($lesson["Title"]) . "'\">" .
                "<div class=\"lesson-name lesson-item\">"
                . $lesson["Title"] .
                "</div>
            <div class=\"lesson-description lesson-item\">"
                . $lesson["Description"] .
                "</div> <div class=\"lesson-sharing lesson-item\">";
            if ($lesson["Owner"] == valider("idUser", "SESSION"))
                echo "<img class=\"lesson-item\" src=\"ressources/person.png\">";
            if ((SelectLessonGroups($lesson["Id"], 0) != array()) || (SelectLessonGroups($lesson["Id"], 1) != array()))
                echo "<img class=\"lesson-item\" src=\"ressources/people.png\">";
            if (SelectLessonInGroup($lesson["Id"], 0) == $lesson["Id"]) {
                echo "<img class=\"lesson-item\" src=\"ressources/world.png\">";
            }
            echo "</div> </div>";
        }
        ?>
    </article>
    <div id="expand-button" onclick="ExpandBar()">
        <img src="ressources/expand.png">
    </div>
    <div class="lesson-menu">
        <form action="controleur.php method=get">
            <button type="submit" id="delete-button" class="lesson-menu-item" name="action" value="DeleteLesson" >
                <img src="ressources/trash.png">
                <b>Supprimer</b>
            </button>
            <button type="button" id="edit-button" class="lesson-menu-item" onclick="ShowEdit()">
                <img src="ressources/edit.png">
                <b>Modifier</b>
            </button>
            <input type="text" name="new-name" id="new-name" class="lesson-menu-item">
            <textarea name="new-description" id="new-description" class="lesson-menu-item"></textarea>
            <input type="submit" id="new-submit" value="Valider" class="lesson-menu-item">
            <input type="hidden" name="lesson" class="lesson-id" value="">
        </form>
        <form action="training.html">
            <button type="submit" id="train-button" class="lesson-menu-item">
                <b>Entrainement</b>
            </button>
            <input type="hidden" name="lesson" class="lesson-id" value="">
        </form>
        <form action="lesson.html">
            <button type="submit" id="open-button" class="lesson-menu-item">
                <b>Ouvrir fiche</b>
            </button>
            <input type="hidden" name="lesson" class="lesson-id" value="">
        </form>
        <form action="rights.html">
            <button type="submit" id="rights-button" class="lesson-menu-item">
                <b>Gérer droit</b>
            </button>
            <input type="hidden" name="lesson" class="lesson-id" value="">
        </form>
    </div>
    <form action="chapter.html">
        <button id="new-lesson" type="submit"><b>+ Fiche</b></button>
    </form>
</body>

</html>