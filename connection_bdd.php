<?php
//Connexion propre a votre bdd, pour l'instant
try{
	$connexion = new PDO(
		"mysql:host=localhost;dbname=projet_web_l3_info_fromeyer_nimeskern",
		"root",
		"",
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>