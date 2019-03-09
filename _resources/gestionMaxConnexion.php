<?php


function isGestionConnexionExist() {
    if (!isset($_SESSION['dateLastCall']) || !isset($_SESSION['cptRecherche']) || !isset($_SESSION['cptListe']))
        return 0;
    else return 1;
}

function isMAxConnexion() {
    $retour = 0;
    //print_r(time()-$_SESSION['dateLastCall']);
    if ( (time()-$_SESSION['dateLastCall'])>MAX_TEMPS) {
        mettreConnexionZero();
    }
    else {
        if ($_SESSION['cptRecherche']>MAX_CPTRECHERCHE) $retour=1;
        if ($_SESSION['cptListe']>MAX_CPTLISTE) $retour=1;
        
    }
    return $retour;
    
}



function mettreConnexionZero() {
    $_SESSION['dateLastCall']=time();
    $_SESSION['cptRecherche']=0;
    $_SESSION['cptListe']=0;
}



?>