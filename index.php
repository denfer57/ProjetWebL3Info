<!DOCTYPE html>
<html>

<head>
    <title>Cocktaillement</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="global.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<?php 
	$html = "";
	session_start();
	if(isset($_SESSION['nom'])) include("banniereco.php");
	else include("banniere.php");

	include("Donnees.inc.php");

	if(isset($_GET['elt']))	{
		$filAriane = getTabAriane($_GET['elt'], []);
		$html .= afficherSousCateg($_GET['elt'], $Hierarchie).'
		<ol class="breadcrumb" >
			<li><a href="index.php">Accueil</a></li>';	
			foreach($filAriane as $element){
				$html .= '<li><a href="?elt='.htmlspecialchars($element).'">'. $element.'</a></li>';
			}
		$html .= '</ol>';
		if(isset($_POST['recherche'])) {
			$html .= afficherAllCocktails(getInfosRecettes(getNoRecettesAPartirDuTitre($_POST['recherche'])));
		}	
		else $html .= afficherAllCocktails(getInfosRecettes(getNoRecettes($_GET['elt'])));
	}
	else {
		$html .= afficherSousCateg(getRacine($Hierarchie), $Hierarchie).'
		<ol class="breadcrumb" >
			<li><a href="index.php">Accueil</a></li>
		</ol>';
		if(isset($_POST['recherche'])) {
			$html .= afficherAllCocktails(getInfosRecettes(getNoRecettesAPartirDuTitre($_POST['recherche'])));
		}	
		else $html .= afficherAllCocktails(getTousLesCocktails());
	}


	//print_r(getNoRecettes("Assaisonnement", $Recettes));
	//$html .= afficherRecettes(getRecette("Malibu"));
	//$html .= afficherAllCocktails(getInfosRecettes(getNoRecettes("Malibu")));
	/*if(isset($_GET['elt'])) {
		afficherSousCateg(getSousCategCocktails($_GET['elt'], $Hierarchie));
	}
	else */
	
	
	//print_r(afficherSousCateg("Fruit", $Hierarchie));
	//$html .= afficherSousCateg(getSousCategCocktails("Épice", $Hierarchie));
	
	//affichage des super-categorie
	/*$superCategorie = [];
	$j = 0;
	foreach ($Hierarchie as $categorie => $key) {
		if (array_key_exists('super-categorie', $key)){
			for($i = 0; $i < count($key['super-categorie']); $i++){
				if(!in_array($key['super-categorie'][$i], $superCategorie)) {
					$superCategorie[$j] = $key['super-categorie'][$i];
					$html .= "<div class=\"col-lg-3 col-md-4\">
				 		".$superCategorie[$j]."</br>
			 		</div>";
					$j++;
				}
			}
		}
	}*/

	//affichage des sous-categorie
	/*$sousCategorie = [];
	$k = 0;
	foreach ($Hierarchie as $categorie => $key) {
		if (array_key_exists('sous-categorie', $key)){
			if(!in_array($key['sous-categorie'], $sousCategorie)) {
				$sousCategorie[$k] = $key['sous-categorie'][$i];
				echo "<div class=\"col-lg-3 col-md-4\">
			 		".$sousCategorie[$k]."</br>
		 		</div>";
				$k++;
			}
		}
	}*/

	/*affichage des catégories
	foreach ($Hierarchie as $categorie => $key) {
	echo "<div class=\"col-lg-3 col-md-4\">
			 $categorie </br>
		 </div>";
	}*/

	 

	/*$html = "";
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

    //affichage des images et titres
    if(!empty($fichier)){
        $i = 0;
            foreach($fichier as $lien) {
                $html .=  "\t\t\t
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
     }*/

	echo $html;
?>
</body>
</html>