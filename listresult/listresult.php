<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

if (!isset($_SESSION['champrecherche']) || empty($_SESSION['champrecherche'])) {
    $requestTxt='';
} else $requestTxt=$_SESSION['champrecherche'];

unset($_SESSION['champrecherche']);

$tableauResult=chercherListeFromTxt($requestTxt);

$pageTitle = LISTRESULT_TITRE;
$file = "./../listresult/listresult.html";
$pageNum = 2;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauResult", $tableauResult);
$tbs -> show();





?>
