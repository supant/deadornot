<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

 

$pageTitle = ABOUT_TITLE;
$file = "./../about/about.html";
$pageNum = 6;
$tbs = new clsTinyButStrong;
$tbs -> LoadTemplate("./../_template/template.htm");
$tbs -> show();






?>
