<?php
//le masque d'URL à associer 
// "Default#services",	//le nom du contrôleur et le nom de la méthode à appeler
// "default_services"	//le nom de cette route-ci

// LE LIEN : http://localhost/bigband/framework_w/public/artistes_add


	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'default_home'],
		['GET|POST', '/accueil', 'Default#home', 'accueil'],

	
		['GET|POST', '/formulaire_employeur', 'Clients#addEmployeur', 'form_employeur'],


		['GET|POST', '/artistes_add', 'Artistes#addArtiste', 'default_artistes'],
		['GET|POST', '/artistes_upd', 'Artistes#updArtiste', 'upd_artistes'],


		['GET|POST', '/first_login', 'Users#firstLogin', 'firstlogin'],
		['GET|POST', '/login', 'Users#login', 'login'],
		['GET|POST', '/forgot_password', 'Users#forgotPassword', 'forgot_password'],
		['GET|POST', '/logout', 'Users#logout', 'logout'],

		// redirection utilisateur connecté en fonction de son role
		['GET|POST', '/redirect_role', 'Users#redirectRole', 'redirectrole'],
/*
        ['GET|POST', '/accueil', 'Users#connect', 'users_connect'],
		['GET|POST', '/loggin', 'Users#connect', 'loggin'],*/
         ['GET|POST', '/admin', 'Default#backAdmin', 'default_admin']




);


