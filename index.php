<!DOCTYPE html>
<html>

<head>
      <title>Cocktaillement</title>
	  <meta charset="utf-8" />
	  <link rel="stylesheet" type="text/css" href="global.css" />
	  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css"/>
</head>

<body>
<?php 
	session_start();
	if(isset($_SESSION['nom'])) include("banniereco.php");
	else include("banniere.php");

	include("Donnees.inc.php");

	$dir_nom = 'Photos'; // dossier contenant les photos
	$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
	$fichier= array(); // on déclare le tableau contenant le nom des images
	
	//on recupere le nom des images
	while($element = readdir($dir)) {
	    if($element != '.' && $element != '..' && stristr($element,".jpg")) {
	        if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
	    }
	}

	//recupere le nom des cocktails sans le .jpg et _
	for($i=0;$i<sizeof($fichier);$i++){
		$nom_cocktail[$i] = $fichier[$i];
		$nom_cocktail[$i] = str_replace(".jpg", "", $nom_cocktail[$i]);
		$nom_cocktail[$i] = str_replace("_", " ", $nom_cocktail[$i]);
	} 

	closedir($dir);//fermeture du dossier
	
	//affichage des images
	if(!empty($fichier)){
		$i = 0;
	        foreach($fichier as $lien) {
	            echo "\t\t\t
	            <div class=\"col-lg-3 col-md-4\">
	            	<div class=\"cocktail\">
	            		<figure>
							<img src=\"$dir_nom/$lien \" alt=\"$nom_cocktail[$i]\"/>
							<figcaption>$nom_cocktail[$i]</figcaption>
						</figure>
					</div>
				</div>";
				$i++;
	        }
	 }
?>
</body>
</html>