<!DOCTYPE html>
<html>

<head>
    <title>Recettes préférées</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="global.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION['no_util'])) header("Location:index.php");
	else {
		$html = "";
		include("banniereco.php");
		$no_util = $_SESSION['no_util'];
		$html .= afficherAllCocktails(getInfosRecettes(recupereRecettesPreferees($no_util)));
		echo $html;
	}
?>
</body>
</html>