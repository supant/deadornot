<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

$response = file_get_contents('./KarlL.json');
$responseJson = json_decode($response);

$resultats=$responseJson->{'query'}->{'export'}->{'*'};
if (!empty($resultats)) {
    $pResult=parseWiki("","","",$resultats);
    print_r($pResult);
} else {
  print_r("error");
}






?>
