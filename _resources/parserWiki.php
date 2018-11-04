<?php
function parseWiki($idPage,$nom,$pageTxt) {
    $pResult=new Personne();
    $pResult->setIdPage($idPage);
    $pResult->setNom($nom);
    if (strlen($pageTxt)<1) {
        $pResult->setErreur("erreur : y'a rien à parser");
        return $pResult;
    }
    
    $debutBD =strPos($pageTxt,"birth_date");
    $debutBP =strPos($pageTxt,"birth_place");
    $debutDD =strPos($pageTxt,"death_date");
    $debutDP =strPos($pageTxt,"death_place");
    $debutBlock=0;
    $finBlock=0;
    
    // Date Naissance
    if ($debutBD === false) {
        $pResult->setErreur("erreur : pas de birth, est-ce vraiment une personne?");
        return $pResult;
    }
    
    $debutBlock=rechercheDebutDoubleAccoladeOuPipe($debutBD,$pageTxt);
    if ($debutBlock === false) {
        $pResult->setErreur("erreur : pas de debut accolade block Birth");
        return $pResult;
    } 
    $finBlock=rechercheFinDoubleAccolade($debutBlock,$pageTxt);
    if ($finBlock === false) {
        $pResult->setErreur("erreur : pas de fin de block birth !!");
        return $pResult;
    } 
    $tmp = getDateFromBlock(substr($pageTxt,$debutBlock+2,$finBlock-$debutBlock-1));
    if (strlen($tmp)<1) {
        $pResult->setErreur("impossible de récuperer 3 dates birth");
            return 0;
    } else {
        $pResult->setDateNaissance($tmp);
    }
    
    // Date Deces
    if ($debutDD === false) {
        $pResult->setErreur("erreur : pas de block de deces");
        $pResult->setIsMort(0);
        return $pResult;
    }
    
    $debutBlock=rechercheDebutDoubleAccoladeOuPipe($debutDD,$pageTxt);
    if ($debutBlock === false) {
        $pResult->setErreur("erreur : pas debut accolade block deces");
        $pResult->setIsMort(0);
        return $pResult;
    }
    $finBlock=rechercheFinDoubleAccolade($debutBlock,$pageTxt);
    if ($finBlock>-1) {
        $pResult->setErreur("erreur : pas de fin de block death !!");
        $pResult->setIsMort(0);
        return $pResult;
    }
    $tmp = getDateFromBlock(substr($pageTxt,$debutBlock+2,$finBlock-$debutBlock-1));
    if (strlen($tmp)<1) {
        $pResult->setErreur("erreur : impossible de récuperer 3 dates death");
        $pResult->setIsMort(0);
        return $pResult;
    } else {
        $pResult->setDateDeces($tmp);
        $pResult->setIsMort(1);
        $pResult->calculAge();
    }
   
    
}
   
function rechercheFinDoubleAccolade($debut,$pageTxt) {
        $result = false;
        $i=$debut;
        while($result == false && $i<$debut+PARSERWIKI_TROPLONG) {
            if ($pageTxt[$i]=='}') {
                $result = $i;
            }
            $i++;
        }
        return $result;
    }
    
    
    function rechercheDebutDoubleAccoladeOuPipe($debut,$pageTxt) {
        //renvoie pos si {{ existe -1 si on tombe d'abord sur | ou trop long
        $result = false;
        $i=$debut;
        while($result == false && $i<$debut+PARSERWIKI_TROPLONG && $pageTxt[$i]!='|') {
            if ($pageTxt[$i]=='{') {
                $result = $i;
            }
            $i++;
        }
        return $result;
    }
    
    
    function getDateFromBlock($block) {
        $block = trim($block);
        $tabBlock = explode('|',$block);
        $tabResult=array();
        for($i=count($tabBlock)-1;$i>=0;$i--) {
            $nb=intval($tabBlock[$i]);
            if ($nb!=0) $tabResult[]=$nb; 
        }
        if (count($tabResult)==3) {
            return $tabResult[0]." ".$tabResult[1]." ".$tabResult[2];
        }
        if (count($tabResult)==6) {
            return $tabResult[3]." ".$tabResult[4]." ".$tabResult[5];
        }
        return '';
        
        
    }




?>