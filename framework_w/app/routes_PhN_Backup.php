<?php
//le masque d'URL à associer 
	// "Default#services",	//le nom du contrôleur et le nom de la méthode à appeler
			// "default_services"	//le nom de cette route-ci

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