<!DOCTYPE html>
<html>

<head>
    <title>Mon profil</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Cocktaillement</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="global.css">	
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

	$html = "";
	$html .= '
	<ol class="breadcrumb" >
			<li><a href="index.php">Accueil</a></li>
			<li><a href="monprofil.php">Profil</a></li>
	</ol>';
	if(!isset($_SESSION['no_util'])){
		error_reporting(0);
	        echo " <meta http-equiv=\"refresh\" content=\"0\"> " ;
	}
	else {
		include("banniereco.php");
		$no_util = $_SESSION['no_util'];
		$html .= afficheInfosUtilisateurs(getInfosUtilisateurs($no_util));
		echo $html;
		if(isset($_POST['submit'])){
			modifieInfosUtilisateur($no_util);
			header("Refresh:0");
		}
		if(isset($_POST['submit2'])){
			changeMotDePasse($no_util);
			echo 'Le mot de passe a été changé.';
		}
	}
?>
</body>
</html>