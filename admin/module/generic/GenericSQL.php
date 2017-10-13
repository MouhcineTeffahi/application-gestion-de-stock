<?php
/*
2) creer un module nommé GenericSQl.php qui permet dexecuter une requette SQL basé sur la clause WHERE 
    en utilisant 3 parametres:
        - Table
        - Column 
        - Value 

        -genericGet($id=NULL)
        -genericDelete($id)
*/
 #la creation des classe est de la conception et non pas de la programmation
 Class GenericSQL extends Connexion{
 	
 	private $table;
 	private $column;
 	private $value;

public function __construct($data=NULL){

        $this->table =$data["table"];
        $this->column =(isset($data["column"]))?$data["column"]:NULL;
    	$this->value =(isset($data["value"]))?$data["value"]:NULL;

    }

    public  function genericGet(){
 		if(is_null($this->column) || is_null($this->value)){
 		#recuperation globale
 		$sql="
 		SELECT * FROM {$this->table}
 		";
 	    }else{
 		#recuperation unique
 		$sql="
 		SELECT * FROM {$this->table}
 		WHERE {$this->column}={$this->value}
 		";

 	    }
 	  try {
    		$query_result = $this->getPDO()->query($sql);
    		return $query_result;
    	}catch(Exception $e){
    		echo "Erreur SQL ".$e->getMessage();
    	}
    }

 	public function genericDelete(){

        $sql="
 		DELETE * FROM {$this->table}
 		WHERE ".$this->column." ='".$this.value."'
 		";
        $query_result = $this->getPDO()->query($sql);
    	return $query_result;
    	try {
    		  $query_result = $this->getPDO()->query($sql);
    		  return $query_result;
    	    
            }catch(Exception $e){
    		echo "Erreur SQL ".$e->getMessage();
    	}
    }
}


?>
