<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

 
$tableauRecent= [['name'=>"Madonna"],['name'=>"Corbier"],['name'=>"Jean Rochefort"],['name'=>"Jennifer Aniston"]];

$pageTitle = MENU_TITRE;
$file = "./../quiz/quiz.html";
$pageNum = 4;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> MergeBlock("tableauRecent", $tableauRecent);
$tbs -> show();






?>
