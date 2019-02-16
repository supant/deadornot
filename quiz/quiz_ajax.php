<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();



if ($_POST['action'] == QUIZ_BOUTON_PASSER_VALUE) {
    echo(json_encode(array(RETOUR_OK, PAGE_FICHE)));
        
}

	

?>