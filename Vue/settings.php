<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/settings.css">
    <script src="JS/settings.js"></script>
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
      <div class="link" onclick="location.href='index.php?view=accueil'">
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
        <form id="page">
            <h1>Paramètres utilisateur</h1>
            <hr>
            <h2>Groupes</h2>
            <label for="groups">Groupes actuels</label><br>
            <select id="groups" name="groups" multiple>
                <option value="IG2I">IG2I</option>
                <option value="LE1">LE1</option>
                <option value="A2">A2</option>
            </select>
            <input type="submit" value="Quitter">
            <br><br>
            <label for="group">Rejoindre/créer groupe</label><br>
            <input type="text" id="group" name="group">
            <input type="submit" value="Rejoindre">
            <hr><br>
            <label for="theme">Thème sombre</label><br>
            <button type="submit" id="theme">
                <img src="ressources/sun.png" id="selected-theme">
                <img src="ressources/moon.png">
            </button>
            <hr><br>
            <label for="name">Changer nom d'utilisateur</label><br>
            <input type="text" id="name" name="name">
            <input type="submit" value="Modifier">
            <br><br>
            <label for="pass1">Changer MDP</label><br>
            <input type="password" id="pass1" name="pass1">
            <input type="password" id="pass2" name="pass2">
            <input type="submit" value="Modifier">
            <hr><br>
            <input type="submit" value="Supprimer compte utilisateur">
        </form>
    </article>
    <div id="expand-button" onclick="ExpandBar()">
        <img src="ressources/expand.png">
    </div>
</body>

</html>