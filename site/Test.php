<?php 
include_once "libs/modele.php";
include_once "libs/maLibUtils.php";
include_once "libs/maLibForms.php";
include_once "libs/maLibSecurisation.php";

$subject=SelectSubject();
mkTable($subject);
mkForm("controleur.php");
mkSelect("subject", $subject, "Id", "Name");
mkInput("submit","action","Test");
endForm();


?>