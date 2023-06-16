<?php
session_start();

include_once "libs/maLibUtils.php";
include_once "libs/maLibSQL.pdo.php";
include_once "libs/maLibSecurisation.php";
include_once "libs/modele.php";

if ($action = valider("action")) {
    switch ($action) {
        case 'Inscription':
            $qs = array("view" => "accueil");
            if ($login = valider("login"))
                if ($passe = valider("passe")) {

                    if (!verifUser($login, $passe)) {
                        FirstConnection($login, $passe);
                    }
                }

            // On redirigera vers la page index automatiquement
            break;

        case 'Connexion':

            if ($login = valider("id"))
            if ($password = valider("password"))
            {
                // On verifie l'utilisateur, 
                // et on crée des variables de session si tout est OK
                // Cf. maLibSecurisation
                if (verifUser($login,$password)) {
                    // tout s'est bien passé, doit-on se souvenir de la personne ? 
                    if (valider("remember")) {
                        setcookie("login",$login , time()+60*60*24*30);
                        setcookie("password",$password, time()+60*60*24*30);
                        setcookie("remember",true, time()+60*60*24*30);
                    } else {
                        setcookie("login","", time()-3600);
                        setcookie("password","", time()-3600);
                        setcookie("remember",false, time()-3600);
                    }
                }
                print_r($_SESSION);
                print_r($_COOKIE);
            }
            break;
        case 'Logout':
            // traitement métier
            session_destroy();
            break;

        case 'JoinGroup':
            if (
                ($idgroup = valider("idUser", "GET")) &&
                ($numeroUtilisateur = valider("idUser", "SESSION"))
            )
                if (!InGroup($numeroUtilisateur, $idgroup)) {
                    MakeUserTeamsLink($numeroUtilisateur, $idgroup);
                }
            break;

        case 'LeaveGroup':
            if (
                ($idgroup = valider("idUser", "GET")) &&
                ($numeroUtilisateur = valider("idUser", "SESSION"))
            )
                if (InGroup($numeroUtilisateur, $idgroup)) {
                    DeleteUserTeamsLinks($numeroUtilisateur, $idgroup);
                }
            break;

        case 'ChangePseudo':
            if (
                ($numeroUtilisateur = valider("idUser", "SESSION")) &&
                ($newpseudo = valider("newpseudo", "GET")) &&
                valider("connecte", "SESSION")
            ) {
                UpdateUsername($newpseudo, $numeroUtilisateur);
            }
            break;
        case 'ChangePassword':
            if (
                ($numeroUtilisateur = valider("idUser", "SESSION")) &&
                ($newpass = valider("newpass", "GET")) &&
                valider("connecte", "SESSION")
            ) {
                UpdatePassword($newpseudo, $numeroUtilisateur);
            }
            break;
        
        case 'UpdateLesson':
                if (
                    ($idLesson= valider("idLesson", "SESSION")) &&
                    ($newText = valider("newtext", "GET")) &&
                    valider("connecte", "SESSION")
                ) {
                    UpdateLessonText($idLesson,$newText);
                }
                break;

        case 'DeleteLesson':
            if ($idLesson=valider("lesson","GET")){
                 if (SelectLessonGroupEditUser(valider("idUser","SESSION"),$idLesson)){
                    if (valider("connecte", "SESSION")){
                        DeleteLesson($idLesson);
                    }
                 }
            }
            
    }
}
$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
rediriger($urlBase, $qs);


?>