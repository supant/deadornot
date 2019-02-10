<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

    if ($_POST['action'] == ALL_BACK_VALUE) {
        echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
        
    }

	

?>