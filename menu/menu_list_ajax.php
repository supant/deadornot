<?php

require_once ("./../_resources/appelAllClasses.php");
session_start();


if (!isset($_POST['query']) || empty($_POST['query'])) {
    $requestTxt='';
} else $requestTxt=$_POST['query'];


$result='{"query": "Unit","suggestions": [';

if (strlen($requestTxt)>NBCARACTCHERCHE) {
    $tableauResult=chercherListeFromTxt($requestTxt);
    if ($tableauResult==null) $tableauResult=array();
} else { 
    $tableauResult=array();
}

foreach ($tableauResult as $ligne){
    $result.='{ "value" : "'.$ligne['title'].'", "data" : "'.$ligne['pageid'] .'" },';
}
$result = substr($result,0,strlen($result)-1);
$result.=']}';
echo $result;

?>