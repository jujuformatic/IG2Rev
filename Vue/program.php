<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/program.css">
    <script src="JS/program.js"></script>
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
        <div  class="link" onclick="location.href='index.php?view=accueil'">
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
        <form action="training.html" method="post">
            <div class="subject" id="Anglais">
                Anglais
                <input type="checkbox" id="Anglais-box">
                <div class="chapter" id="Tenses">
                    Tenses
                    <input type="checkbox" id="Tenses-box">
                    <div class="lesson" id="Present_continuous">
                        Present continuous
                        <input type="checkbox" id="Present_continuous-box" name="Present_continuous">
                    </div>
                    <div class="lesson" id="Present_perfect_simple">
                        Present perfect simple
                        <input type="checkbox" id="Present_perfect_simple-box" name="Present_perfect_simple">
                    </div>
                </div>
            </div>
            <div class="subject" id="Mathématiques">
                Mathématiques
                <input type="checkbox" id="Mathematiques-box">
                <div class="chapter" id="Complexes">
                    Complexes
                    <input type="checkbox" id="Complexes-box">
                    <div class="lesson" id="Racines_de_l_unite">
                        Racines de l'unite
                        <input type="checkbox" id="Racines_de_l_unite-box" name="Racines_de_l_unite">
                    </div>
                    <div class="lesson" id="Representation_vectorielle">
                        Representation vectorielle
                        <input type="checkbox" id="Representation_vectorielle-box" name="Representation_vectorielle">
                    </div>
                </div>
                <div class="chapter">
                    Matrices
                    <input type="checkbox" id="Matrices-box">
                    <div class="lesson" id="Inversion_de_matrices">
                        Inversion de matrices
                        <input type="checkbox" id="Inversion_de_matrices-box" name="Inversion_de_matrices">
                    </div>
                    <div class="lesson" id="Representation_exponentielle">
                        Representation exponetielle
                        <input type="checkbox" id="Representation_exponentielle-box" name="Representation_exponentielle">
                    </div>
                </div>
            </div>
            <input type="submit" value="Demarer">
        </form>
    </article>
    <div id="expand-button" onclick="ExpandBar()">
        <img src="ressources/expand.png">
    </div>
</body>

</html>