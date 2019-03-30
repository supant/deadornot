<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

if (isGestionConnexionExist()==0) {
    $_SESSION['messageA']= ERREUR_NOGESTIONCONNEXION;
    header('location:'.PAGE_ERREUR.'');
} else {
    if(isMAxConnexion()==1) {
        $_SESSION['messageA']= ERREUR_TOOMANYCONNEXION;
        header('location:'.PAGE_ERREUR.'');
    }
}


if (!isset($_SESSION['champrecherche']) || empty($_SESSION['champrecherche'])) {
    $requestTxt='';
} else $requestTxt=$_SESSION['champrecherche'];

unset($_SESSION['champrecherche']);

$tableauResult=chercherListeFromTxt($requestTxt);
$noresult=0;
if ($tableauResult==null) { 
    $tableauResult=array();
    $noresult=1;
}

$pageTitle = LISTRESULT_TITRE;
$file = "./../listresult/listresult.html";
$pageNum = 2;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauResult", $tableauResult);
$tbs -> show();





?>
