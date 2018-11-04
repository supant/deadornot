<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();


if ($_POST['action'] == MENU_BOUTON_RECHERCHER_VALUE) {
    if (!isset($_POST['champrecherche']) || empty($_POST['champrecherche'])) {
            echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
    } else {
            $_SESSION['champrecherche']=$_POST['champrecherche'];
            echo(json_encode(array(RETOUR_OK, PAGE_LISTRESULT)));
    }
}

if ($_POST['action'] == LISTRESULT_BOUTON_PERSONNE_VALUE) {
    if (!isset($_POST['idrecherche']) || empty($_POST['idrecherche'])) {
        echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
    } else {
        $_SESSION['idrecherche']=$_POST['idrecherche'];
        if (!isset($_POST['champrecherche']))  $_SESSION['champrecherche']='';
        else $_SESSION['champrecherche']=$_POST['champrecherche'];
        if (!isset($_POST['txtrecherche']))  $_SESSION['txtrecherche']='';
        else $_SESSION['txtrecherche']=$_POST['txtrecherche'];
        
        echo(json_encode(array(RETOUR_OK, PAGE_AFFICHEPERSONNE)));
    }
}

if ($_POST['action'] == LISTRESULT_BOUTON_BACK_VALUE) {
        echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
      
}

	

?>