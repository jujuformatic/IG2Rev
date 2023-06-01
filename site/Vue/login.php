<?php

$login = valider("login", "COOKIE");
$passe = valider("password", "COOKIE"); 
if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>IG2Rev</title>
</head>

<body>
    <div id="header">
        <div id="IG2RevLogo">
            <img src="ressources/IG2Rev_Logo.png">
        </div>
    </div>
    <div id="page">
        <div id="form-back">
            <form action="controleur.php" method="GET">
                <label for="id"> Identifiant:</label></br>
                <input type="text" name="id" id="id" value="<?php echo $login;?>"></br></br>
                <label for="password"> Mot de passe:</label></br>
                <input type="password" name="password" id="password" value="<?php echo $passe;?>"></br></br>
                <input type="checkbox" name="remember" id="stay-connected" <?php echo $checked;?>>
                <label for="stay-connected"> Rester connecté</label></br></br>
                <input type="submit" name="action" value="Connexion" />
            </form>
        </div>
    </div>
    <div id="footer">
        <div id="CentralelilleLogo">
            <img src="ressources/Centralelille_Logo.png">
        </div>
    </div>
</body>

</html>