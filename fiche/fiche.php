<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

$Personne = $_SESSION['personne'];
$tabPersonne=$Personne->getArray();
$nom = $Personne->getNom();

ecrire(FICHIER_OK,$Personne->getIdPage().';'.$Personne->getNom());



$pageTitle = FICHE_TITLE;
$file = "./../fiche/fiche.html";
$pageNum = 3;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauPersonne", $tabPersonne);
$tbs -> show();





?>
