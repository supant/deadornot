<?php


function chercherPersonneFromID($idrechercheTmp,$txtrechercheTmp,$champrechercheTmp) {
    $requestApiWiki=API_WIKI.'api.php?action=query&format=json&prop=&export=1&pageids='.$idrechercheTmp;
    $response = file_get_contents($requestApiWiki);
    //$response = file_get_contents('./api-result.json');
    $responseJson = json_decode($response);
    
    $resultats=$responseJson->{'query'}->{'export'}->{'*'};
    if (!empty($resultats)) {
        $pResult=parseWiki($idrechercheTmp,$txtrechercheTmp,$champrechercheTmp,$resultats); 
    } else {
        $pResult=new Personne();
        $pResult->setIdPage($idPage);
        $pResult->setNom($nom);
        $pResult->setRechercheOri($champrechercheTmp);
        $pResult->setErreur(ERREUR_NORESULT);
        $pResult->setValide(0);
    }
    
    
    
    return $pResult;
    
    
}

function chercherListeFromTxt($requestTxt) {
    if ($requestTxt=='') {
        $tableauResult=array();
    } else {
        $requestApiWiki=API_WIKI.'api.php?action=query&format=json&list=search&srnamespace=0&srlimit='.API_NB_RESULT.'&srsearch='.$requestTxt;
        $response = file_get_contents($requestApiWiki);
        //$response = file_get_contents('./api-result.json');
        $responseJson = json_decode($response);
        
        //Tests en cas de pb
        $resultats=$responseJson->{'query'}->{'search'};
        if(is_array($resultats)) {
            $cpt=0;
            foreach($resultats as $ligne) {
                if($cpt<LISTRESULT_NB_RESULT_AFFICHE) {
                    $arrayligne =  (array) $ligne;
                    $tableauResult[]=$arrayligne;
                    $cpt++;
                }
            }  
        } else $tableauResult=array();
    }
    return $tableauResult;
}



?>