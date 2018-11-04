<?php
class Personne {

	private static $_instance = null;
	private $idPage;
	private $nom;
	private $dateNaissance;
	private $lieuNaissance;
	private $dateDeces;
	private $lieuDeces;
	private $photo;
	private $age;
	private $isMort;
	private $erreur;
	

	// Construction ***************************************
	public static function getInstance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new Personne();
		}
		return self::$_instance;
	}

	public function __construct() {
	}

	// Getter et Setter ***************************************
	
	public function getIdPage() {
	    return $this -> idPage;
	}
	public function setIdPage($idPage) {
	    $this -> idPage = $idPage;
	}

	public function getNom() {
	    return $this -> nom;
	}
	public function setNom($nom) {
	    $this -> nom = $nom;
	}
	
	public function getDateNaissance() {
	    return $this -> dateNaissance;
	}
	public function setDateNaissance($dateNaissance) {
	    $this -> dateNaissance = $dateNaissance;
	}
	
	public function getLieuNaissance() {
	    return $this -> lieuNaissance;
	}
	public function setLieuNaissance($lieuNaissance) {
	    $this -> lieuNaissance = $lieuNaissance;
	}
	
	public function getDateDeces() {
	    return $this -> dateDeces;
	}
	public function setDateDeces($dateDeces) {
	    $this -> dateDeces = $dateDeces;
	}
	
	public function getDLieuDeces() {
	    return $this -> dateDeces;
	}
	public function setLieuDeces($lieuDeces) {
	    $this -> lieuDeces = $lieuDeces;
	}
	
	public function getPhoto() {
	    return $this -> photo;
	}
	public function setPhoto($photo) {
	    $this -> photo = $photo;
	}
	
	public function getAge() {
	    return $this -> age;
	}
	public function setAge($age) {
	    $this -> age = $age;
	}
	
	public function getIsMort() {
	    return $this -> photo;
	}
	public function setIsMort($isMort) {
	    $this -> isMort = $isMort;
	}
	
	public function getErreur() {
	    return $this -> erreur;
	}
	public function setErreur($erreur) {
	    $this -> erreur = $erreur;
	}
	
	public function getArray() {
	    $tab=array();
	    $tab['idPage']=$this->idPage;
	    $tab['nom']=$this->nom;
	    $tab['dateNaissance']=$this->dateNaissance;
	    $tab['lieuNaissance']=$this->lieuNaissance;
	    $tab['dateDeces']=$this->dateDeces;
	    $tab['lieuDeces']=$this->lieuDeces;
	    $tab['photo']=$this->photo;
	    $tab['age']=$this->age;
	    $tab['isMort']=$this->isMort;
	    $tab['erreur']=$this->erreur;
	    
	    return $tab;
	    
	}



	
	public function calculAge() {
	    /*
	    try {
	        if (dateDeces!=null)
	            age = Integer.parseInt(dateDeces.split(" ")[2]) -  Integer.parseInt(dateNaissance.split(" ")[2]);
	            else age  = 2018 -  Integer.parseInt(dateNaissance.split(" ")[2]);
	    } catch (Exception e) {
	        age=-1;
	    }*/
	    $this->age=0;
	}
   

}
?>