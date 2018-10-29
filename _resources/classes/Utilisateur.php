<?php
class Utilisateur {
	private static $_instance = null;
	private $idUtilisateur;
	private $nom;
	private $prenom;
	private $email;
	private $isPersonnel;
	private $isAdmin;
	private $login;
	private $image;

	// Construction ***************************************
	public static function getInstance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new Utilisateur();
		}
		return self::$_instance;
	}

	public function __construct() {
	}

	// Getter et Setter ***************************************
	
	
	
	public function getidUtilisateur() {
		return $this -> idUtilisateur;
	}

	public function setidUtilisateur($idUtilisateur) {
		$this -> idUtilisateur = $idUtilisateur;
	}

	public function getNom() {
		return $this -> nom;
	}

	public function setNom($nom) {
		$this -> nom = $nom;
	}

	public function getPrenom() {
		return $this -> prenom;
	}

	public function setPrenom($prenom) {
		$this -> prenom = $prenom;
	}

	public function getEmail() {
		return $this -> email;
	}

	public function setEmail($email) {
		$this -> email = $email;
	}

	public function getIsPersonnel() {
		return $this -> $isPersonnel;
	}

	public function setIsPersonnel($isPersonnel) {
		$this -> isPersonnel = $isPersonnel;
	}

	public function getIsAdmin() {
		return $this -> isAdmin;
	}

	public function setIsAdmin($isAdmin) {
		$this -> isAdmin = $isAdmin;
	}
	
	public function getLogin() {
		return $this -> login;
	}

	public function setLogin($login) {
		$this -> login = $login;
	}
	public function getImage() {
		return $this -> image;
	}

	public function setImage($image) {
		$this -> image = $image;
	}

	
	public function charger($idUtilisateurACharger) {
        $connexion = connexion::getInstance() -> connect();
        if (is_numeric($idUtilisateurACharger)) {
            $sqlChargerUtilisateur = "SELECT * FROM Utilisateur WHERE idUtilisateur = '$idUtilisateurACharger'";
        } else {
            $sqlChargerUtilisateur = "SELECT * FROM Utilisateur WHERE login LIKE '$idUtilisateurACharger'";
        }
		
        // test existence
        $stmt = $connexion -> prepare($sqlChargerUtilisateur);
        if ($stmt -> execute()) {
            if ($tab = $stmt -> fetch()) {
            	
                $this -> idUtilisateur = $tab['idUtilisateur'];
                $this -> nom = $tab['nom'];
                $this -> prenom = $tab['prenom'];
                $this -> email = $tab['email'];
                $this -> isPersonnel = $tab['isPersonnel'];
				$this -> isAdmin = $tab['isAdmin'];
				$this -> login = $tab['login'];
				$this -> image = null;
                return $this;
            } else {
                return null;
            }
        }
        return null;
    }

 	public function sauvegarder() {
       	$connexion = connexion::getInstance() -> connect();
        $sqlTestExistUtilisateur = 'SELECT idUtilisateur FROM Utilisateur WHERE login = "'.$this->login.'"';
        $reponse = $connexion -> query($sqlTestExistUtilisateur);
		//print_r($reponse);
		
        if ($tabResult = $reponse -> fetch()) {
        	//Update
       		$idUtilisateur =$tabResult['idUtilisateur'];
            $sqlUpdateUtilisateur = 'UPDATE Utilisateur SET nom = "'.$this -> nom.
            '", prenom = "'.$this -> prenom.'", email = "'.$this -> email.
            '", isPersonnel = "'.$this -> isPersonnel.
            '", login = "'.$this -> login.
            '" WHERE idUtilisateur = "'.$idUtilisateur.'"';  
            $connexion->query($sqlUpdateUtilisateur);
        } else {
            // Insert
            $sqlAjoutUtilisateur = 'INSERT INTO Utilisateur (nom, prenom, email, isPersonnel, isAdmin, login) VALUES
             ("'.$this -> nom.'", "'.$this -> prenom.'","'.$this -> email.'",
             "'.$this -> isPersonnel.'","'.$this -> isAdmin.'","'.$this -> login.'")';
           	$connexion->query($sqlAjoutUtilisateur);
			$this->idUtilisateur=$connexion->lastInsertId();
            //print_r($sqlAjoutUtilisateur);
            // Ajout de l'image et suppression
            if ($this->image !=null) {
            	savImageBase($this);
				$this->image=null;
			}
        }
		

    }
   

}
?>