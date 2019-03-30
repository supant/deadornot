<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

$Personne = $_SESSION['personne'];
$tabPersonne=$Personne->getArray();
$nom = $Personne->getNom();
if ($Personne->getIsMort()==1) $estmort = 1; else $estmort = 0;



$pageTitle = QUIZ_TITLE;
$file = "./../quiz/quiz.html";
$pageNum = 4;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauPersonne", $tabPersonne);
$tbs -> show();






?>
