<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

if (isGestionConnexionExist()==0) {
    $_SESSION['messageA']= ERREUR_NOGESTIONCONNEXION;
    header('location:'.PAGE_ERREUR.'');
} else {
    if(isMAxConnexion()==1) {
        $_SESSION['messageA']= ERREUR_TOOMANYCONNEXION;
        header('location:'.PAGE_ERREUR.'');
    }
}

$_SESSION['cptListe']+=1;

if ($_POST['action'] == ALL_RECHERCHER_VALUE) {
    if (!isset($_POST['champrecherche']) || empty($_POST['champrecherche']) ) {
            echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
        } else {
            $_SESSION['champrecherche']=$_POST['champrecherche'];
            echo(json_encode(array(RETOUR_OK, PAGE_LISTRESULT)));
        }
   }
if ($_POST['action'] == MENU_BOUTON_RANDOM_VALUE) {
        echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
        
}

	

?>