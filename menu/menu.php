<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
 
$tableauRecent=array();

//$tableauRecent= [['name'=>"Madonna"],['name'=>"Corbier"],['name'=>"Jean Rochefort"],['name'=>"Jennifer Aniston"]];

$pageTitle = MENU_TITRE;
$file = "./../menu/menu.html";
$pageNum = 1;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauRecent", $tableauRecent);
$tbs -> show();






?>
