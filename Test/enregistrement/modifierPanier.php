<?php 
/*	***
*
*	1. Une fonction qui permet d'ajouter un cocktail
*	2. Une fonction qui permet de supprimer un cocktail
*	3. Une fonction qui permet de vider le panier
*	4. Une fonction qui permet de récupérer les données de l'utilisateur
*	5. Une fonction qui enregistre le panier dans un fichier
*
*	**/

	function Ajouter()
	{
		/*
		*	Ajoute un cocktail au panier
		*/

		// Enregistrement dans le panier
		if(!isset($_SESSION['panier'])) // Si le panier n'existe pas, il est crée
			$_SESSION['panier'] = array();
			
		$tab['titre'] = $_POST['cocktail_choisi_titre'];
		$tab['ingredients'] = $_POST['cocktail_choisi_ingredients'];
		$tab['preparation'] = $_POST['cocktail_choisi_preparation'];
		
		if (!in_array($tab, $_SESSION['panier'])) // Si le cocktail n'a pas encore été selecionné
			$_SESSION['panier'][] = $tab;

		// Enregistrement dans le fichier
		if(isset($_SESSION['connexion']) AND $_SESSION['connexion'] == true) // Si l'utilisateur est connecté
			Enregistrer(); // Enregistre le panier dans un fichier
	}


	function Supprimer()
	{
		/*
		*	Supprime un cocktail du panier
		*/

		// Enregistement du panier dans la variable session
		$tabPanier = array(); // Nouveau tableau
		foreach ($_SESSION['panier'] as $cle => $cocktail)
		{
			if($cle != $_POST['cocktail_supp']) // Le cocktail à supprimer n'est pas enregistré dans le nouveau panier
				$tabPanier[] = $cocktail; // Tous les autres sont enregistrés
		}
		$_SESSION['panier'] = $tabPanier; // Modification du panier

		// Enregistrement du panier dans un fichier
		if(isset($_SESSION['connexion']) AND $_SESSION['connexion'] == true) // Si l'utilisateur est connecté
			Enregistrer(); // Enregistre le panier dans un fichier
	}


	function Vider()
	{
		/*
		*	Supprime tous les cocktails du panier
		*/

		unset($_SESSION['panier']); // Suppression du contenu du panier
		$_SESSION['panier'] = array();
		if(isset($_SESSION['connexion']) AND $_SESSION['connexion'] == true) // Si l'utilisateur est connecté
			Enregistrer(); // Enregistre le panier dans un fichier
	}


	function Enregistrer()
	{
		/*
		*	Enregistre le panier dans un fichier
		*/

		// Récupération des données de l'utilisateur
		$fichier_paniers = file_get_contents("../bdd/paniers.txt");
		$Panier = unserialize($fichier_paniers); // Tableau conetant tous les paniers des utilisateurs

		$Panier[$_SESSION['login']] = $_SESSION['panier']; // Enregistrement du panier

		// Enregistrement des données
		$fichier_paniers = fopen("../bdd/paniers.txt", "w"); // Ouverture du fichier
		fwrite($fichier_paniers, serialize($Panier)); // Enregistrement du tableau
		fclose($fichier_paniers); // Fermeture du fichier
	}

?>