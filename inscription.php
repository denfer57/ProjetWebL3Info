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
	include("fonctions.php")
	
	
	
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
