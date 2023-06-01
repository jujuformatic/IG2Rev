<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/training.css">
    <script src="JS/training.js"></script>
    <title>IG2Rev</title>
</head>

<body onload="Initiate()" id="body">
    <article id="mainArticle">
        <div id="buttons">
            <button id="stop" type="submit">
                Arrêter
            </button>
            <button id="continue" type="submit">
                Continuer
            </button>
        </div>
        <div id="train">
            <div id="question">
                <p>Calculer le déterminant de la matrice suivante:<br>( 1 0 0 0<br> 0 1 0 0<br> 0 0 1 0<br> 0 0 0 1)</p>
            </div>
            <div id="answers">
                <button class="answer">
                    <p>4</p>
                </button>
                <button class="answer">
                    <p>-4</p>
                </button>
                <button class="answer">
                    <p>-1</p>
                </button>
                <button class="answer" id="true-answer">
                    <p>1</p>
                </button>
            </div>
        </div>
    </article>
    <header id="pageHeader">
        <div id="wrong">
            <img src="ressources/Wrong.png">
            10
        </div>
        <div id="true">
            <img src="ressources/True.png">
            8
        </div>
        <b><br>Nom de la fiche ici</b>
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
        <div class="link" id="selected-link"  onclick="location.href='index.php?view=training'">
          <h1>Entrainement</h1>
      </div>
      <div  class="link" onclick="location.href='index.php?view=test'">
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