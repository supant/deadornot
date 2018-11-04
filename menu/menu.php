<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

 
$tableauRecent= [['name'=>"Madonna"],['name'=>"Corbier"],['name'=>"Jean Rochefort"],['name'=>"Jennifer Aniston"]];

$pageTitle = MENU_TITRE;
$file = "./../menu/menu.html";
$pageNum = 1;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauRecent", $tableauRecent);
$tbs -> show();

//https://templated.co/items/demos/binary/elements.html





?>
