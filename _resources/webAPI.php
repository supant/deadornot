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
        $pResult->setErreur("Pas de resultat");
    }
    
    
    
    return $pResult;
    
    
}



?>