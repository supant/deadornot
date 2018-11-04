<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();


if ($_POST['action'] == AFFICHEPERSONNE_BOUTON_RECHERCHER_VALUE) {
    if (!isset($_POST['champrecherche']) || empty($_POST['champrecherche'])) {
            echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
    } else {
            $_SESSION['champrecherche']=$_POST['champrecherche'];
            echo(json_encode(array(RETOUR_OK, PAGE_LISTRESULT)));
    }
}
if ($_POST['action'] == AFFICHEPERSONNE_BOUTON_BACK_VALUE) {
        echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
      
}

	

?>