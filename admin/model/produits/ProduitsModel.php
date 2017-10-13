<?php
# representation logique de la table  utilisateur
#contenant l'ensemble des methodes PDU
# le model hérita le module connexion afin d'utilisation le service getPDU(); dans toutes les requettes

class ProduitsModel extends Connexion {
	#structure
	private $table ="produits";
	public $id;
    public $nom;

    #reference vers les noms reelles des colonnes de la table utilisateur: DATA-MAPPING
    public $idcol = "id_produit";
    public $nomcol ="nom_produit";


    public function __construct($data=NULL){
    	$this->nom =$data["nom"];


    }

 public function get($id=NULL){
 	if(is_null($id)){
 		#recuperation globale
 		$sql="
 		SELECT * FROM {$this->table}
 		";
 	}else{
 		#recuperation unique
 		$sql="
 		SELECT * FROM {$this->table}
 		WHERE {$this->idcol}='".$id."'
 		";

 	}
 	try {
    		$query_result = $this->getPDO()->query($sql);
    		return $query_result;
    	}catch(Exception $e){
    		echo "Erreur SQL ".$e->getMessage();
    	}
    }
    public function find($column,$value){
   	#recuperation unique via une clause
 		$sql="
 		SELECT * FROM {$this->table}
 		WHERE ".$column."='".$value."'
 		";
 		try {
    		$query_result = $this->getPDO()->query($sql);
    		return $query_result;
    	}catch(Exception $e){
    		echo "Erreur SQL ".$e->getMessage();

   }
 }




}
?>