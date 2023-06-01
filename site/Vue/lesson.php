<?php
include_once "libs/maLibUtils.php";
include_once "libs/maLibSQL.pdo.php";
include_once "libs/maLibSecurisation.php";
include_once "libs/modele.php";

$idLesson = valider("lesson");
$MatiereName = urldecode(valider("MatiereName"));
$ChapterName = urldecode(valider("ChapterName"));
$LessonName = urldecode(valider("LessonName"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/lesson.css">
    <script src="JS/lesson.js"></script>
    <title>IG2Rev</title>
</head>

<body onload="Initiate()" id="body">
    <article id="mainArticle">
        <div id="lesson">
        <?php
        $lesson=SelectLessonbyId($idLesson);
        echo ($lesson[0])["Text"];
        ?>
        </div>
    </article>
    <header id="pageHeader">
        <div id="location">
        <?php
            echo     "<br>".$MatiereName."/".$ChapterName."/"."<b>".$LessonName."</b>"
        ?>
        </div>
        <?php
        if (SelectLessonGroupEditUser(valider("idUser","SESSION"),$idLesson)){
        echo "<div id=\"edit-question\" class=\"action\" onclick=\"location.href='index.php?view=questions'\">
            Modifier questions
        </div>
        <div id=\"edit-rights\" class=\"action\" onclick=\"location.href='index.php?view=rights'\">
            Modifier droits
        </div>
        <div id=\"edit-lesson\" class=\"action\" onclick=\"EditLesson()\">
            Modifier fiche
        </div>
        <form  action=\"controleur.php\" id=\"valid-edit\" style=\"display: none;\" class=\"action\" method=\"post\">
        <input type=\"hidden\" name=\"lessonId\"  value=".$idLesson."> 
        <input id=\"valid_button\" class=\"action\" name=\"action\" type=\"submit\" value=\"Valider\"> </form>";
        }
        ?>
    </header>
    <nav id="mainNav">
        <div id="logo">
            <img src="ressources/IG2Rev_Logo.png">
        </div>
        <div id="collapse-button" onclick="CollapseBar()">
            <img src="ressources/collapse.jpeg">
        </div>
        <div class="link" onclick="location.href='index.php?view=accueil'">
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
            <?php echo valider("pseudo","SESSION");
            ?>
          </h1>
      </div>
    </nav>
    <div id="expand-button" onclick="ExpandBar()">
        <img src="ressources/expand.png">
    </div>
</body>

</html>