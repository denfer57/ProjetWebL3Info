<?php
	include 'connection_bdd.php';
	include 'fonctions.php';
	session_start();

    if(isset($_SESSION["no_util"])){
        $no_util = $_SESSION["no_util"];
        foreach($_POST as $cle => $val)
        {
        	$cocktail = getNoRecetteAPartirDuTitre(normaliser($val));
        	if(!estFavoris($cocktail)){
        		ajouteFavoris($no_util, $cocktail);
        	}
        } 
     }
     else{
         foreach($_POST as $cle => $val)
         {
         	$cocktail = getNoRecetteAPartirDuTitre(normaliser($val));
            setCookie('fav['.$cocktail.']',$val, time()+3600);
         }
     }
?>