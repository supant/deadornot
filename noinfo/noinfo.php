<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();


$Personne = $_SESSION['personne'];
$tabPersonne=$Personne->getArray();

ecrire(FICHIER_KO,$Personne->getIdPage().';'.$Personne->getNom().';'.$Personne->getRechercheOri().';'.$Personne->getErreur());

$pageTitle = NOINFO_TITLE;
$file = "./../noinfo/noinfo.html";
$pageNum = 5;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauPersonne", $tabPersonne);

$tbs -> show();






?>
