<?php
   error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cocktaillement</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="global.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="source.css">
</head>

<body>

<?php 
	$html = "";
	session_start();
	if(isset($_SESSION['no_util'])) include("banniereco.php");
	else include("banniere.php");

	include("Donnees.inc.php");

	if(isset($_GET['elt']))	{
		$filAriane = getTabAriane($_GET['elt'], []);
		if(isset($_POST['recherche'])) {
			$html .= '<ol class="breadcrumb" >
				<li><a href="index.php">Accueil</a></li>
			</ol>
			<h3>Résultat de votre recherche :</h3>'.afficherAllCocktails(getInfosRecettes(getNoRecettesAPartirDuTitre($_POST['recherche'])));
		}	
		else {
			$html .= afficherSousCateg($_GET['elt'], $Hierarchie).'
			<ol class="breadcrumb" >
				<li><a href="index.php">Accueil</a></li>';	
				foreach($filAriane as $element){
					$html .= '<li><a href="?elt='.htmlspecialchars($element).'">'. $element.'</a></li>';
				}
			$html .= '</ol>'.afficherAllCocktails(getInfosRecettes(getNoRecettes($_GET['elt'])));
		}
	}
	else {
		if(isset($_POST['recherche'])) {
			$html .= '<ol class="breadcrumb" >
				<li><a href="index.php">Accueil</a></li>
			</ol>
			<h3>Résultat de votre recherche :</h3>'.afficherAllCocktails(getInfosRecettes(getNoRecettesAPartirDuTitre($_POST['recherche'])));
		}	
		else {
			$html .= afficherSousCateg(getRacine($Hierarchie), $Hierarchie).'
			<ol class="breadcrumb" >
				<li><a href="index.php">Accueil</a></li>
			</ol>'.afficherAllCocktails(getTousLesCocktails());
		}
	}

	echo $html;
?>
</body>
</html>
