<?php 
$pdo = new PDO('mysql:host=localhost', 'root', '', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);
 
$request = "CREATE DATABASE IF NOT EXISTS projet_web_l3_info DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
$pdo->prepare($request)->execute();

include ("connection_bdd.php");

//-- phpMyAdmin SQL Dump
//-- version 4.1.14
//-- http://www.phpmyadmin.net
//--
//-- Client :  127.0.0.1
//-- Généré le :  Dim 03 Décembre 2017 à 11:36
//-- Version du serveur :  5.6.17
//-- Version de PHP :  5.5.12

//SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
//SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

//--
//-- Base de données :  `projet_web_l3_info`
//--
//-- --------------------------------------------------------
//--
//-- Structure de la table `recettes`
//--

$request = "CREATE TABLE IF NOT EXISTS `recettes` (
  `no_recette` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `ingredients` varchar(300) NOT NULL,
  `preparation` varchar(300) NOT NULL,
  `ind` varchar(300) NOT NULL,
  PRIMARY KEY (`no_recette`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ; " ;

$statement = $connexion->prepare($request);
$statement->execute();

//--
//-- Contenu de la table `recettes`
//--

$request =  "INSERT INTO `recettes` (`no_recette`, `titre`, `ingredients`, `preparation`, `ind`) VALUES
(1, 'Alerte à Malibu (cocktail de la couleurs des fameux maillots de bains... ou presque)', '50 cl de malibu coco|50 cl de gloss cerise|1 l de jus de goyave blanche|1 poignée de griottes', 'Mélanger tous les ingrédients ensemble dans un grand pichet. Placer au frais au moins 3 heures avant de déguster. Tchin tchin !!', 'Malibu/Cerise/Jus de goyave/Cerise griotte'),
(2, 'Aperol Spritz : cocktail italien pétillant', '1 verre d''aperol|3 verres de vin blanc pétillant type prosecco|5 glaçons|1 orange sanguine|2 verres d''eau pétillante', 'Préparer la quantité de cocktail souhaitée en respectant les proportions ! Garnir de glaçons et d''un morceau d''orange (sanguine si possible). Santé !', 'Aperol/Prosecco/Glaçon/Orange sanguine/Eau gazeuse'),
(3, 'Aquarium', '1/5 de curaçao|1/5 de rhum blanc|1/5 de tequila|1/5 de martini dry|1/5 de sirop de sucre de canne', 'Préparer le mélange dans un récipient transparent, ressemblant le plus possible à un aquarium, si vous n''en avez pas! Mélanger. Ajouter des glaçons, et placer le tout au frigo. Décorer votre récipient, en y incorporant les éléments de déco. L''effet aquarium doit être surprenant!Les proportions sont ', 'Curaçao/Rhum blanc/Tequila/Martini/Sirop de sucre de canne'),
(4, 'Black velvet', '12 cl de stout|12 cl de champagne', 'Verser le champagne dans un verre et ajouter la bière', 'Stout (bière)/Champagne'),
(5, 'Bloody Mary', '4 cl de vodka|12 cl de jus de tomates|0.5 cl de jus de citron|0.5 cl de sauce worcestershire|tabasco|sel de céleri|poivre', 'Mélanger les 4 premiers ingrédients directement dans un verre ou dans un verre à mélange avec des glaçons (pour refroidir sans trop diluer). Ajouter à convenance tabasco, sel de céleri et poivre.', 'Vodka/Jus de tomates/Jus de citron/Sauce worcestershire/Sauce tabasco/Sel de céleri/Poivre'),
(6, 'Bora bora', '10 cl de jus d''ananas|6 cl de jus de fruits de la passion|2 cl de sirop de grenadine|1 cl de jus de citrons|3 glaçons', 'Réaliser cette recette au shaker. Servir dans un verre contenant des glaçons avec une rondelle d''orange.', 'Jus d''ananas/Jus de fruits de la passion/Sirop de grenadine/Jus de citron/Glaçon'),
(7, 'Builder', '1 concombre|1 citron|1 cuillère à soupe de sucre|3 glaçons', 'Mixer le concombre dans la centrifugeuse, ajouter le jus du citron, le sucre et les glaçons. Servir dans un verre décoré d''une tranche de citron.', 'Concombre/Citron/Sucre/Glaçon'),
(8, 'Caïpirinha', '4 cl de cachaça|1/2 citron vert|1 cuillère à soupe de sucre en poudre|glaçons', 'Couper le citron vert en deux, puis en quartier en enlevant la partie blanche centrale, responsable de l''amertume. Mettre le citron découpé et le sucre dans un verre et piler. Ajouter la glace et la cachaça. Mélanger à la cuillère.', 'Cachaça/Citron vert/Sucre en poudre/Glaçon'),
(9, 'Champagne en cocktail', '1 morceau de sucre roux|3 traits d''angostura|1 cl de cognac|c 8 cl de champagne', 'Placer les ingrédients directement dans un verre de type flûte à champagne dans l''ordre suivant : Imbiber le morceau de sucre d''angostura, puis le mettre au fond d''une flûte à champagne. Verser doucement le cognac (il doit recouvrir le morceau de sucre). Compléter avec du champagne bien frais.', 'Sucre roux/Angostura/Cognac/Champagne'),
(10, 'Citrouillette (cocktail au champagne)', 'noilly prat|champagne', 'Verser 1/3 de Nouilly Prat dans un verre puis 2/3 de Champagne bien frais. Déguster, c''est excellent.', 'Noilly Prat/Champagne'),
(11, 'Cocktail Bacardi', '24 cl de rhum bacardi|6 cl de sirop de grenadine|12 cl de jus de citron', '1. Mettez le bacardi,le sirop de grenadine et le jus de citron dans un shaker.Secouez énergiquement. 2. Versez dans des verres et servez aussitôt.', 'Rhum/Sirop de grenadine/Jus de citron'),
(12, 'Cocktail Bacardi, grenadine, citron', '24 cl de rhum bacardi|6 cl de sirop de grenadine|12 cl de jus de citron', 'Mettez le sirop de grenadine,le jus de citron et le Bacardi dans un shaker. Secouez fortement. Versez dans des verres et servez tout de suite.', 'Rhum/Sirop de grenadine/Jus de citron'),
(13, 'Cocktail Balalaïka', '4 cl de vodka|2 cl de cointreau|4 cl de jus de citron|rondelles de citron|quelques glaçons', 'Verser les alcools et le jus de citron dans un verre haut, sur des glaçons. Décorer avec les rondelles de citron.', 'Vodka/Cointreau/Jus de citron/Citron/Glaçon'),
(14, 'Cocktail Cava Vodka Lemon', '10 cl de cava|2 cl de vodka|2 cl de sirop de citron vert|1 zeste de citron vert', ' Mélanger la vodka et le sirop de citron vert. Verser le cava dans une flûte. Ajouter délicatement le mélange vodka citron vert. Décorer avec le zeste de citron vert. ', 'Cava/Vodka/Citron vert/Zeste de citron vert'),
(15, 'Cocktail Champagne et saké', '75 cl de champagne|16 cl de saké|4 brins de coriandre fraîche', ' Dans une flûte à Champagne, verser 4 cl de saké et compléter avec le Champagne. Ajouter un brin de coriandre par verre. A votre santé. ', 'Champagne/Saké/Coriandre'),
(16, 'Cocktail Eau de mer', '6 bouteilles de mousseux|20 cl de curaçao|70 cl de triple sec|35 cl de sirop de citrons|35 cl de sirop d''oranges|25 cl de sucre de canne', 'Dans un grand récipient mélanger le triple sec, le curacao, le pulco citron, le pulco orange et le sucre de canne. Ensuite, ajouter les bouteilles de mousseux bien fraîches. Servir aussitôt.', 'Vin effervescent/Curaçao/Triple sec/Sirop de citrons/Sirop d''oranges/Sucre de canne en poudre'),
(17, 'Cocktail Fraisalia (sans alcool)', '500 g de fraises|50 cl de jus d''orange|10 cl de sirop de fraise|2 l de limonade|10 glaçons', ' Placer dans un saladier les fraises coupées en morceaux, le jus d''orange et le sirop de fraise. Laisser reposer au frais au moins 2 heures. Au moment de servir, ajouter le limonade et les glaçons. ', 'Fraise/Jus d''orange/Sirop de fraises/Limonade/Glaçon'),
(18, 'Cocktail Grand Paradis', '1 cl de cognac|c 5 cl de jus d''abricot|10 cl environ de champagne', 'Mélanger au shaker le cognac et le jus d''abricot. Verser dans un verre (type verre tulipe) et remplir de champagne.', 'Cognac/Jus d''abricots/Champagne'),
(19, 'Cocktail Lion rouge', '2 cl de whisky|2 cl de crème de cassis|2 traits de bénédictine|2 traits de pastis|glaçons', ' Remplir un shaker de glaçons, y verser les différents alcools. Fermer, puis agiter fortement quelques secondes. Servir. ', 'Whisky/Crème de cassis/Bénédictine/Pastis/Glaçon'),
(20, 'Cocktail MAP', '1/3 de martini blanc|1 trait d''angostura|2/3 de jus de pamplemousse', 'Mettre les flûtes au congélateur. Presser le pamplemousse ou ouvrir la bouteille ou le berlingot... Verser 1/3 martini, 2/3 jus de pamplemousse et 1 trait d''angustura. Pour la déco : poser sur chaque verre une torsade de pain aux graines de pavot et sucre dorée au four mais pétrie d''amour et à la MA', 'Martini blanc/Angostura/Jus de pamplemousse'),
(21, 'Cocktail MTS', '50 cl de martini|25 cl de triple sec|c 25 cl de sucre de canne|50 cl de jus de fruits multivitaminés', 'Dans un grand pichet, verser tous les ingrédients et les mélanger. Laisser reposer une heure au réfrigérateur. A déguster très frais.', 'Martini/Triple sec/Sucre de canne en poudre/Jus multivitaminé'),
(22, 'Cocktail Madras', '40 cl jus d''orange|20 cl de vin blanc|sirop de grenadine', 'Mélanger le jus d''orange avec le vin blanc. Verser le mélange dans des verres. Ajouter un filet de sirop de grenadine.', 'Jus d''orange/Vin blanc/Sirop de grenadine'),
(23, 'Cocktail Mexicain à ma façon', '40 cl de tequila|1 l de jus de goyave|1 l de jus d''ananas|30 cl de jus de pomme|1 sachet de sucre vanillé|3 ou 4 feuilles de menthe', 'Mélanger les jus de goyave et d''ananas. Ajouter la téquila et le jus de pomme. Mélanger. Ajouter le sucre vanillé et secouer jusqu''à ce que le sucre soit fondu. Ciseler les feuilles de menthe et les incorporer au cocktail. Réserver au frigo pendant 12 à 24 heures. Attention, l''alcool de la téquila s', 'Tequila/Jus de goyave/Jus d''ananas/Jus de pommes/Sucre vanillé/Menthe'),
(24, 'Cocktail Pomabricotine', '45 cl de jus d''abricots|45 cl de jus de pommes|35 cl d''eau gazeuse|2.5 cl de liqueur|5 cl de sirop de grenadine', 'Mélanger tous les ingrédients, mettre au frais et ajouter l''eau gazeuse fraîche au dernier moment pour conserver le pétillant.', 'Jus d''abricots/Jus de pommes/Eau gazeuse/Liqueur/Sirop de grenadine'),
(25, 'Cocktail Pomenas', '20 cl de jus de pamplemousse|20 cl de jus d''ananas|20 cl de jus de pommes|quelques framboises|des glaçons', 'Verser les jus dans une cruche, ajouter les framboises pour donner la couleur et des glaçons pour la fraîcheur. Servir frais.', 'Jus de pamplemousse/Jus d''ananas/Jus de pommes/Framboise/Glaçon'),
(26, 'Cocktail Whisky Cranberries', '1 dose de whisky|2 doses de jus de cranberries', 'Simplement mélanger le tout et... Santé!', 'Whisky/Jus de canneberge'),
(27, 'Cocktail anapomise', '25 cl de jus de cerises|25 cl de jus de pommes|25 cl de jus d''ananas|2,5 cl d''alcool de prune|2,5 cl de sirop de sucre de canne', 'Mélangez tous les ingrédients et servir bien frais.', 'Jus de cerises/Jus de pommes/Jus d''ananas/Alcool de prune/Sirop de sucre de canne'),
(28, 'Cocktail apéritif', '2 l de vin blanc sec|200 g sucre|2 citrons|2 oranges|2 grands verres de rhum|1 grande bouteille de perrier', 'Mélanger tous les ingrédients et servir très frais.', 'Vin blanc sec/Sucre/Citron/Orange/Rhum/Perrier'),
(29, 'Cocktail apéritif aux framboises', '1 l de vin blanc|2 l de mousseux|250 g de framboises surgelées|4 à 5 cuillères à soupe de sucre', 'Mélanger le vin blanc, les mousseux et le sucre. Ajouter les framboises surgelées... Déguster bien frais...', 'Vin blanc/Vin effervescent/Framboise/Sucre'),
(30, 'Cocktail au Martini', '1 l de martini blanc|1.5 l de schweppes aux agrumes|1 citron', 'Mélanger les liquides. Couper le citron en gros morceaux et l''ajouter. Servir très frais avec des glaçons.', 'Martini/Agrume/Citron'),
(31, 'Cocktail au cidre', '1 bouteille de cidre brut|1/2 verre de crème de cassis|1/2 verre de cointreau', ' Mélanger le cassis et le cointreau. Tenir au frais tous les ingrédients. Et au dernier moment ajouter le cidre. ', 'Cidre brut/Crème de cassis/Cointreau'),
(32, 'Cocktail au kumquat et au litchi', '5 kumquats|5 litchis|1 clémentine|1/2 orange|1/2 l d''eau|1 l de limonade', ' Mixer au mixeur tous les fruits ainsi que l''eau jusqu''à obtenir un mélange homogène. Ajouter le litre de limonade. Mettre au réfrigérateur 1 h. ', 'Kumquat/Litchi/Clémentine/Orange/Eau/Limonade'),
(33, 'Cocktail au limoncello', '2 oranges|5 cl de rhum ambré|1 trait de limoncello|glaçons', 'Verser le rhum ambré dans le verre. Presser les 2 oranges, puis ajouter le jus au rhum. Ajouter ensuite le trait de Limoncello, remuer et ajouter quelques glaçons. C''est prêt !', 'Orange/Rhum ambré/Limoncello/Glaçon'),
(34, 'Cocktail aux agrumes sans alcool', '6 cl jus d''orange|4.5 cl jus de citron jaune|2 cuillères à café de sirop de grenadine ou de fraise', ' Mesurer chacun des ingrédients et les verser dans un shaker. Bien secouer. Verser le tout dans un verre à cocktail ou une flûte à champagne. Réitérer l''opération pour chaque personne. ', 'Jus d''orange/Jus de citron/Fraise'),
(35, 'Cocktail aux framboise', '450 g de framboise surgelés|1 bouteille de sirop de sucre de canne|50 cl de kirsch|1 l de limonade|1 citron|3 bouteilles de crémant d’alsace', 'La veille : mettre les framboises, le citron en tranches, 3 verres de sirop de sucre de canne, le kirsch et la moitié de la limonade dans un gros recipient, puis laisser macérer au frigo. Mettre le reste de limonade et les bouteilles de crémant au frigo. Juste avant de servir : Rajouter à la prépara', 'Framboise/Sirop de sucre de canne/Kirsch/Limonade/Citron/Crémant'),
(36, 'Cocktail bulles de melon', '2 melons|1 bouteille de crémant ou de champagne|sirop de sucre de canne|1 citron|glaçons', 'Otez les pépins des melons et mixez le melon. Pressez le citron. Mélangez le tout avec le vin pétillant, puis rajoutez des glacons et sucrez à votre goût. Servez de suite.', 'Melon/Crémant/Sirop de sucre de canne/Citron/Glaçon'),
(37, 'Cocktail café au lait', '4 à 6 cl de liqueur de café|4 à 6 cl de whisky|30 cl de lait|2 à 6 cl de sucre de canne|4 glaçons', 'Dans un shaker, verser tous les ingrédients + 2 glaçons. (répartir les autres glaçons dans le verre). Agiter le shaker jusqu''à ce que les glaçons soient quasimment fondus. Verser dans un verre large voire évasé afin d''obtenir une mousse onctueuse.', 'Liqueur de café/Whisky/Lait/Sucre de canne en poudre/Glaçon'),
(38, 'Cocktail cardinal', 'glace pilée|3 cl de campari|3 cl de noilly prat original dry|3 cl de gin', 'Dans un shaker, remplir de glace à moitié.Verser les ingrédients. Frapper. Servir dans un verre à cocktail et ajouter un zeste de citron.', 'Glace pilée/Campari/Noilly Prat/Gin'),
(39, 'Cocktail champagne menthe citron vert', '1 bouteille de champagne|glaçons|1 cuillère à café de jus de citron vert|2 feuilles de menthe|1 zeste de citron', ' Mettre dans un verre des glaçons à volonté. Ajouter une feuille découpée en deux et une entière pour la déco. Joindre le jus de citron vert et submerger de Champagne. Laisser reposer 2 min le temps que la saveur monte. Puis savourer ! ', 'Champagne/Glaçon/Jus de citrons verts/Menthe/Zeste de citron'),
(40, 'Cocktail champanisé', '4 bouteilles de mousseux|1/2 bouteille cointreau|10 citrons pressés avec pulpe|2 verres de sirop de sucre de canne|des glaçons', 'Dans un grand récipient, verser le Cointreau, le jus des citrons avec leur pulpe et le sirop de sucre de canne. Verser le mousseux en dernier. Ajouter des glaçons. Servez dans des verres frais (l''idéal est de les placer au réfrigérateur avant).', 'Vin effervescent/Cointreau/Citron/Sirop de sucre de canne/Glaçon'),
(41, 'Cocktail citron-menthe (sans alcool)', '4 cl de sirop de menthe|1 trait de sirop de sucre de canne|2 cl de jus de citron vert|3 cl de jus de citron jaune|1 branche de menthe fraîche|1 tranche de citron', 'Mettre dans un shaker, avec de la glace, le sirop de menthe, le sirop de sucre et les jus de citron. Bien agiter. Verser dans un verre, décorer d''une branche de menthe et d''une tranche de citron.', 'Sirop à la menthe/Sirop de sucre de canne/Jus de citrons verts/Jus de citron/Menthe/Tranche de citron'),
(42, 'Cocktail coco', '30 cl de vodka|1/2 l de lait|2 boules de glace à la noix de coco|2 boules de vanille|sirop de coco ou sirop de sucre de canne|5 glaçons', 'Mettre le tout dans un mixeur et dégustez.', 'Vodka/Lait/Crème glacée à la noix de coco/Vanille/Sirop de sucre de canne/Glaçon'),
(43, 'Cocktail coco des amoureux', '1 noix de coco|rhum blanc', 'Percer la noix de coco en 3 endroits sur le dessus, et vider l''eau à l''intérieur. Remplir entièrement de rhum blanc. Boucher les trous en retaillant un bouchon de liège, et fermer hermétiquement en faisant couler de la cire de bougie dessus.Ranger debout, au frigo, pendant 3 semaines.', 'Noix de coco/Rhum blanc'),
(44, 'Cocktail crème de coco et banane', 'crème de coco|jus de banane|sirop de fraise|citron vert', 'Dans le fond d''un verre verser 3 cuillères à café de crème de coco. Diluer avec du jus de banane jusqu''a ce que le liquide ait un aspect uniforme. Ajouter un peu de sirop de cassis et quelques gouttes de jus de citron vert. Servir très frais.', 'Crème de noix de coco/Jus de bananes/Sirop de fraises/Citron vert'),
(45, 'Cocktail de fruits', '1 banane|1 pomme|2 kiwis|1 petit bol d''eau|1 sachet de sucre vanillé|3 cuillères à soupe de cassonade', ' Peler et couper les fruits en morceaux. Les mettre dans le blender (ou tout autre récipient à cocktail), puis mixer le tout, en rajoutant peu à peu l''eau, jusqu''à obtention de la consistance voulue (moi j''aime bien quand c''est un peu épais). Rajouter ensuite le sucre vanillé et la cassonade, selon ', 'Banane/Pomme/Kiwi/Eau/Sucre vanillé/Cassonade'),
(46, 'Cocktail de fruits au citron vert', '10 cl de de lait de coco|20 cl de jus multivitaminé|1 cuillère à café de jus de citron vert|quelques glaçons|1 rondelle de citron vert', 'Versez 10 cl de lait de coco et 20 cl de jus multivitaminé dans un shaker. Ajoutez une cuillère à café de jus de citron vert et quelques glaçons. Mélangez bien et servez dans un verre à cockail; décorez avec une rondelle de citron vert.', 'Lait de coco/Jus multivitaminé/Jus de citrons verts/Glaçon/Citron vert'),
(47, 'Cocktail de jus de fruits pour les enfants', '5 cuillères à soupe de jus d''ananas|3 cuillère à soupe de jus de pommes|2 glaçons|1 rondelle d''ananas|1 rondelle de pomme|1 cuillère à café de sucre en poudre', 'Mettre le jus de pomme et le jus d''ananas dans un grand verre, puis mélanger. Ajouter le sucre et remuer à nouveau, puis ajouter les glaçons. Mettre 5 min au frigo. Au moment de servir, mettre les rondelles d''ananas et de pommes sur le bord du verre pour la déco.', 'Jus d''ananas/Jus de pommes/Glaçon/Ananas/Pomme/Sucre en poudre'),
(48, 'Cocktail de pomme ambrée', '1 pomme|1 citron|6 glaçons|10 cl de jus de pomme|5 cl de calvados|10 cl de crème de cassis|champagne|un peu de cassis|morceaux de pommes|morceaux d''ananas', 'Taillez une pomme en fines tranches et arrosez-les avec le jus d''un citron. Réservez. Mettez 6 glaçons dans votre shaker, versez 10 cl de jus de pomme, 5 cl de calvados et 10 cl de crème de cassis. Agitez pendant 10 secondes. Répartissez dans 4 verres à cocktail, puis remplissez de champagne. Décore', 'Pomme/Citron/Glaçon/Jus de pommes/Calvados/Crème de cassis/Champagne/Cassis/Pomme/Ananas'),
(49, 'Cocktail des dimanches de neige', 'une poignée de framboises|2 cuillères à café de sirop de gratte-cul|1/2 pamplemousse|1 orange', ' Mettre au fond d''un joli verre, les framboises et le sirop. Ajouter le jus d''orange et de pamplemousse pressés. Servir bien frais et regarder la neige par la fenêtre en se demandant si, vraiment, on va sortir aujourd''hui. ', 'Framboise/Sirop de gratte cul/Pamplemousse/Orange'),
(50, 'Cocktail des îles Praslin', '40 cl de jus de mangue|30 cl de jus d''ananas|20 cl de jus de fruit de la passion|10 cl de jus de citron vert|1 cuillère à soupe de sucre', 'On mélange le tout dans une bouteille. On secoue bien pendant 20 secondes environ et on met au frigo pour que ça soit bien frais au moment de servir. A servir dans des grands verres à cocktail et avec des jolies pailles colorées.', 'Jus de mangue/Jus d''ananas/Jus de fruit de la passion/Jus de citrons verts/Sucre'),
(51, 'Cocktail du verger', '4 cl de liqueur d''abricot|5 cl de liqueur de pomme|12 cl de jus de poire|3 glaçons', 'Dans un grand verre à cocktail, installer les 3 glacons. Verser chaque ingrédient dans l''ordre énoncé ci-dessus. Bien mélanger et déguster !!', 'Liqueur d''abricot/Liqueur de pommes/Jus de poires/Glaçon'),
(52, 'Cocktail exotique au fruit de la passion', '1 l de limonade|35 cl de sirop de curaçao|35 cl de sirop de fruit de la passion|20 cl de jus de citron|5 glaçons', 'Dans un shaker, mélanger le sirop de curaçao, le sirop de fruit de la passion et le jus de citron. Bien secouer puis verser le mélange obtenu dans un récipient. Incorporer le litre de limonade et bien mélanger. Ajouter les 5 glaçons et servir.', 'Limonade/Curaçao/Sirop de fruit de la passion/Jus de citron/Glaçon'),
(53, 'Cocktail glacé tropical', '10 cl du jus de citron vert|10 cl de jus de mangue|1/2 banane|100 g de glace à la mangue|coulis de framboise', 'Mixez tous les ingrédients (sauf le coulis) jusqu''à ce que le mélange soit bien onctueux. Décorez votre verre d''un peu de coulis, et versez votre préparation dans ce même verre.', 'Jus de citrons verts/Jus de mangue/Banane/Mangue/Framboise'),
(54, 'Cocktail italien prosecco', '75 cl de prosecco|20 litchis|30 cl de jus de litchis|10 cl de jus de baies|1 l à 1,5 l de limonade au pamplemousse pétillante, impérativement', 'Mélanger les ingrédients juste avant de servir. Verser dans des verres hauts. Éventuellement, préparer une petite brochette avec un litchi et une cerise par personne.', 'Prosecco/Litchi/Jus de litchis/Jus de baies/Limonade'),
(55, 'Cocktail la variante (à base de rosé)', '5,33l de vin rosé|0,66l de sirop d''agrumes|4l de jus d''orange', 'mélangez le tout Boire très frais &quot;à consommer avec modération&quot;', 'Vin rosé/Sirop d''agrumes/Jus d''orange'),
(56, 'Cocktail light fraîcheur à la pastèque', '300 g de pastèque|1 yaourt 0%|2 cuillères de sirop de roses', 'Enlevez les pépins de la pastèque. Dans un mixeur, mettez la pastèque coupée en morceaux, le yaourt et le sirop de rose. Mixez le tout ! Servez aussitôt !!!', 'Pastèque/Yaourt/Sirop de roses'),
(57, 'Cocktail léger au martini', '1 bouteille de martini rosé|1 bouteille d''eau minérale gazeuse|2 citrons verts|une poignée de feuilles de menthe fraîche|2 cuillères à soupe de sucre', 'Verser le martini dans un grand pichet, ajouter le sucre et faire fondre.Ajouter ensuite les citrons coupés en morceaux et la menthe. Mélanger et mettre au frais au moins 4 heures (une nuit c''est mieux). Au moment de servir, verser la bouteille d''eau gazeuse.', 'Martini rosé/Eau minérale gazeuse/Citron vert/Menthe/Sucre'),
(58, 'Cocktail mexicanos', '12 cl de bière &quot;desperados&quot;|12 cl de jus d''ananas|1 trait de sirop de fraises', 'Dans un verre à bière, verser un trait de sirop de fraise. Compléter avec la bière, en penchant le verre pour éviter de faire trop de mousse, et verser ensuite le jus d''ananas. Boire très frais.', 'Bière/Jus d''ananas/Sirop de fraises'),
(59, 'Cocktail mousseux fraise citron vert (sans alcool)', '400 g de fraises|2 c.à s.de sucre|10 cl de jus de citron vert|30 cl de limonade', 'Laver, équeuter les fraises.Les mettre dans un mixer.Ajouter le jus des citrons verts et le sucre.Mixer.Verser la limonade et mixer de nouveau.Réserver au frais jusqu''au moment de servir. Voilà c''est terminé !!! Bonne dégustation !!', 'Fraise/Sucre/Jus de citrons verts/Limonade'),
(60, 'Cocktail noix de coco-café', '2,5 cl malibu coco|2,5 cl lait de coco|2 cl de lait de soja|1 demi tasse à c. de café bien serré|1 cl de sirop de sucre de canne|5 glaçons pillés', 'Mettre les ingrédients dans un shaker. Agiter énergiquement en maintenant fermement et à deux mains le shaker et ses bouchons. Verser dans de jolis verres à cocktail.Décorer cette préparation de poudre de noisette.', 'Malibu/Lait de coco/Lait de soja/Café/Sirop de sucre de canne/Glaçon'),
(61, 'Cocktail pamplemousse menthe', '1 pamplemousse|2 cuillères à soupe de glace pilée|2 cuillères à soupe de sucre roux|10 feuilles de menthe', 'Retirer le jus des pamplemousses, verser ce jus dans le blender, ajouter le reste des ingrédients et mixer le tout!!', 'Pamplemousse/Glace pilée/Sucre roux/Menthe'),
(62, 'Cocktail paradise', '10 cl de jus d''orange|4 cl de vodka|2 cl de pisang ambon|2 cl de sucre de canne', 'Réunir les ingrédients, hormis le Pisang, dans un shaker. Frapper. Verser dans un verre à cocktail, puis ajouter le Pisang. Servir frais.', 'Jus d''orange/Vodka/Pisang Ambon/Sucre de canne en poudre'),
(63, 'Cocktail pour les amoureux', '12 cl de jus d''oranges|18 cl de cointreau|10 cl de cognac|3 traits de grenadine|10 cl de champagne|quelques framboises', 'Mélanger tous les ingrédients (si possible préalablement mis au frigo) à la cuillère ou au shaker. Ajouter uniquement avant de servir les framboises (pour qu''elles gardent leur consistance) ou une heure avant si vous les souhaitées bien imbibées.', 'Jus d''orange/Cointreau/Cognac/Grenadine/Champagne/Framboise'),
(64, 'Cocktail rose au whisky', '400 g de framboises|6 brins de coriandre fraîche|5 cl de whisky|15 cl de crème fraîche|3 cuillères à soupe de pistaches non salées concassées', '1. Mixez les framboises avec la crème et 15 cl d''eau glacée.Répartissez le mélange obtenu dans des verres. 2. Ajoutez un trait de whisky et parsemez de pistaches concassées.Décorez d''une tige de coriandre et réservez au frais jusqu''au moment de servir.', 'Framboise/Coriandre/Whisky/Crème fraiche/Pistache'),
(65, 'Cocktail rose rosé pamplemousse', '1 bouteille de vin rosé|30 cl de jus de pamplemousse rose|5 cl de grenadine', ' Dans une grande carafe, versez le sirop de grenadine puis le vin rosé et le jus de pamplemousse. Servir très frais. ', 'Vin rosé/Jus de pamplemousse/Grenadine'),
(66, 'Cocktail rose sucré', '150 g de framboises|1 citron|8 glaçons|10 cl de jus de raisin|15 cl de jus d''orange|schweppes|fruits des bois, baie', 'Versez dans le bol d''un mixeur les framboises et le jus du citron. Mixez pour obtenir un fin coulis. Refroidissez un shaker avec 6 glaçons. Jetez l''eau puis remettez 2 glaçons, le coulis de framboise filtré, le jus de raisin et le jus d''orange. Ajoutez 10 secondes puis versez dans 4 verres hauts. Co', 'Framboise/Citron/Glaçon/Jus de raisins/Jus d''orange/Schweppes/Baie'),
(67, 'Cocktail rouge', 'liqueur de litchi|liqueur de fraise|jus d''orange', 'Mélanger dans un verre les proportions suivantes: 40% de liqueur de litchi 20% de liqueur de fraise 40% de jus d''orange. Et vive l''apéro!', 'Liqueur de litchi/Liqueur de fraises/Jus d''orange'),
(68, 'Cocktail sans alcool Cranberry-orange', '25 cl de jus de cranberry|10 cl de jus d''orange|150 g de framboises|2 rondelles de citron ou d''orange|1 cuillère à soupe de jus de citron', 'Mélanger les deux jus. Ajouter les framboises et le jus de citron. Mixer le tout en purée. Servir frappé ou avec quelques glaçons. Décorer vos verres d''une rondelle de citron ou d''orange. A votre santé !', 'Jus de canneberge/Jus d''orange/Framboise/Citron/Jus de citron'),
(69, 'Cocktail sans alcool KidiCana', '5 cl de jus de pomme pétillant kidibul|gingembre|1 cl de sirop de cassis|1 brin de citronnelle|1 pointe de couteau de gingembre en poudre|5 à 6 cuillères à soupe de glace pilée', 'Ciseler la citronnelle. Mettre tous les ingrédients dans un shaker. Ajouter la moitié de la glace pilée. Secouer et verser dans un verre garni du reste de la glace pilée. A votre santé !', 'Jus de pommes/Gingembre/Sirop de cassis/Citronnelle/Gingembre/Glace pilée'),
(70, 'Cocktail sans alcool Sweet Melon', '1 melon vert ovale|2 citrons verts|1 litre de jus d''oranges|1 litre de jus d''ananas|1/2 litre d''eau pétillante', 'Couper la chair du melon en dès. Presser les citrons verts. Verser tous les jus de fruits dans un saladier. Ajouter les dès de melon et laisser reposer au frais pendant 2 heures. Ajouter l''eau pétillante juste avant de servir.', 'Melon vert/Citron vert/Jus d''orange/Jus d''ananas/Eau gazeuse'),
(71, 'Cocktail sans alcool Tropical Sunshine', '10 cl de jus d''ananas|5 cl de jus d''oranges|2 cl de sirop de cassis|1 cuillère à café de noix de coco râpée|glaçons', 'Verser les jus de fruits bien frais et le sirop de cassis dans un verre large. Ajouter quelques glaçons et parsemer de noix de coco râpée.', 'Jus d''ananas/Jus d''orange/Sirop de cassis/Noix de coco/Glaçon'),
(72, 'Cocktail tropical délicieux', '1/4 de l de jus d''orange|1/4 de litre de jus de pamplemousse|1/4 de litre de jus d''ananas|1 gros citron|20 cl de malibu|sirop de grenadine', 'Pour 1 verre : verser 5 cl de malibu, ajouter ensuite 1/3 de pamplemousse, 1/3 d''orange et 1/3 d''ananas ; ajouter ensuite un zeste de jus de citron et 1 trait de grenadine pour la déco.', 'Jus d''orange/Jus de pamplemousse/Jus d''ananas/Citron/Malibu/Sirop de grenadine'),
(73, 'Cocktail white russian', '30 cl de vodka|20 cl de crème de café|30 cl de lait entier|quelques glaçons', ' Mettre dans un blender 20 cl de crème de café, 30 cl de vodka et 30 cl de lait. Rajouter des glaçons et mixer quelques secondes afin que le lait mousse. Déguster ce cocktail bien frais ! ', 'Vodka/Crème de café/Lait entier/Glaçon'),
(74, 'Coconut kiss', '3 cl de jus d''ananas|4 cl de jus d''oranges|2 cl de sirop de noix de coco|3 cl de crème fraîche|1 tranche d''ananas|1 morceau d''orange', 'Mélangez les ingrédients dans un shaker. Servir dans un verre décoré d''un morceau d''orange et un tranche d''ananas', 'Jus d''ananas/Jus d''orange/Sirop de noix de coco/Crème fraiche/Ananas/Orange'),
(75, 'Creole cream (cocktail)', '1 tiers de rhum blanc|1 tiers de vermouth frais mais non glacé|jus de citron|grenadine', 'Verser le rhum blanc, le vermouth, le jus de citron, puis la grenadine.', 'Rhum blanc/Vermouth/Jus de citron/Grenadine'),
(76, 'Cuba libre', '6 cl de rhum blanc|1/2 citron vert|15 cl de coca-cola|glaçons', 'Extraire le jus du citron vert en le pressant. Ajouter les cubes de glace, puis le coca, et remuer', 'Rhum blanc/Citron vert/Coca-cola/Glaçon'),
(77, 'Frosty lime', '1 boule de sorbet citron vert|2 cl de jus de pamplemousse|2 cl de sirop à la menthe|menthe fraîche', 'Mixer les ingrédients et servir le mélange dans un verre à coupe décoré d''une feuille de menthe.', 'Sorbet citron vert/Jus de pamplemousse/Sirop à la menthe/Menthe'),
(78, 'Gin fizz facile', '6 cl de gin|1/2 citron vert|1 cuillère à café de sirop de sucre de canne|eau gazeuse', 'Mettez tous les ingrédients dans un shaker puis agitez énergiquement jusqu''à ce que les parois du shaker se couvrent de buée. Versez le contenu du shaker dans les deux verres puis allongez d''eau gazeuse. Servez frais avec de la glace pilée, une paille et une rondelle de citron vert.', 'Gin/Citron vert/Sirop de sucre de canne/Eau gazeuse'),
(79, 'Ginger cosmo', '12 g de gingembre frais de préférence|3 cl de vodka|2 cl de triple sec|2,5 cl de jus de citrons verts|2 cl de jus de cranberry', 'Cette recette se prépare au shaker et avec un pilon. Peler le gingembre et le concasser grossièrement. Le piler dans le fond du shaker afin de faire ressortir un maximum de jus. Ajouter les autres ingrédients avec des glaçons, fermer le shaker puis shaker pendant au moins 10 secondes. Verser dans un', 'Gingembre/Vodka/Triple sec/Jus de citrons verts/Jus de canneberge'),
(80, 'Grand Marnier sour (cocktail)', '3 cl de grand marnier cordon rouge|3 cl de jus de citron', ' Dans un shaker mettre le Grand Marnier et le jus de citron, frappez et servir dan un grand verre à cocktail ', 'Grand marnier/Jus de citron'),
(81, 'Hulk ( cocktail )', '7 cl de martini blanc|5 cl de get 27|6 cl de jus de pamplemousse', 'Mélanger tous les ingrédients précités dans une petite coupe à cocktail. Ajouter un glaçon ou deux et ... déguster !!', 'Martini blanc/Get 27/Jus de pamplemousse'),
(82, 'Le baiser de la Schtroumpfette', '2cl de vodka|2cl de curaçao|5cl de limonade|5cl de jus de banane', 'Verser tous les ingrédients dans l''ordre dans un verre à martini ou à cocktail et servir très très frais!', 'Vodka/Curaçao/Limonade/Jus de bananes'),
(83, 'Le vandetta', '15 cl de jus d''ananas|2 cl de sirop d''orgeat|2 cl de sirop de fraises|5 fraises', 'Lavez et équeutez les fraises. Mixer tous les ingrédients et servez dans un verre rapidement.', 'Jus d''ananas/Sirop d''orgeat/Sirop de fraises/Fraise'),
(84, 'Margarita', '5 cl de tequila|3 cl de triple sec|2 cl de jus de citrons verts|sel', 'Dans un shaker, frapper les ingrédients avec des glaçons puis verser dans un verre givré au citron et au sel fin.', 'Tequila/Triple sec/Jus de citrons verts/Sel'),
(85, 'Margarita à la fraise', 'glace pilée|2 à 3 citrons verts|1 barquette de fraise fraîche|20 cl de tequila|12 cl de cointreau ou triple x|2 cuillères à soupe de sucre', ' Laver et équeuter les fraises. Mettre les glacons dans un robot et mixer avec les fraises. Presser les citrons verts. Mettre la téquila, le cointreau et le jus de citron dans un doseur avec les 2 cuillères à soupe de sucre. Mélanger puis verser dans le mixer avec la glace pilée et les fraises. Déco', 'Glace pilée/Citron vert/Fraise/Tequila/Cointreau/Sucre'),
(86, 'Mojito', '6 cl de rhum cubain|1/2 citron vert|8 feuilles de menthe|eau gazeuse|2 cuillères à café de sucre', 'Mettre dans un verre, les feuilles de menthe le sucre et le citron vert coupé en cubes Piler. Ajouter le rhum, de la glce pilé ou des glaçons, l''eau gazeuse et mélanger.', 'Rhum/Citron vert/Menthe/Eau gazeuse/Sucre'),
(87, 'Mojito au Basilic', '5 cl de rhum blanc|eau gazeuse|5 cl de sirop de sucre de canne|1/2 cuillère de sucre roux|1/2 citron vert|feuilles de basilic|glace pilée ou glaçons', 'Couper une rondelle de Citron Vert et la déposer au fond du verre à cocktail.Mettre des glaçons dans un torchon propre, et les piler avec un marteau.Couper les feuilles de basilic en petits morceaux et les mélanger à la glace pilée.Remplir le verre de glace pilée/basilic aux 2 tiers.Ajouter les 5 cl', 'Rhum blanc/Eau gazeuse/Sirop de sucre de canne/Sucre roux/Citron vert/Basilic/Glaçon'),
(88, 'Mojito cubain', '3 cuillères à café de sucre de canne en poudre|1/2 citron vert|1 branche de menthe bien fournie|eau gazeuse|rhum|glaçons', 'Dans un verre de taille moyenne (contenance 40 cl environ), mettez 3 cuillères à café de sucre de canne. Ajoutez-y le jus d''1/2 citron vert. Coupez en 3 ou 4 votre branche de menthe et mettez-la dans le verre (le fait de la couper permet à la saveur de la menthe de mieux se diffuser). Ajoutez un peu', 'Sucre de canne en poudre/Citron vert/Menthe/Eau gazeuse/Rhum/Glaçon'),
(89, 'Negroni Cocktail', '3 volumes de campari|3 volumes de martini rouge|3 volumes de gin|3 gouttes d''angostura|1 soda|glace pilée|1 rondelle d''orange pour décorer', 'Mélanger les ingrédients dans un verre à whisky (tumbler) et servir.', 'Campari/Martini rouge/Gin/Angostura/Soda/Glace pilée/Orange'),
(90, 'Pink 3x6 (cocktail sans alcool)', '3 citrons verts|3 citrons jaunes|3 verres de jus de framboises|3 verres de jus de pamplemousses roses|3 cuillères à soupe de sirop de roses|3 verres de limonade|glaçons', 'Pressez les trois citrons verts et les trois citrons jaunes, mettez le jus dans un saladier. Ajoutez le jus de framboise et de pamplemousse rose. Versez trois cuillères à soupe de sirop de rose. Mélangez et gardez la préparation au frais. Juste avant de servir, versez la limonade bien fraîche et ajo', 'Citron vert/Citron/Jus de framboises/Jus de pamplemousse/Sirop de roses/Limonade/Glaçon'),
(91, 'Piña Colada', '4 cl de rhum blanc|2 cl de rhum ambré|12 cl de jus d''ananas|4 cl de lait de coco', 'Mélanger tous les ingrédients directement dans un verre, ou dans un blender pour les mixer. C''est prêt !', 'Rhum blanc/Rhum ambré/Jus d''ananas/Lait de coco'),
(92, 'Piña Colada (cocktail)', '125 g de crème liquide|150 g de crème de noix de coco|20 cl de jus d''ananas non sucré|20 cl de rhum blanc|glaçons', 'Mettre tous les ingrédients, sauf les glaçons, dans un mixer et faire tourner à très grande vitesse pendant 30 sec environ. Mettre les glaçons dans les verres et verser par-dessus la crème obtenue.', 'Crème liquide/Crème de noix de coco/Jus d''ananas/Rhum blanc/Glaçon'),
(93, 'Porto Flip', '4 cl de porto|2 cl de cognac|1 oeuf|cannelle|sirop de canne|noix de muscade|glaçons', 'Dans un shaker, mettre les alcools et le sirop de canne. Ensuite ajouter les épices. Melanger avec une longue cuillère. Rajouter un oeuf et les glacons. Fermer le shaker et mixer. Servir dans un verre a cocktail, saupodrer d''un peu de cannelle. On peut le faire uniquement avec du porto aussi.', 'Porto/Cognac/Oeuf/Cannelle/Sirop de sucre de canne/Noix de muscade/Glaçon'),
(94, 'Punch-sangria de pastèque', '1 pastèque de 2 kg|1 orange|2 pêches|6 fraises|10 feuilles de menthe|1 l de vin blanc au choix|1/2 cuillère à café de gingembre frais ou en poudre|curaçao ou rhum', 'Laver la pastèque. Découper un &quot;couvercle&quot;, vider la pastèque avec une cuillère {si possible créer des petites boules de la grosseur de billes} Laisser 1/2 cm de chair pour ne pas crever la peau. Refroidir la pastèque vide 1 bonne heure. Réduire la moitié de la pulpe retirée en jus, y ajou', 'Pastèque/Orange/Pêche/Fraise/Menthe/Vin blanc/Gingembre/Rhum'),
(95, 'Raifortissimo', '5 cl de jus de pommes|3 cl de jus de citrons verts|10 g de raifort|1 kiwi|3 glaçons', 'Mixez tous les ingrédients et versez dans un verre.', 'Jus de pommes/Jus de citrons verts/Raifort/Kiwi/Glaçon'),
(96, 'Rainbow', '10 cl de jus d''orange|3 cl de vodka|3 cl de sirop de grenadine|2 cl de curaçao bleu', 'Recette pour 10 verres. versez la grenadine dans le shaker, remplissez le shaker de glaçons aux 2/3, versez la vodka, versez le jus d''orange. Finissez de remplir le shaker de glaçons. Versez délicatement le curaçao, de mélangez pas, versez en filtrant dans tous les verres alignés sans vous arrêter. ', 'Jus d''orange/Vodka/Sirop de grenadine/Curaçao bleu'),
(97, 'Red cocktail', '2 cl de sirop de fraise|10 cl de jus de pêche|4 cl de vodka|2 cl de liqueur de poire|glaçons', 'Verser tous les ingrédients, hormis le sirop de fraise, dans un shaker avec 3 cubes de glace. Secouer pendant 20 secondes. Verser dans le verre, et ajouter le sirop de fraise.', 'Sirop de fraises/Jus de pêches/Vodka/Liqueur de poire/Glaçon'),
(98, 'Rhum arrangé à la pomme', '25 cl de rhum|1 l de jus de pommes|10 cl de sucre de canne|cannelle', 'Dans une bouteille, mélanger les 25 cl de rhum ambré avec le litre de jus de Pomme et compléter par une rasade de Sucre de canne. Aromatisé de cannelle ou autre suivant vos goûts, puis laisser reposer au moins une journée pour que la macération soit complète.', 'Rhum/Jus de pommes/Sucre de canne en poudre/Cannelle'),
(99, 'Rince-gouttes (cocktail)', '1,5 l de cidre|25 cl de cognac|25 cl de crème de cassis|glaçons', 'Dans un grand saladier, commencer par mettre la crème de cassis, ensuite ajoutez le cognac et finalement la bouteille de cidre. Ajoutez en dernier lieu les glaçons pour que l''apéro reste frais.', 'Cidre de pommes/Cognac/Crème de cassis/Glaçon'),
(100, 'Sangria sans alcool', '8 cl de sirop de sangria|100 cl de jus de raisins|20 cl de jus d''oranges|10 cl de jus de citrons|fruits de saisons', 'Mélangez le sirop et les jus dans un grand récipient. Ajoutez ensuite les fruits de saisons coupés en petits morceaux. Mettez le tout au réfrigérateur pendant 4h avant de servir.', 'Sirop de sangria/Jus de raisins/Jus d''orange/Jus de citron/Fruit'),
(101, 'Screwdriver', '4 cl de vodka|12 cl de jus d''orange', 'Dans un verre, mélanger la vodka et le jus d''orange.', 'Vodka/Jus d''orange'),
(102, 'Shoot up', '1 cl de mangalore|eau gazeuse|3 cl de sirop d''abricot', 'Versez le mangalore et le sirop d''abricot dans un verre et finissez par l''eau gazeuse bien fraiche.', 'Mangalore/Eau gazeuse/Sirop d''abricot'),
(103, 'Shot piquant', 'sirop de grenadine|tabasco|vodka', ' Dans un petit verre (environ 4 cm de diamètre et 5 cm de hauteur), versez 3 mm de sirop de grenadine. Ajoutez 4-6 gouttes de tabasco, puis versez très lentement 2-3 cm de vodka (froide, de préférence), pour ne pas mélanger les ingrédients. Ce cocktail se boit \"cul-sec\". On sent relativement peu l''a', 'Sirop de grenadine/Sauce tabasco/Vodka'),
(104, 'Soupe au Champagne (cocktail)', '8 cl de cointreau|16 cl de sirop de sucre de canne|2 citrons verts pressés|1 bac de glaçons|75 cl de champagne', 'Verser dans un récipient le Cointreau, le sucre de canne et le jus de citron. Faire macérer pendant une nuit. Ajouter le Champagne au moment de servir avec les glaçons.', 'Cointreau/Sirop de sucre de canne/Citron vert/Glaçon/Champagne'),
(105, 'Tequila sunrise', '6 cl de tequila|12 cl de jus d''orange|2 cl de sirop de grenadine', 'Verser la tequila sur des glaçons dans le verre. Compléter avec le jus d''orange et remuer. Verser doucement le sirop de grenadine dans le verre pour qu''il tombe au fond.', 'Tequila/Jus d''orange/Sirop de grenadine'),
(106, 'Ti''punch', '6 cl de rhum blanc|2 cl de sirop de sucre de canne|citron vert|glace pilée', 'Couper les extrémités du citron vert et couper le en demi-rondelles. Mettre 4 demi-rondelles dans un verre et écraser avec un pilon ou une cuillère. Ajouter le rhum et le sirop de sucre de canne. Ajouter de la glace pilée et mélanger.', 'Rhum blanc/Sirop de sucre de canne/Citron vert/Glace pilée'),
(107, 'Tutti cocktail', '2 cl de sirop de fraise|2 cl de sirop de pêche|4 cl de vodka|4 cl de liqueur de pomme|5 glaçons', 'Mélanger au shaker puis ajouter les glaçons. Pour un petit effet, mettre le sirop de fraise après le mélange.', 'Fraise/Sirop de pêche/Vodka/Liqueur de pommes/Glaçon'),
(108, 'Virevoltage', '1 cl de malibu|1 cl de liqueur de litchi|jus d''ananas|jus de pomme|sirop de fraise', 'Dans un verre à cocktail rempli de glaçons, mettre le Malibu et le Soho. Remplir la moitié du verre de jus d''ananas et l''autre moitié de jus de pomme, ajouter une goutte de sirop de fraise ou grenadine. Servir très frais. Bon cokctail à tous!', 'Malibu/Liqueur de litchi/Jus d''ananas/Jus de pommes/Sirop de fraises');
"; 
$statement = $connexion->prepare($request);
$statement->execute();

//-- --------------------------------------------------------

//--
//-- Structure de la table `recettes_preferees`
//--

$request = "CREATE TABLE IF NOT EXISTS `recettes_preferees` (
  `no_util` int(11) NOT NULL,
  `no_recette` int(11) NOT NULL,
  PRIMARY KEY (`no_util`,`no_recette`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;" ;

$statement = $connexion->prepare($request);
$statement->execute();


//--
//-- Contenu de la table `recettes_preferees`
//--

$request = "INSERT INTO `recettes_preferees` (`no_util`, `no_recette`) VALUES
(4, 93),
(4, 98);" ;

$statement = $connexion->prepare($request);
$statement->execute();

//-- --------------------------------------------------------

//--
//-- Structure de la table `utilisateurs`
//--

$request = "CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `no_util` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `nom_util` varchar(30) NOT NULL,
  `prenom_util` varchar(30) NOT NULL,
  `mdp` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sel` varchar(16) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `date_naissance` date NOT NULL,
  `code_postal` int(5) NOT NULL,
  `adresse` varchar(165) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  PRIMARY KEY (`no_util`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ; " ;

$statement = $connexion->prepare($request);
$statement->execute();

//--
//-- Contenu de la table `utilisateurs`
//--

$request = "INSERT INTO `utilisateurs` (`no_util`, `login`, `nom_util`, `prenom_util`, `mdp`, `email`, `sel`, `sexe`, `date_naissance`, `code_postal`, `adresse`, `ville`, `telephone`) VALUES
(2, 'e''yzet', 'zghntr,', 'hdtn', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'zemflgknreb', '1831433744', 'H', '2014-07-22', 0, 'azeg', 'ehrdjf', '165321'),
(4, 'test', 'Dupond', 'François', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'test@gmail.com', '1766319660', '', '0000-00-00', 57000, '15 rue des tilleuls', 'metz', '0387985435');
";
$statement = $connexion->prepare($request);
$statement->execute();

///*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
///*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
///*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

?>
