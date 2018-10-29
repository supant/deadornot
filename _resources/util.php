<?php
function getUserInfo($user, &$id_user, &$loginHeader, &$isProf, &$isPerma, &$isAdmin, &$voirresa, &$hasAnnulation, &$photo){ //TODO
	$id_user = $user -> getidUtilisateur();
	$isProf = $user -> getIsPersonnel();
	$isPerma = isPermanent($id_user);
	$loginHeader = $user -> getsMail();
	$isAdmin = $user->getbAdmin();
	$resa = getResaUser($id_user);
	
	if(empty($resa)) $voirresa=0;
	else $voirresa=1;
	
	$resaToCancelNP=getResaToCancelNonPerma($id_user);
	$resaToCancelP=getResaToCancelPerma($id_user);
	
	if(empty($resaToCancelNP) && empty($resaToCancelP)) $hasAnnulation=0;
	else $hasAnnulation=1;
	
	$photo = loadImageBase($id_user);
	
}




?>