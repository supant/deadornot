<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

if (isset($_SESSION['messageA'])) {
    $messageA=$_SESSION['messageA'];
    unset($_SESSION['messageA']);
} else {
    $messageA= ERREUR_NOERREURMESSAGE;
}

$messageB = "";

if (isset($_SESSION['dateLastCall'])) {
    $messageB.=$_SESSION['dateLastCall'].'-';
}
if (isset($_SESSION['cptRecherche'])) {
    $messageB.=$_SESSION['cptRecherche'].'-';
}
if (isset($_SESSION['cptListe'])) {
    $messageB.=$_SESSION['cptListe'];
}

$pageTitle = ERREUR_TITLE;
$file = "./../erreur/erreur.html";
$pageNum = 1;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> show();






?>
