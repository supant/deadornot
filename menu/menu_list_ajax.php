<?php

require_once ("./../_resources/appelAllClasses.php");
session_start();

if (!isset($_POST['champrecherche']) || empty($_POST['champrecherche'])) {
    $requestTxt='';
} else $requestTxt=$_POST['champrecherche'];


$tableauResult=chercherListeFromTxt($requestTxt);
if ($tableauResult==null) $tableauResult=array();
$result="";
foreach ($tableauResult as $ligne){
    $result.='<option class="suggestionOption" value="'.$ligne['title'].'" idr="'.$ligne['pageid'] .'">'.$ligne['title'].'</option>';
}
    
echo $result;

?>