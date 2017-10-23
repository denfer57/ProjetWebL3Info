<!DOCTYPE html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="global.css" />
		<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css"/>
		<title>Inscription</title>
	</head>
	<body>

<?php 
	include("banniere.php");
	function checkUserName($username){
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
	
	function addUser(){
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
	
	$html = "";
	$html.= '
	<div style="text-align:center;">
		<h1>Inscription</h1>
		<form action="#" method="post">
				<div><label for="ndc">Nom d\'utilisateur : </label><input type="text" name="ndc" required=""/></div>
				<div><label for="nom_util">Nom : </label><input type="text" name="nom_util"/></div>
				<div><label for="prenom_util">Prénom : </label><input type="text" name="prenom_util"/></div>
				<div><label for="mdp">Mot de passe : </label><input type="password" name="mdp" required=""/></div>
				<div><label for="mail">Adresse email : </label><input type="text" name="mail"/></div>
				<div><label for="sexe">Sexe : </label><label class="radio-inline"><input type="radio" name="sexe" value="H">Homme</label>
				<label class="radio-inline"><input type="radio" name="sexe" value="F">Femme</label></div>
				<div><label for="date_naissance">Date de naissance : </label><input type="date" name="date_naissance"/></div>
				<div><label for="adresse">Adresse : </label><input type="text" name="adresse"/></div>
				<div><label for="code_postal">Code postal : </label><input type="text" name="code_postal"/>
				<label for="ville">Ville : </label><input type="text" name="ville"/></div>
				<div><label for="telephone">Téléphone : </label><input type="text" name="telephone"/></div>
				<input name="submit" type="submit" value="Valider" class="btn btn-warning" />
		</form>
	</div>';
	
 	if ( isset ( $_POST['submit'] ) ){
		$champOk = true;
		$ndc = ($_POST["ndc"]);
		//tests sur la validité des champs
		if(strlen($ndc)>=4) {
			if(checkUserName($ndc)==true) {
				$html.='<p style="color:red"> Le nom d\'utilisateur est déjà pris</p>'; 
				$champOk = false;
			}
			else $html.=''; 
		}
		else {
				$html.='<p style="color:red"> Le nom d\'utilisateur est erroné</p>';
				$champOk = false;
		}
		if(strlen($_POST["mdp"])>=8) $html.='';
		else { 
				$html.='<p style="color:red"> Le mot de passe est erroné</p>';
				$champOk = false;
		}
		if($champOk == true) {
			$html.='
			<p style="color:blue">L\'utilisateur '.$ndc.' a été enregistré.</p>
			<p> Vous pouvez vous connecter dès à présent !</p>';
			addUser(); // on ajoute l'utilisateur si tout a été validé
		}
		else $html.='<p style="color:green">Veuillez corriger les champs.</p>';
	}
	$html.= '
	</body>
	</html>';

	echo $html;
?>
