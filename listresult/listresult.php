<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

 
$tableauResult= [];

$pageTitle = LISTRESULT_TITRE;
$file = "./../listresult/listresultmenu.html";
$pageNum = 1;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauResult", $tableauResult);
$tbs -> show();

//https://templated.co/items/demos/binary/elements.html





?>
