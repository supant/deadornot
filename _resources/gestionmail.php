<?php
    require_once("requetes.php");
    
    function sendMail($idCreneau,$sPrenomUser,$sMailUser,$idResa){ //TODO
    	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		//$to=$sMailUser;
		$to=$sMailUser;
		$subject=SUJET_MAIL;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
     	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From:noreply@ecam.fr';
		
		
		$tabCreneaux=getUnCreneau(TYPE_OBJET_PLACE,$idCreneau);
		$nomCreneau=constant($tabCreneaux[0]['sNom']);
		
		$tableauInfoMail=getInfoForMail($idResa);
		$line=$tableauInfoMail[0];
		$jour=$line[0];
		$iNumeroPlace=$line[1];
		$jourFrench = DateTime::createFromFormat('Y-m-d', $jour);
		$jourFrench = $jourFrench -> format('d/m/Y');
		
		
		$messageHTML = sprintf(MESSAGE_MAIL, $sPrenomUser, $jourFrench, $nomCreneau, $iNumeroPlace, $iNumeroPlace);
		$messageMail=$messageHTML.SIGNATURE_MAIL;

		mail($to,$subject,$messageMail,$headers);
		return $messageHTML;
		
    }
	
	
?>