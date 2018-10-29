<?php

//pour le template
function getTitreEvenement($idEvenement) {
	$bdd = connexion::getInstance() -> connect();
	$requete = 'SELECT titre FROM Evenement WHERE idEvenement = "' . $idEvenement . '" ';
	$req = $bdd -> prepare($requete);
	$req -> execute();
	$result = $req -> fetchAll();
	return ($result[0][0]);
}



?>