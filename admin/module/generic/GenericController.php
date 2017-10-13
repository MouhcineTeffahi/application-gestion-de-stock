<?php
        #le module GenericController représent  la source des fonctions utilisées par tous les controllers du fremwork a travers un héritage 
	class GenericController {
		#cette class nous fournis 2 méthodes essentiels pour tous les controllers
		#préparation des données : prepareData()
		#Affichage de la vue : viewRender()
		private $data=array();
		public $layout="default"; 
		#si on souhaite utiliser un layout on dois activer la ligne suivant:
		//public $layout =false;

		public function prepareData($data_recu){
			#array_merg verfie les types des varibale s'ils sont type array et crée une copie d'une premier tableau vers le deuxiéme.
			#$this->data est un tableau vide il peut accepter la structure de $data_recu pour créer une fusion
			#donc le contenu de $data_recu ainsi que sa  structure seront affecté a la variable $this->data
			$this->data=array_merge($this->data,$data_recu);

		} 
		public function viewRender($view){
			#Role de viewRender:
			#1-Prendre en concidération les données préparés pour les injecter dans la vue 
			#2-Utiliser la layout définie,default ou autre,ou sans layout 
			#3-afficher

			#technique de l'extraction de donnée d'un tableau
			extract($this->data);
			#nous recevons:$data['liste_user["nom_utilisateur"]](2 dimensions);
			#nous devons obtiner liste_user["nom_utilisateur"];(1 dimension);

			#stocker en mémoire tempon HTTP
			#stocker $this->data les données dans le ob_strat 
			ob_start(); #output buffering va stocker le tableau de données extracté pa la fonction extract() temporairement pour l'utiliser dans la vue 

			#intégration de la vue 
			require(ROOT."view/".get_class($this)."/".$view.".php");
			#require(ROOT."view/Utilisateur/afficher.php");

			$content=ob_get_clean();
			#ob_get_clean() récuper les données stocké en mémoire tempon et efface le tempon juste aprés

			#utilisation du layout
			if($this->layout!=false)
			{
				require(ROOT."view/layout/".$this->layout.".php");

			}
			else
			{
				#affichage des données sans layout en utilisant seulement le contenu de la vue
				echo $content;

			}
		}

	}

?>