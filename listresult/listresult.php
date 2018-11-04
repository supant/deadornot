<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();



if (!isset($_SESSION['champrecherche']) || empty($_SESSION['champrecherche'])) {
    $requestTxt='';
} else $requestTxt=$_SESSION['champrecherche'];

unset($_SESSION['champrecherche']);

$requestApiWiki=API_WIKI.'api.php?action=query&format=json&list=search&srnamespace=0&srlimit='.API_NB_RESULT.'&srsearch='.$requestTxt;
$response = file_get_contents($requestApiWiki);
//$response = file_get_contents('./api-result.json');
$responseJson = json_decode($response);

//Tests en cas de pb

$resultats=$responseJson->{'query'}->{'search'};
if(is_array($resultats)) {
    $cpt=0;
    foreach($resultats as $ligne) {
        if($cpt<LISTRESULT_NB_RESULT_AFFICHE) {
            $arrayligne =  (array) $ligne;
            $tableauResult[]=$arrayligne;
            $cpt++;
        }
    }
   
    
} else print_r("Error : Le resultat n'est pas un tableau");

//print_r($tableauResult);

$pageTitle = LISTRESULT_TITRE;
$file = "./../listresult/listresult.html";
$pageNum = 2;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauResult", $tableauResult);
$tbs -> show();





?>
