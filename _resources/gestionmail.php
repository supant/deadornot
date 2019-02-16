<?php
    require_once("requetes.php");
    
    function sendMail($idCreneau,$sPrenomUser,$sMailUser,$idResa){ //TODO
    	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		//$to=$sMailUser;
		$to=$sMailUser;
		$subject=SUJET_MAIL;
		$headers  = 'MIME-Version: 1.0' . "\r\n";
     	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From:noreply@site7.org';
		
		
		$messageMail='';

		mail($to,$subject,$messageMail,$headers);
		return $messageHTML;
		
    }
	
	
?>