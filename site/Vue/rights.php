<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/rights.css">
    <script src="JS/rights.js"></script>
    <title>IG2Rev</title>
</head>

<body onload="Initiate()" id="body">
    <article id="mainArticle">
        <form id="lesson">
            <h1>Options de partage</h1>
            <hr>
            <h2>Groupes</h2>
            <label for="groups">Groupes avec qui vous souhaitez partager la fiche</label><br>
            <select id="groups" name="groups" multiple>
                <option value="IG2I">IG2I</option>
                <option value="LE1">LE1</option>
                <option value="A2">A2</option>
            </select><br>
            <label for="vision">Vision</label>
            <input type="checkbox" id="vision" name="vision"><br>
            <label for="edition">Edition</label>
            <input type="checkbox" id="edition" name="edition"><br>
            <hr>
            <h2>Public</h2>
            <label for="public">Vision</label>
            <input type="checkbox" id="public" name="public"><br>
            <hr>
            <h2>Transférer les droits</h2>
            <p>(la personne doit être dans un groupe en commun)</p>
            <label for="targetUser">Personne à qui vous voulez donner les droits</label><br>
            <select multiple name="targetUser" id="targetUser">
                <option value="admin">Admin</option>
                <option value="theophile">Theophile</option>
            </select>
            <br><br>
            <input type="submit" value="Valider">
        </form>
    </article>
    <header id="pageHeader">
        <div id="location">
            <br>Matière/Chapitre/<b>Leçon</b>
        </div>
        <div id="edit-question" class="action" onclick="location.href='index.php?view=questions'">
            Modifier questions
        </div>
        <div id="edit-rights" class="action">
            Modifier droits
        </div>
        <div id="edit-lesson" class="action" onclick="EditLesson()">
            Modifier fiche
        </div>
        <form  action="lesson.html" id="valid-edit" style="display: none;" class="action" method="post">
            <input id="valid_button" class="action" type="submit" value="Valider">
        </form>
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