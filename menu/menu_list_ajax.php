<?php

require_once ("./../_resources/appelAllClasses.php");
session_start();


if (!isset($_POST['query']) || empty($_POST['query'])) {
    $requestTxt='';
} else $requestTxt=$_POST['query'];


$result='{"query": "Unit","suggestions": [';


    $tableauResult=chercherListeFromTxt($requestTxt);
    if ($tableauResult==null) $tableauResult=array();


foreach ($tableauResult as $ligne){
    $result.='{ "value" : "'.$ligne['title'].'", "data" : "'.$ligne['pageid'] .'" },';
}

//$result.='{ "value" : "toto", "data" : "22" },';
//$result.='{ "value" : "ggre", "data" : "56" },';
$result = substr($result,0,strlen($result)-1);
$result.=']}';
echo $result;

?>