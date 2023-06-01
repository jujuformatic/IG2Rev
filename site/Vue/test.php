<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/test.css">
    <script src="JS/test.js"></script>
    <title>IG2Rev</title>
</head>

<body onload="Initiate()" id="body">
    <article id="mainArticle">
        <div id="buttons">
            <button id="previous" type="submit">
                Précédent
            </button>
            <button id="next" type="submit">
                Suivant
            </button>
        </div>
        <div id="test">
            <div id="question">
                <p>Calculer le déterminant de la matrice suivante:<br>( 1 0 0 0<br> 0 1 0 0<br> 0 0 1 0<br> 0 0 0 1)</p>
            </div>
            <div id="answers">
                <button class="answer" id="answer1">
                    <p>4</p>
                </button>
                <button class="answer" id="answer2">
                    <p>-4</p>
                </button>
                <button class="answer" id="answer3">
                    <p>-1</p>
                </button>
                <button class="answer" id="answer4">
                    <p>1</p>
                </button>
            </div>
        </div>
    </article>
    <header id="pageHeader">
        <b><br>Nom de la fiche ici</b>
        <div id="progress"></div>
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
        <div class="link" onclick="location.href='index.php?view=subjects'">
            <h1>Fiches</h1>
        </div>
        <div class="link" onclick="location.href='index.php?view=program'">
          <h1>Entrainement</h1>
      </div>
        <div id="selected-link" class="link">
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