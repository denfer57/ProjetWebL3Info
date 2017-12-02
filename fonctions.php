<?php
function addRecettesBDD() { //ajoute les recettes dans la BDD
    include("connection_bdd.php");
    for($i = 0 ; $i<count($Recettes) ; $i++){
            $index[$i] = "";
            $titre[$i] = $Recettes[$i]['titre'];
            $ingredients[$i] = $Recettes[$i]['ingredients'];
            $preparation[$i] = $Recettes[$i]['preparation'];
            for($j = 0 ; $j < count($Recettes[$i]['index']); $j++){
                $index[$i] .= $Recettes[$i]['index'][$j];
                if($j != count($Recettes[$i]['index'])-1) $index[$i] .= '/';
            }
            $query = "INSERT INTO recettes(titre, ingredients, preparation, ind)
                        VALUES (:titre, :ingredients, :preparation, :ind)";
            $statement = $connexion->prepare($query);
            $statement->bindValue(":titre", $titre[$i], PDO::PARAM_STR);
            $statement->bindValue(":ingredients", $ingredients[$i], PDO::PARAM_STR);
            $statement->bindValue(":preparation", $preparation[$i], PDO::PARAM_STR);
            $statement->bindValue(":ind", $index[$i], PDO::PARAM_STR);
            $statement->execute();
    }  
}

function connection($username){ //vérifie si les identifiants sont justes, crée une session
    include("connection_bdd.php");
    $query = "SELECT mdp, no_util FROM utilisateurs WHERE login = '$username'";
    $statement = $connexion->prepare($query);
    $statement->execute();
    $row = $statement->fetch();
    $password = $row[0];
    $no_util = $row[1];
    $passwordco = hash('sha256',trim($_POST["mdpco"]));
    if(strcmp($password, $passwordco)==0) {
        $_SESSION["nom"] = $username;
        $_SESSION["no_util"] = $no_util;
        return true;
    }
    else return false;
}

function deconnection(){ //détruit la session en cours
    session_unset();
    session_destroy();
    header("Refresh:0");
}
 
function afficherSousCateg($parent, $hierarchie){ //affiche les sous-categorie (boutons)
    $ingredientAAfficher = [];
    $html="";
    foreach($hierarchie as $categorie=>$details){
        if(!isset($ingredientAAfficher[$categorie])){
            if(isset($details['super-categorie'])){
                foreach($details['super-categorie'] as $sc){
                    if($sc==$parent){ 
                        $ingredientAAfficher[$categorie]=$categorie;
                        $html.='
                                <a class="categorie" href="?elt='.htmlspecialchars($categorie).'"><button class="btn btn-primary">'.$categorie.'</button></a>';    
                    }
                }
            }
        }
    }   
    return $html;
}

function getRacine($hierarchie){ //recupere la racine de la liste hierarchie
    foreach($hierarchie as $ingredient=>$details){
        if(!isset($details['super-categorie'])) return $ingredient;
    }
}

function afficherAllCocktails($Recettes){ //affiche tous les cocktails a partir d'une liste
    $html = "";
    $dir_nom = 'Photos'; // dossier contenant les photos
    $dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
    $fichier = array(); // on déclare le tableau contenant le nom des images
    
    //on recupere le nom des images
    while($element = readdir($dir)) {
        if($element != '.' && $element != '..' && stristr($element,".jpg")) {
            if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
        }
    } 

    closedir($dir);
    $imgDefaut = "cocktail.jpg";
    $txtDefaut = "Image par défaut";
    $nom_cocktail = [];
    //recupere le nom des cocktails sans le .jpg et _
    for($i=0;$i<sizeof($fichier);$i++){
        $nom_cocktail[$i] = $fichier[$i];
        $nom_cocktail[$i] = str_replace(".jpg", "", $nom_cocktail[$i]);
        $nom_cocktail[$i] = str_replace("_", " ", $nom_cocktail[$i]);
    }
    for($i = 0 ; $i<count($Recettes) ; $i++){
        $titre[$i] = $Recettes[$i]['titre'];
        $preparation[$i] = $Recettes[$i]['preparation'];
        $ingredients = explode("|", $Recettes[$i]['ingredients']);
        $html .= '
        <div class="col-lg-3">
                    <div class="cocktail">
                        <figure>
                            <img src="Photos/';
                            if(in_array($titre[$i], $nom_cocktail)) $html .= ''.$fichier[array_search($titre[$i], $nom_cocktail)].''; else $html .= ''.$imgDefaut.'';
                            $html .='" 
                            alt="';
                            if(in_array($titre[$i], $nom_cocktail)) $html .= ''.$nom_cocktail[array_search($titre[$i], $nom_cocktail)].''; else $html .= ''.$txtDefaut.'';
                            $html .= '"/>
                            <figcaption>'.$titre[$i].'</figcaption>
                        </figure>
                        <h4>Ingrédients :</h4>
                        <ul>';for($j=0;$j<count($ingredients);$j++) $html .= '<li>'.$ingredients[$j].'</li>';
                    $html .= '</ul>
                    <h4>Preparation :</h4>'.$preparation[$i].'</br>
                    <a class="categorie"><button class="btn btn-primary">Ajouter aux favoris</button></a>
                    </div>
        </div>';
    }
    return $html;
}

function getSousElem($element, $tabElem){ //renvoie les sous-elem d'un ingrédient (fils, petit fils etc)
    global $Hierarchie;
    if(!isset($Hierarchie[$element]['sous-categorie'])) return $tabElem;
    foreach($Hierarchie[$element]['sous-categorie'] as $elem){
        $tabElem[$elem]=$elem;
        $tabElem = getSousElem($elem, $tabElem);    
    }
    return $tabElem;
}

function getTousLesCocktails(){ //recupere tous les cocktails de la BDD
    include("connection_bdd.php");
    $result = [];
    $query = "SELECT titre, ingredients, preparation
                FROM recettes";
    $statement = $connexion->prepare($query);
    $statement->execute();
    $i = 0;
    while ($donnees = $statement->fetch())
    {
        $result[$i]['titre'] = $donnees['titre'];
        $result[$i]['ingredients'] = $donnees['ingredients'];
        $result[$i]['preparation'] = $donnees['preparation'];
        $i++;
    }
    return $result;
}

function getNoRecettes($categorie){ //recupere les numéros des recettes
    include("connection_bdd.php");
    $result = [];
    $elements = getSousElem($categorie, []);
    $elements[$categorie]=$categorie;
    $j = 0;
    $query = "SELECT no_recette
                FROM recettes
                WHERE ind LIKE CONCAT('%', :cat, '%')";
    $statement = $connexion->prepare($query); 
    // $statement->debugDumpParams();
    foreach($elements as $elt => $val){
        $statement->bindValue(":cat", $elt, PDO::PARAM_STR);
        $statement->execute();
        while ($donnees = $statement->fetch())
        {
            if(!in_array($donnees['no_recette'], $result)) {
                $result[$j] = $donnees['no_recette'];
                $j++;
            }   
        }
    }
    return $result;
}

function getInfosRecettes($recettes){ //recupere les infos d'une recette à partir d'un numero de recette
    include("connection_bdd.php");
    $result = [];
    for($i = 0 ; $i<count($recettes) ; $i++){
        $query = "SELECT titre, ingredients, preparation
                    FROM recettes
                    WHERE no_recette = :recette";
        $statement = $connexion->prepare($query);
        $statement->bindValue(":recette", $recettes[$i], PDO::PARAM_STR);
        $statement->execute();
        while ($donnees = $statement->fetch())
        {
            $result[$i]['titre'] = $donnees['titre'];
            $result[$i]['ingredients'] = $donnees['ingredients'];
            $result[$i]['preparation'] = $donnees['preparation'];
        }
    }   
    return $result;
}

function getTabAriane($element, $filAriane){ //recupere le tableau du fil d'ariane
    global $Hierarchie;

    if(isset($Hierarchie[$element]['super-categorie'][0])){ 
        $filAriane = getTabAriane($Hierarchie[$element]['super-categorie'][0], $filAriane);
    }
    else return $filAriane;

    $filAriane[$element]=$element;
    return $filAriane;
}



?>