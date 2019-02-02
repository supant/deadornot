<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();


if (!isset($_SESSION['idrecherche']) || empty($_SESSION['idrecherche'])) {
    $requestId='';
} else $requestId=$_SESSION['idrecherche'];

if (!isset($_SESSION['champrecherche']) || empty($_SESSION['champrecherche'])) {
    $requestTxt='';
} else $requestTxt=$_SESSION['champrecherche'];

if (!isset($_SESSION['txtrecherche']) || empty($_SESSION['txtrecherche'])) {
    $requestTxtTab='';
} else $requestTxtTab=$_SESSION['txtrecherche'];


//unset($_SESSION['idrecherche']);
//unset($_SESSION['champrecherche']);
//unset($_SESSION['txtrecherche']);

// Cette partie pourrait etre faite dans le HTML et donc dans le navigateur du client
$pResult=$SESSION['personne'];
$tabPersonneTmp=$pResult->getArray();
$tabPersonne = array();
$tabPersonne[]=$tabPersonneTmp;



$pageTitle = FICHE_TITRE;
$file = "./../fiche/fiche.html";
$pageNum = 3;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tabPersonne", $tabPersonne);
$tbs -> show();





?>
