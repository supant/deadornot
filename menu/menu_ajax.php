<?php
require_once ("./../_resources/appelAllClasses.php");
session_start();

// Vérification que l'utilisateur existe
if (!isset($_SESSION['user'])) {
	header("Location: " . PAGE_SITE_ROOT);
} else {
	$user = $_SESSION['user'];
	$id_user = $user -> getIdUtilisateur();
	
	if ($_POST['action'] == MENU_BOUTON_REPONDRE_VALUE) {
		$_SESSION['idEvenement'] = $_POST['idEvenementRepondre'];
		$idEvent = $_POST['idEvenementRepondre'];
		if (getGroupeFromMenu($idEvent, $id_user) == GROUPE_ENCADRANT && getStatutFromEvenemen($idEvent)==STATUT_ENCADRANT) {
			echo(json_encode(array(RETOUR_OK, PAGE_CALENDRIER)));
		} else if (getGroupeFromMenu($idEvent, $id_user) == GROUPE_INVITE && getStatutFromEvenemen($idEvent)==STATUT_INVITE) {
					echo(json_encode(array(RETOUR_OK, PAGE_CALENDRIER_INVITE)));
				} else {
					unset ($_SESSION['idEvenement']);
					echo(json_encode(array(RETOUR_ALERT, ERR_NON_AUTORISE)));
				}
	}

	if ($_POST['action'] == MENU_BOUTON_MODIFIER_EVENEMENT_VALUE) {
		if ( isAdminFromEvt($_POST['idEveAModifier'],$id_user) || $user-> getIsAdmin()==TRUE) {
			$_SESSION['idEvenement'] = $_POST['idEveAModifier'];
			$_SESSION['numeroGroupe'] = GROUPE_ENCADRANT;
			echo(json_encode(array(RETOUR_OK, PAGE_CREER_GROUPES)));
		} else {
			echo(json_encode(array(RETOUR_ALERT, ERR_NON_AUTORISE)));
		}
		
	}

	if ($_POST['action'] == MENU_BOUTON_VOIR_REPONSES_ADMIN_VALUE) {
		if ( isAdminFromEvt($_POST['idEvenementVoir'],$id_user) || $user-> getIsAdmin()==TRUE) {
			$_SESSION['idEvenement'] = $_POST['idEvenementVoir'];
			echo(json_encode(array(RETOUR_OK, PAGE_SUIVRE_EVENEMENT)));
		}else {
			echo(json_encode(array(RETOUR_ALERT, ERR_NON_AUTORISE)));
		}
	}
	
	if ($_POST['action'] == MENU_BOUTON_SUPPRIMER_EVENEMENT_VALUE) {
		if ( isAdminFromEvt($_POST['idEvenementDelete'],$id_user) || $user-> getIsAdmin()==TRUE) {
			//$idEvenementDelete=$_POST['idEvenementDelete'];
			//viderGroupe($idEvenementDelete);
			//viderCreneau($idEvenementDelete);
			//deleteEvenement($idEvenementDelete);
			updateStatut($_POST['idEvenementDelete'], STATUT_ARCHIVE);
			echo(json_encode(array(RETOUR_OK, PAGE_MENU)));		
		}else {
			echo(json_encode(array(RETOUR_ALERT, ERR_NON_AUTORISE)));
		}
	}
	
}
?>