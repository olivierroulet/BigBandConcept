<?php


//le masque d'URL à associer 
// "Default#services",	//le nom du contrôleur et le nom de la méthode à appeler
// "default_services"	//le nom de cette route-ci
// URI 		  contrôleur/Méthode 		Route 
// le # remplace le mot réservé 'Controller'

$w_routes = array(
		// REDIRECTION PAGE D'ACCUEIL

	['GET|POST', '/', 'Default#home', 'default_home'],
	['GET|POST', '/accueil', 'Default#home', 'accueil'],

		// TRAITEMENT DU FORMULAIRE EMPLOYEUR

	['GET|POST', '/formulaire_employeur', 'Clients#addEmployeur', 'form_employeur'],

		// GESTION DES ARTISTES
	['GET|POST', '/artistes_add', 'Artistes#addArtiste', 'default_artistes'],
	['GET|POST', '/artistes_upd', 'Artistes#updArtiste', 'upd_artistes'],

		// GESTION DE LA CONNEXION, DECONNEXION, PREMIERE CONNEXION, PASSWORD OUBLIE
	['GET|POST', '/first_login', 'Users#firstLogin', 'firstlogin'],
	['GET|POST', '/login', 'Users#login', 'login'],
	['GET|POST', '/forgot_password', 'Users#forgotPassword', 'forgot_password'],
	['GET|POST', '/logout', 'Users#logout', 'logout'],

		// GESTION DES ACTUALITES
    ['GET|POST', '/actualites', 'Actu#actuDisplay', 'Actu_Display'],
    ['GET|POST', '/actualitesupdate/[i:AC_Id]', 'Actu#actuUpd', 'Actu_Update'],		
    ['GET|POST', '/actualitesadd', 'Actu#actuIns', 'Actu_Add'],

		// REDIRECTION UTILISATEUR AUTHENTIFIE EN FONCTION DE SON ROLE
	['GET|POST', '/redirect_role', 'Users#redirectRole', 'redirectrole'],

		// GESTION DES ACTUALITES
/*	['GET|POST', '/actualites', 'Actu#actuDisplay', 'Actu_Display'],
	['GET|POST', '/actualites/update/[i:AC_Id]', 'Actu#actuUpd', 'Actu_Update'],		
	['GET|POST', '/actualites/add', 'Actu#actuIns', 'Actu_Insert'],
*/
		// INTERFACE ADMINISTRATEUR - ACCUEIL	
		['GET|POST', '/administrateur_accueil', 'Admin#compteRendu', 'administrateuraccueil'],
		
		// INTERFACE ADMINISTRATEUR - GESTION DES UTILISATEURS
	['GET|POST', '/gestion_des_utilisateurs', 'Users#gestionDesUtilisateurs', 'gestiondesutilisateurs'],
	['GET|POST', '/ajouter_un_utilisateur', 'Users#ajouterUnUtilisateur', 'ajouterunutilisateur'],
	['GET|POST', '/updater_un_utilisateur', 'Users#listerLesUtilisateurs', 'updaterunutilisateur'],
	['GET|POST', '/lister_les_utilisateurs', 'Users#listerLesUtilisateurs', 'listerlesutilisateurs'],
	['GET|POST', '/rechercher_un_utilisateur', 'Users#rechercherUnUtilisateur', 'rechercherunutilisateur'],

	);


  