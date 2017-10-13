<?php
require("module/connexion/Connexion.php");
require ("model/utilisateur/UtilisateurModel.php");
require ("module/generic/GenericSQL.php");

#test de saveOrUpdate()

/*$data = array (
      "email"=>"test@gmail.com",
      "pwd"=> md5("12345"),
      "nom"=> "wissal");

$utilisateur = new UtilisateurModel($data);
$result = $utilisateur->saveOrUpdate();

if($result == true){
	echo ("Enregistrement reussie");

}else{
	echo ("Enregistrement non reussie");
}
/*Exercice 
 1) creer le model AuteurModel.php (Table:Auteur) 
 2) creer un module nommé GenericSQl.php qui permet dexecuter une requette SQL basé sur la clause WHERE 
	en utilisant 3 parametres:
		- Table
		- Column 
		- Value 

		-genericGet($id=NULL)
		-genericDelete($id)
*/

# test du modul GenericSQL
 $data = array (
 		"table"=>"utilisateur"
 		);
 $genericsql = new GenericSQL($data);
 $resultat = $genericsql->genericGet();
 while($res = $resultat->fetch()){
 	echo " Nom utilisateur : ".$res["nom_utilisateur"]."</br>";
 }
 
 /*data = array (
  "table=>"utilisateur",column=>"id_utilisateur",value=>"3"
  );
  $genericsql = new GenericSQL($data);
  $resultat = $genericsql->genericGet();
   echo " Nom utilisateur : ".".$resultat.";

   /*

   	Exercice:
   	Créez l'action ajouter pour la vue ajouter en s'inspiration de l'action login

	-si aucun données recu dans $_POST on afficher.php
	-si on recoi des donnée dans $_POST on ajoute l'utilisateur
	dans la table et on affiche la vue liste.php
	 

   */
      
?>