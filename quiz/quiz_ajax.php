<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();


if ($_POST['action'] == MENU_BOUTON_RECHERCHER_VALUE) {
    if (!isset($_POST['champrecherche']) || empty($_POST['champrecherche']) || $_POST['champrecherche'][0]!='x' ) {
            echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
        } else {
            
            $_SESSION['champrecherche']=substr($_POST['champrecherche'],1,strlen($_POST['champrecherche'])-1);
            //$_SESSION['champrecherche']=$_POST['champrecherche'];
            echo(json_encode(array(RETOUR_OK, PAGE_LISTRESULT)));
        }
   }
if ($_POST['action'] == MENU_BOUTON_RANDOM_VALUE) {
        echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
        
}

	

?>