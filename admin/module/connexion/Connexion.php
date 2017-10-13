<?php
# le module  connexion  permet de fournir le service getPDO()
# PDO : php Data Object

	#parametres de connexion ( chaine de connexion)
class Connexion {
	private $pdo;

	private $host = "localhost";
	private $user = "root";
	private $pwd = "";
	private $dbname ="lanouvelle_db";

	#creation du service PDO
	# le role du service: fournir l'objet PDO en cas de besoin pour se connecter a la base de donner et d'executer des requettes SQL

	public function getPDO(){
	# chaine de connexion
	# "mysql:host=localhost;dbname='lanouvelle_db','root','";
		try{
	       $this->pdo = new PDO("mysql:host={$this->host};dbname=".$this->dbname,$this->user,$this->pwd);
                            return $this->pdo;
            }catch(Exception $e){echo "Erreur PDO".$e->getMessage(); }
    }
}
?>