//categorie = le type de formulaire à valider
//form = l'objet formulaire à valider
function validate(categorie,form){
	// la variable rapport va contenir l'ensemble des erreur
	//detecté et à afficher à l'utilisateur
	var rapport = "";

	//verification de la catégorie du formulaire afin d'appeler 
	//l'objet form
	if(categorie == "article"){

		if(form.titre.value == "") 
			rapport += "Veillez indiquer un titre<br/>";
		if(form.contenu.value == "")
			rapport += "Veillez saisir un contenu<br/>";
		if(form.categorie.selectedIndex == false)
			rapport += "Veuillez selectionner une catégorie<br/>";
		if(form.auteur.selectedIndex == false)
			rapport += "Veuillez selectionner un auteur<br/>";
		if(form.image.value == "")
			rapport += "Veuillez selectionner une image <br/>";
	}else{
		alert("La catégorie du formulaire n'est pas reconnu");
	}

	//verification du rapport d'erreur
	if(rapport != ""){
		//le rapport d'erreur n'est pas vide donc nous allons 
		//afficher les erreurs
		document.getElementById("erreur").innerHTML = rapport;
	}else{
		form.submit();
	}
}