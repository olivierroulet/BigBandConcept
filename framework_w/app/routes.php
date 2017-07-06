<?php
<<<<<<< HEAD

// le masque d'URL à associer 
// "Default#services",	//le nom du contrôleur et le nom de la méthode à appeler
// "default_services"	//le nom de cette route-ci
=======
//le masque d'URL à associer 
	// "Default#services",	//le nom du contrôleur et le nom de la méthode à appeler
			// "default_services"	//le nom de cette route-ci
>>>>>>> 399341fc8e1f2b1fcaa84e239222e8218e8d7423

// 		 URI 		  contrôleur/Méthode 		Route 
// le # remplace le mot réservé 'Controller'
	$w_routes = array(

		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/artistes_add', 'Artistes#addArtiste', 'default_artistes'],
		['GET|POST', '/artistes_upd', 'Artistes#updArtiste', 'upd_artistes'],
		['GET|POST', '/login', 'Users#login', 'users_login'],
		
		['GET|POST', '/actualites', 'Actu#actuDisplay', 'Actu_Display'],
		['GET|POST', '/actualites/update/[i:AC_Id]', 'Actu#actuUpd', 'Actu_Update'],		
		['GET|POST', '/actualites/add', 'Actu#actuIns', 'Actu_Insert'],
	);
// 1- email envoyé par l' artiste. collé dans la table users par l' admin ==> email à l' artiste
// 2- ecran users : l' utilisateur s' enregistre -> écran addArtiste, on checke l' email. Si pas d' email dans users, la personne ne peut pas ouvrir addArtiste.

<<<<<<< HEAD
	$w_routes = array(
		// REDIRECTION PAGE D'ACCUEIL
=======
>>>>>>> 399341fc8e1f2b1fcaa84e239222e8218e8d7423
		['GET|POST', '/', 'Default#home', 'default_home'],
		['GET|POST', '/accueil', 'Default#home', 'accueil'],

		// REDIRECTION PAGE D'ACCUEIL
		['GET|POST', '/formulaire_employeur', 'Clients#addEmployeur', 'form_employeur'],

		// GESTION DES ARTISTES
		['GET|POST', '/artistes_add', 'Artistes#addArtiste', 'default_artistes'],
		['GET|POST', '/artistes_upd', 'Artistes#updArtiste', 'upd_artistes'],

		// GESTION DE LA CONNEXION, DECONNEXION, PREMIERE CONNEXION, PASSWORD OUBLIE
		['GET|POST', '/first_login', 'Users#firstLogin', 'firstlogin'],
		['GET|POST', '/login', 'Users#login', 'login'],
		['GET|POST', '/forgot_password', 'Users#forgotPassword', 'forgot_password'],
		['GET|POST', '/logout', 'Users#logout', 'logout'],

		// REDIRECTION UTILISATEUR AUTHENTIFIE EN FONCTION DE SON ROLE
		['GET|POST', '/redirect_role', 'Users#redirectRole', 'redirectrole'],

<<<<<<< HEAD
		// INTERFACE ADMINISTRATEUR - GESTION DES UTILISATEURS
		['GET|POST', '/gestion_des_utilisateurs', 'Users#gestionDesUtilisateurs', 'gestiondesutilisateurs'],
		['GET|POST', '/ajouter_un_utilisateur', 'Users#ajouterUnUtilisateur', 'ajouterunutilisateur'],
		['GET|POST', '/updater_un_utilisateur', 'Users#listerLesUtilisateurs', 'updaterunutilisateur'],
		['GET|POST', '/lister_les_utilisateurs', 'Users#listerLesUtilisateurs', 'listerlesutilisateurs'],

);


=======
/*
Exemple donné par Axel ce 2017-07-5 17h00
<?php // View 
    foreach($events as $event){
        
        echo $event['title'];        echo '<a href="'.$this->url('update_event', ['id' => $event['id']]).'">Modifier</a>';
        // update_event correspond au nom de la ROUTE 
    }/events/update/4// Controllerpublic update($id)
{
    if(is_numeric($id)){
        $this->showNotFound();
    }

}// Route
['GET', '/events/update/[i:id]', 'Event#update', 'update_event'],
*/
>>>>>>> 399341fc8e1f2b1fcaa84e239222e8218e8d7423
