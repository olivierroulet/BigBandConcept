<?php
//le masque d'URL à associer 
	// "Default#services",	//le nom du contrôleur et le nom de la méthode à appeler
			// "default_services"	//le nom de cette route-ci

// LE LIEN : http://localhost/bigband/framework_w/public/artistes_add

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],

		['GET|POST', '/formulaire_employeur', 'Employeurs#addEmployeur', 'form_employeur'],

		['GET|POST', '/artistes_add', 'Artistes#addArtiste', 'default_artistes'],
		['GET|POST', '/artistes_upd', 'Artistes#updArtiste', 'upd_artistes'],

		['GET|POST', '/accueil', 'Users#connect', 'users_connect'],

	);


