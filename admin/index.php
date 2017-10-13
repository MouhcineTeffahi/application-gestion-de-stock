<?php

	/*la page index en MVC est le fichier de routage principale qui permet de filtrer 
	l URL pour definir le controlleur et l'action demande*/


	/*etape 1: definition du chemin absolue du chemin relatif 
	et le chemin pour les sources internes a travers des constantes*/

	# chemin absolue ROOT: C:/wamp64/www/nomduprojet/index.php    ou    c:/xamp/htdocs/nomduprojet/index.php
	# ROOT est utilisé pour le chargement des fichiers
	#str_replace('valeur a modifier','avec quoi la modifier','la source')
	 define("ROOT",str_replace('index.php','',$_SERVER["SCRIPT_FILENAME"]));


	# chemin absolue WEBROOT: nomduprojet/index.php  (WEBROOT est utilisé pour la navigartion et la definition des URL)
	define("WEBROOT",str_replace('index.php','',$_SERVER["SCRIPT_NAME"]));

	#chemin pour la chargement des URI
	define('SOURCE_CONTEXT','http://localhost/ecommerce_MVC');

	#test:
	//echo("chemin ROOT: ".ROOT."<br/>");
	//echo("chemin WEBROOT: ".WEBROOT."<br/>");


	#etape 2: chargement des modules
	require(ROOT."module/connexion/Connexion.php");
	require(ROOT."module/generic/GenericSQL.php");
	require(ROOT."module/generic/GenericController.php");

	#etape3 :traitement des parametres controller et action + excecution du controller et action + affichage des vues
	# lafichage des vues se fait a l'interieur de la page index (monopage multivues)

	#reecuperation du parametre GET["p"] definie dans le .htaccess

	$p = $_GET["p"];
	#$p="Controller/action"
	$args = array();
	$args = explode("/",$p);

	#test:
	//echo ("Controller: ".$args[0]." Action: ".$args[1]);

	#definition d'un controleur et d'une action par defaut
	$controller = (isset($args[0]) && !empty($args[0]))?$args[0]:"Utilisateur";
	$action = (isset($args[1]) && !empty($args[1]))?$args[1]:"login";
	//URL par defaut:Utilisateur/login

	#test:
	//echo ("Controller: ".$controller." Action: ".$action);
	#Importation ou inclusion du controller demandé 

	require(ROOT."controller/".$controller.".php");

	#require (ROOT."controller/Utilisateur.php");
	#instancier le controller importé qui été demandé dans L'URL
	#Utilisateur =new Utilisateur();
	$controller=new $controller();
	#$controller->liste();

	#vérification de l'existance de l'action a l'intérieur du controller
	if(method_exists($controller, $action)){
		#l'action existe
		#dans le tableau args il faut supprimer le controller et l'action =args[0] et args[1] pour ne garder que la case qui conteint l'ID

		#L'exemple :Utilisateur/delete/12=$utilisateur->delete(12)
		unset($args[0]);#suppression du controller 
		unset($args[1]);#suppression du L'action
		#utlisé unset parceque déja utilisé

		#call_user_func_array() permet d'appler une function a l'intérieur d'une class et lui transmettre un tableau de paramétre 
		#call_user_func_array(array(class,fonction),les paramétres);
		#call_user_func_array(array(ou se trouve la fonction ,la fonction a qui on envoi les params),les param a envoyer);
		#si le paramétre ID est NULL il ne sera envoyé a la fonction
		call_user_func_array(array($controller,$action), $args); 

	}else {
		echo "Erreur 404: NOT FOUND";
	}




?>
