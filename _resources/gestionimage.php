<?php

require_once ('appelAllClasses.php');
 

function savImageBase($user) {
	$idUser = $user-> getidUtilisateur();
	$bdd = connexion::getInstance() -> connect();
	$reponse = $bdd -> query('SELECT * FROM Image WHERE idUtilisateur='.$idUser);
	$resutl = $reponse -> fetch();
	$dataImageNet=$user-> getImage();
	if (!$resutl) {	
		$req=$bdd->prepare('INSERT INTO Image(idUtilisateur, dataImage) VALUES(:idutilsateur,:dataImage)');
		$res=$req->execute(array('idutilsateur'=>$idUser,
							'dataImage'=>$dataImageNet));
	}
}

function loadImageBase($idUser) {
	$bdd = connexion::getInstance() -> connect();
	$reponse = $bdd -> query('SELECT * FROM Image WHERE idUtilisateur='.$idUser);
	if ($result=$reponse -> fetch()) {
		return base64_encode($result['dataImage']);
	} else 	{
		//Pas Beau mais le chemin absolu ne fonctionne pas
		$chemin="./../_html/img/misc/default.png";
		$img_blob = file_get_contents ($chemin);
		return base64_encode($img_blob);
	}
}

function isImageBase($idUser) {
	$bdd = connexion::getInstance() -> connect();
	$reponse = $bdd -> query('SELECT * FROM Image WHERE idUtilisateur='.$idUser);
	if ($result=$reponse -> fetch()) {
		return 1;
	} else 	{
		//pas d'image
		return 0;
	}
}
	
	

?>