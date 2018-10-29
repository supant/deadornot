<?php


class connexion{
	private $dbhost = DB_HOST;
    private $dbuser = DB_USER;
    private $dbpassword = DB_PASSWORD;
    private $dbname = DB_DATABASE;
	private $PDO=null;
	
	private static $_instance = null;
	
	function __construct(){	
	}
	
	public function getInstance(){
		
		if (is_null(self::$_instance)){
			self::$_instance = new connexion();
			
		}
		return self::$_instance;
	}
	
	public function connect(){
		$this->PDO=null;
		if($this->PDO==null){
			try{
				$this->PDO =new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this -> dbuser, $this -> dbpassword,array(PDO::ATTR_PERSISTENT => true));
				//$bdd=new PDO('mysql:host=172.26.0.113:3306;dbname=ats_18;charset=utf8', 'ats_18', 'OLuve10',array(PDO::ATTR_PERSISTENT => true));
			} catch(Exception $e){
				echo $e -> getMessage();
			}
		}
		return $this->PDO;
	}
	public function disconnect(){
		$this->PDO=null;
	}
	
	
}


?>