<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();


if ($_POST['action'] == ALL_RECHERCHER_VALUE) {
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
        $idrechercheTmp=$_POST['idrecherche'];
        if (!isset($_POST['champrecherche']))  $champrechercheTmp ='';
        else $champrechercheTmp =$_POST['champrecherche'];
        if (!isset($_POST['txtrecherche']))  $txtrechercheTmp='';
        else $txtrechercheTmp=$_POST['txtrecherche'];
        
        $Personne=chercherPersonneFromID($idrechercheTmp,$txtrechercheTmp,$champrechercheTmp);
        if ($Personne->isValide()==true) 
            echo(json_encode(array(RETOUR_OK, PAGE_QUIZ)));
        else echo(json_encode(array(RETOUR_OK, PAGE_NOINFO)));
        
    }
}

if ($_POST['action'] == LISTRESULT_BOUTON_BACK_VALUE) {
        echo(json_encode(array(RETOUR_OK, PAGE_MENU)));
      
}

	

?>