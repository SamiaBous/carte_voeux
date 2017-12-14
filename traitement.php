<?php

	$nom = $_POST['nom'];
	$message = $_POST['message'];
	$mail = $_POST['mail'];
	$object = 'meilleurs voeux';
	$to ="monstre-plante@live.fr";


	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";


	$message = "<img src='https://samiab.promo-4.codeur.online/carte/carte_voeu.png'>" . $message . "<a href='https://samiab.promo-4.codeur.online/carte/'>joyeuses fêtes</a>"; 

	mail($to, $object, $message, $headers);

	try 
	{
		$bdd = new PDO('mysql:host=localhost;dbname=samiab_db;charset=utf8', 'samiab', '3vXS38RpAU');
		//$bdd = new PDO('mysql:host=localhost;dbname=carte_voeux;charset=utf8', 'root', '');

		$bdd->query("SET NAMES 'utf8'");
	}

	catch (Exception $e)
	{
		die('Erreur :' . $e->getMessage());
	}


	$requete1 = $bdd->prepare('INSERT INTO messages_voeux (nom, message, email) VALUES (:nom,:message,:mail)');
	$requete1->execute(array(
	'nom' => $_POST['nom'],
	'message' => $_POST['message'],
	'mail' => $_POST['mail']));

	$requete1->closeCursor();
	
?>




