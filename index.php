<?php
session_start();




	include_once "libs/maLibUtils.php";


	$view = valider("view"); 

	if (!$view) $view = "accueil"; 


	// En fonction de la vue à afficher, on appelle tel ou tel template
	switch($view)
	{		

		case "accueil" : 
			include("Vue/accueil.php");
		break;


		default : // si le template correspondant à l'argument existe, on l'affiche
			if (file_exists("Vue/$view.php"))
				include("Vue/$view.php");

	}




	
?>








