<?php
function addRecettesBDD($Recettes) { //ajoute les recettes dans la BDD
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

function checkUserName($username){ //vérifie si le login existe deja ou non
        include("connection_bdd.php");
        $query = "SELECT COUNT(*) nb
        FROM utilisateurs
        WHERE login = :ndc";
        $statement = $connexion->prepare($query);
        $statement->bindValue(":ndc", $username, PDO::PARAM_STR);
        $statement->execute();
        
        $row = $statement->fetch();

        //Si le resultat de la requete vaut 1, on retourne vrai
        //Autrement dit, s' il y a deux fois le même nom, on renvoie vrai
        if($row['nb']==1) return true;
        else return false;
}

function addUser(){ //ajoute un utilisateur à la BDD
    include("connection_bdd.php");
    $ndc = trim($_POST["ndc"]);
    $mdp = trim($_POST["mdp"]);
    //tests sur les champs non obligatoires
    if(isset($_POST["mail"])) $mail = trim($_POST["mail"]);
    else $mail = "";
    if(isset($_POST["adresse"])) $adresse = trim($_POST["adresse"]);
    else $adresse = "";
    if(isset($_POST["ville"])) $ville = trim($_POST["ville"]);
    else $ville = "";
    if(isset($_POST["code_postal"])) $code_postal = trim($_POST["code_postal"]); 
    else $code_postal = "";
    if(isset($_POST["adresse"])) $adresse = trim($_POST["adresse"]); 
    else $adresse = "";
    if(isset($_POST["nom_util"])) $nom_util = trim($_POST["nom_util"]); 
    else $nom_util = "";
    if(isset($_POST["prenom_util"])) $prenom_util = trim($_POST["prenom_util"]); 
    else $prenom_util = "";
    if(isset($_POST["sexe"])) $sexe = trim($_POST["sexe"]); 
    else $sexe = "";
    if(isset($_POST["telephone"])) $telephone = trim($_POST["telephone"]); 
    else $telephone = "";
    if(isset($_POST["date_naissance"])) $date_naissance = trim($_POST["date_naissance"]); 
    else $date_naissance = "";

    $sel = strval(rand(0, 9999999999999999));

    $query = "INSERT INTO utilisateurs (login, nom_util, prenom_util, mdp, email, sel, sexe, date_naissance, code_postal, adresse, ville, telephone) VALUES (:ndc, :nom, :prenom, :mdp, :mail, :sel, :sexe, :date_naissance, :code_postal, :adresse, :ville, :telephone)";
    $statement = $connexion->prepare($query);
    $statement->bindValue(":ndc", $ndc, PDO::PARAM_STR);
    $statement->bindValue(":nom", $nom_util, PDO::PARAM_STR);
    $statement->bindValue(":prenom", $prenom_util, PDO::PARAM_STR);
    $statement->bindValue(":mdp", hash('sha256',$mdp), PDO::PARAM_STR); // 64 caractères minimum pour le mot de passe => sha 256
    $statement->bindValue(":mail", $mail, PDO::PARAM_STR);
    $statement->bindValue(":sel", $sel, PDO::PARAM_STR);
    $statement->bindValue(":sexe", $sexe, PDO::PARAM_STR);
    $statement->bindValue(":date_naissance", $date_naissance, PDO::PARAM_STR);
    $statement->bindValue(":code_postal", $code_postal, PDO::PARAM_STR);
    $statement->bindValue(":adresse", $adresse, PDO::PARAM_STR);
    $statement->bindValue(":ville", $ville, PDO::PARAM_STR);
    $statement->bindValue(":telephone", $telephone, PDO::PARAM_STR);
    $statement->execute();
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
    if(basename(__FILE__)!="index.php") header("Location:index.php");
    header("Refresh:0");
}
 
function afficherSousCateg($parent, $hierarchie){ //affiche les sous-categorie (boutons)
    $categorieAAfficher = [];
    $html="";
    foreach($hierarchie as $categorie=>$details){
        if(!isset($categorieAAfficher[$categorie])){
            if(isset($details['super-categorie'])){
                foreach($details['super-categorie'] as $sc){
                    if($sc==$parent){ 
                        $categorieAAfficher[$categorie]=$categorie;
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
        // requete jquery envoie le favoris si clic sur le bouton
        $ajouterFavoris = '$.post(\'ajouterFavoris.php\',{
            fav: \''.$titre[$i].'\'
        });
        this.innerHTML=\'Ajouté !\'';
        $retirerFavoris = '$.post(\'retirerFavoris.php\',{
            fav: \''.$titre[$i].'\'
        });
        this.innerHTML=\'Supprimé !\'';

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
                    <h4>Preparation :</h4>'.$preparation[$i].'</br>';
                    if(!estFavoris($titre[$i])) {
                        $html.='
                        <p><button class="btn btn-primary" onclick="'.$ajouterFavoris.'"> Ajouter aux favoris</button></p>';
                    }
                    else $html.='
                        <p><button class="btn btn-primary" onclick="'.$retirerFavoris.'"> Retirer des favoris</button></p>';
                    $html .= '</div>
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

function normaliser($chaine){ //enleve les caracteres spéciaux lors de la requete jquery
    $a_garder ='A-Za-z\s()0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ:...,-';
    $cocktail = preg_replace('/[^'.$a_garder.']/', '', $chaine);
    return $cocktail;
}

function estFavoris($cocktail){ //regarde si le cocktail est en favoris
    include("connection_bdd.php");
    if(isset($_SESSION["no_util"])) {
        $utilisateur = $_SESSION["no_util"];
        $no_recette = getNoRecetteAPartirDuTitre($cocktail);
        $query2 = "SELECT no_util
                    FROM recettes_preferees
                    WHERE no_util = :utilisateur
                    AND no_recette = :cocktail";
        $statement = $connexion->prepare($query2);  
        $statement->bindValue(":utilisateur", $utilisateur, PDO::PARAM_STR);
        $statement->bindValue(":cocktail", $no_recette, PDO::PARAM_STR);
        $statement->execute();
        if($statement->fetch()) return true;
        else return false;
    }
    else {
        $no_recette = getNoRecetteAPartirDuTitre($cocktail);
        if(isset($_COOKIE['fav'][normaliser($no_recette)])) return true;
        else return false;
    }
}

function getNoRecetteAPartirDuTitre($titre){ //recupere le no de la recette à partir du titre
    include("connection_bdd.php");
    $query = "SELECT no_recette
                        FROM recettes
                        WHERE titre LIKE CONCAT('%', :cocktail, '%')";
    $statement = $connexion->prepare($query); 
    $statement->bindValue(":cocktail", $titre, PDO::PARAM_STR);
    $statement->execute();
    $titre = $statement->fetchColumn();
    return $titre;
}

function ajouteFavoris($no_util, $cocktail){ //ajoute le cocktail choisi par l'utilisateur en favoris
    include("connection_bdd.php");
    $query = "INSERT INTO recettes_preferees(no_util, no_recette)
                        VALUES (:utilisateur, :cocktail)";
    $statement = $connexion->prepare($query); 
    $statement->bindValue(":cocktail", $cocktail, PDO::PARAM_STR);
    $statement->bindValue(":utilisateur", $no_util, PDO::PARAM_STR);
    $statement->execute();
}

function supprimeFavoris($no_util, $cocktail){ //retire le cocktail choisi par l'utilisateur en favoris
    include("connection_bdd.php");
    $query = "DELETE FROM recettes_preferees
                    WHERE no_recette = :cocktail
                    AND no_util = :utilisateur";
    $statement = $connexion->prepare($query); 
    $statement->bindValue(":cocktail", $cocktail, PDO::PARAM_STR);
    $statement->bindValue(":utilisateur", $no_util, PDO::PARAM_STR);
    $statement->execute();
}

function recupereRecettesPreferees($no_util){ //recupere les recettes préférées d'un utilisateur
    include("connection_bdd.php");
    $j = 0;
    $query = "SELECT no_recette
                FROM recettes_preferees
                WHERE no_util = :utilisateur";
    $statement = $connexion->prepare($query); 
    $statement->bindValue(":utilisateur", $no_util, PDO::PARAM_STR);
    $statement->execute();
    while ($donnees = $statement->fetch())
    {
        $result[$j] = $donnees['no_recette'];
        $j++; 
    }
    return $result;
}

function getInfosUtilisateurs($no_util){ //recupere les infos d'un utilisateur
    include("connection_bdd.php");
    $result = [];
    $query = "SELECT nom_util, prenom_util, email, code_postal, adresse, ville, telephone
                FROM utilisateurs
                WHERE no_util = :utilisateur";
    $statement = $connexion->prepare($query);
    $statement->bindValue(":utilisateur", $no_util, PDO::PARAM_STR);
    $statement->execute();
    while ($donnees = $statement->fetch())
    {
        $result['nom_util'] = $donnees['nom_util'];
        $result['prenom_util'] = $donnees['prenom_util'];
        $result['email'] = $donnees['email'];
        $result['code_postal'] = $donnees['code_postal'];
        $result['adresse'] = $donnees['adresse'];
        $result['ville'] = $donnees['ville'];
        $result['telephone'] = $donnees['telephone'];
    }
    return $result;
}

function afficheInfosUtilisateurs($tab){ //affiche les infos d'un utlisateur
    $html = "";
    $html .= '
    <h4>Bonjour '.$tab['nom_util'].' '.$tab['prenom_util'].', </h4>
    <h1>Voici vos informations personnelles :</h1>
    <form action="#" method="post">
        <div><label for="nom_util">Nom : </label><input type="text" name="nom_util" value="'.$tab['nom_util'].'" ></div>
        <div><label for="prenom_util">Prénom : </label><input type="text" name="prenom_util" value="'.$tab['prenom_util'].'"  ></div>
        <div><label for="email">Email : </label><input type="text" name="email" value="'.$tab['email'].'" ></div>
        <div><label for="code_postal">Code postal : </label><input type="text" name="code_postal" value="'.$tab['code_postal'].'"  ></div>
        <div><label for="adresse">Adresse : </label><input type="text" name="adresse" value="'.$tab['adresse'].'" ></div>
        <div><label for="ville">Ville : </label><input type="text" name="ville" value="'.$tab['ville'].'" ></div>
        <div><label for="telephone">Téléphone : </label><input type="text" name="telephone" value="'.$tab['telephone'].'" ></div>
        <div><input name="submit" type="submit" value="Modifier" class="btn btn-warning" /></div>
    </form>';
    return $html;
}

function modifieInfosUtilisateur($no_util){ //modifie les infos de l'utilisateur dans la BDD
    include("connection_bdd.php");
    $query = "UPDATE utilisateurs
                SET nom_util = :nom_util, prenom_util = :prenom_util, email = :email, code_postal = :code_postal, adresse = :adresse, ville = :ville, telephone = :telephone
                WHERE no_util = :utilisateur";
    $statement = $connexion->prepare($query);
    $statement->bindValue(":nom_util", $_POST['nom_util'], PDO::PARAM_STR);
    $statement->bindValue(":prenom_util", $_POST['prenom_util'], PDO::PARAM_STR);
    $statement->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
    $statement->bindValue(":code_postal", $_POST['code_postal'], PDO::PARAM_STR);
    $statement->bindValue(":adresse", $_POST['adresse'], PDO::PARAM_STR);
    $statement->bindValue(":ville", $_POST['ville'], PDO::PARAM_STR);
    $statement->bindValue(":telephone", $_POST['telephone'], PDO::PARAM_STR);
    $statement->bindValue(":utilisateur", $no_util, PDO::PARAM_STR);
    $statement->execute();
}

?>