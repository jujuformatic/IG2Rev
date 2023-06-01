<?php 
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/subjects.css">
    <script src="JS/script.js"></script>
    <script src="JS/subjects.js"></script>
    <title>IG2Rev</title>
</head>

<body onload="InitiateSubjects()" id="body">
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
        <div class="link" id="selected-link" onclick="location.href='index.php?view=subjects'">
          <h1>Fiches</h1>
      </div>
      <div class="link" onclick="location.href='index.php?view=program'">
          <h1>Entrainement</h1>
      </div>
        <div id="settings" onclick="location.href='index.php?view=settings'">
          <h1>
            <?php echo valider("pseudo","SESSION");
            ?>
          </h1>
      </div>
    </nav>
    <article id="mainArticle">
    <?php $tabSubject=SelectUserSubject(valider("idUser","SESSION"));
     foreach ($tabSubject as  $subject){
            echo   "<div class=\"subject\">
            <div class=\"subject-name\" onclick=\"CollapseExpandSubject(this)\">"
                .$subject['Name'].
            "</div> <div>";
            $idchapter=SelectUserChapter(valider("idUser","SESSION"),$subject['Id']);
            foreach ($idchapter as $chapter){
                echo "<button class=\"chapters\" onclick=\"location.href='index.php?view=chapter&chapter=".urlencode($chapter['Id'])."&MatiereName=".urlencode($subject['Name'])."&ChapterName=".urlencode($chapter['Name'])."'\">"
                .$chapter['Name'].
            "</button>";

            }
        echo   "</div>    </div>";

        }

     
     ;?>
    </article>
    <div id="expand-button" onclick="ExpandBar()">
        <img src="ressources/expand.png">
    </div>
    <div id="subject-menu">
        <form action="controleur.php" method="get">
            <button type="submit" id="delete-button" class="subject-menu-item" name="action" value="DeleteSubject">
                <img src="ressources/trash.png">
                <b>Supprimer</b>
            </button>
            <button type="button" id="edit-button" class="subject-menu-item" onclick="ShowSubjectEdit()">
                <img src="ressources/edit.png">
                <b>Renomer</b>
            </button>
            <input type="text" name="new-name" id="new-s-name" class="subject-menu-item">
            <input type="submit" id="new-s-name-submit"  class="subject-menu-item" name="action" value="Valider">
            <button type="submit" id="add-button" class="subject-menu-item">
                <b>Ajouter chapitre</b>
            </button>
        </form>
        <form action="training.html">
            <button type="submit" id="train-button" class="subject-menu-item">
                <b>Entrainement</b>
            </button>
        </form>
    </div>
    <div id="chapter-menu">
        <div id="delete-button" class="chapter-menu-item">
            <img src="ressources/trash.png">
            <b>Supprimer</b>
        </div>
        <div id="edit-button" class="chapter-menu-item">
            <img src="ressources/edit.png">
            <b>Modifier</b>
        </div>
        <div id="train-button" class="chapter-menu-item">
            <b>Entrainement</b>
        </div>
    </div>
</body>

</html>