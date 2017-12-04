<!DOCTYPE html>
	<head>
		  <title>Cocktaillement</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="global.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="source.css">
  
  <!-- Bootstrap Source personnelle -->
  <link rel="stylesheet" type="text/css" href="source.css">
	</head>
	<body>

<?php 
	session_start();
	if(isset($_SESSION['nom'])) include("banniereco.php");
	else include("banniere.php");
	
	$html = "";
	$html.= '
	<ol class="breadcrumb" >
			<li><a href="index.php">Accueil</a></li>
			<li><a href="inscription.php">Inscription</a></li>
	</ol>
	<div style="text-align:center;">
		<h1>Inscription</h1>
		<form action="#" method="post">
		<table align="center" style="border-radius: 50px 0px 50px 00px; background-color:lightCyan;">
				<tr> <td> <div><label for="ndc">Login : </label> </td> <td> <input type="text" name="ndc" required=""/></div>  <td> <tr>
				<tr> <td> <div><label for="nom_util">Nom : </label> </td>  <td> <input type="text" name="nom_util"/></div> <td> <tr>
				<tr> <td> <div><label for="prenom_util">Prénom : </label> </td> <td> <input type="text" name="prenom_util"/></div><td> <tr>
				<tr> <td> <div><label for="mdp">Mot de passe : </label>   </td> <td> <input type="password" name="mdp" required=""/></div><td> <tr>
				<tr> <td> <div><label for="mail">Adresse email : </label> </td> <td> <input type="text" name="mail"/></div><td> <tr>
				<tr> <td> <div><label for="sexe">Sexe : </label></td> <td> <label class="radio-inline"><input type="radio" name="sexe" value="H">Homme</label><td> <tr>
				<tr> <td> <label class="radio-inline"> </td> <td> <input type="radio" name="sexe" value="F">Femme</label></div><td> <tr>
				<tr> <td> <div><label for="date_naissance">Date de naissance : </label> </td> <td> <input type="date" name="date_naissance"/></div><td> <tr>
				<tr> <td> <div><label for="adresse">Adresse : </label> </td> <td> <input type="text" name="adresse"/></div><td> <tr>
				<tr> <td> <div><label for="code_postal">Code postal : </label> </td> <td> <input type="text" name="code_postal"/><td> <tr>
				<tr> <td> <label for="ville">Ville : </label> </td> <td> <input type="text" name="ville"/></div><td> <tr>
				<tr> <td> <div><label for="telephone">Téléphone : </label> </td> <td> <input type="text" name="telephone"/></div> <td> <tr>
				<tr> <td> <input name="inscription" type="submit" value="Valider" class="btn btn-warning" /> <td> <tr>
		</table>
		</form>
	</div>';




	
 	if ( isset ( $_POST['inscription'] ) ){
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
