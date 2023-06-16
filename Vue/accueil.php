<?php 
include_once "libs/modele.php";
include_once "libs/maLibUtils.php";
include_once "libs/maLibForms.php";
include_once "libs/maLibSecurisation.php";
securiser("login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/accueil.css">
    <script src="JS/accueil.js"></script>
    <title>IG2Rev</title>
</head>

<body onload="InitiateHome()" id="body">
    <nav id="mainNav">
      <div id="logo">
          <img src="ressources/IG2Rev_Logo.png">
      </div>
      <div id="collapse-button" onclick="CollapseBar()">
          <img src="ressources/collapse.jpeg">
      </div>
      <div id="selected-link" class="link" onclick="location.href='index.php?view=accueil'">
          <h1>Accueil</h1>
      </div>
      <div class="link" onclick="location.href='index.php?view=subjects'">
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
        <div class="review">
            <div class="time" onclick="CollapseExpandReview(this)">
                <p>
                    A revoir: 1 jour
                </p>
            </div>
            <form class="container" action="test.html">
                <button class="lesson" type="submit">
                    <p class="lesson-name">
                        Present Continuous
                    </p>
                    <p class="lesson-time">
                        Non travaillé depuis: 1 jour
                    </p>
                </button>
                <button class="lesson" type="submit">
                    <p class="lesson-name">
                        Present perfect simple
                    </p>
                    <p class="lesson-time">
                        Non travaillé depuis: 2 jour
                    </p>
                </button>
                <button class="lesson" type="submit">
                    <p class="lesson-name">
                        Inversion de matrices
                    </p>
                    <p class="lesson-time">
                        Non travaillé depuis: 6 jour
                    </p>
                </button>
            </form>
        </div>
        <div class="review">
            <div class="time" onclick="CollapseExpandReview(this)">
                <p>
                    A revoir: 1 mois
                </p>
            </div>
            <form class="container">
                <button class="lesson" type="submit">
                    <p class="lesson-name">
                        Déterminant de matrices
                    </p>
                    <p class="lesson-time">
                        Non travaillé depuis: 32 jour
                    </p>
                </button>
                <button class="lesson" type="submit">
                    <p class="lesson-name">
                        Compte de résultat
                    </p>
                    <p class="lesson-time">
                        Non travaillé depuis: 68 jour
                    </p>
                </button>
            </form>
        </div>
    </article>
    <div id="expand-button" onclick="ExpandBar()">
        <img src="ressources/expand.png">
    </div>
</body>

</html>