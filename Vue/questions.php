<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/questions.css">
    <script src="JS/questions.js"></script>
    <title>IG2Rev</title>
</head>

<body onload="Initiate()" id="body">
    <article id="mainArticle">
        <form class="container" action="questions.html" class="valid-edit" method="post">
            <label for="question">Question</label>
            <br><textarea name="question" id="question">Calculer le déterminant de la matrice suivante:( 1 0 0 0
0 1 0 0
0 0 1 0
0 0 0 1)</textarea>
            <div id="answers">
                <label for="true">True answer</label>
                <input id="true" type="text" class="true" value="4">
                <br><label for="wrong1">Wrong answer 1</label>
                <input id="wrong1" type="text" class="wrong" value="-4">
                <br><label for="wrong2">Wrong answer 2</label>
                <input id="wrong2" type="text" class="wrong" value="-1">
                <br><label for="wrong3">Wrong answer 3</label>
                <input id="wrong3" type="text" class="wrong" value="1">
            </div>
            <input type="submit" value="Valider les modifications">
        </form>
    </article>
    <header id="pageHeader">
        <div id="location">
            <br>Matière/Chapitre/<b>Leçon</b>
        </div>
        <div id="edit-question" class="action selected">
            Questions
        </div>
        <div id="edit-rights" class="action">
            Modifier droits
        </div>
        <div id="edit-lesson" class="action" onclick="location.href='index.php?view=lesson'">
            Retourner à la fiche
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
        <div  class="link" onclick="location.href='index.php?view=subjects'">
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