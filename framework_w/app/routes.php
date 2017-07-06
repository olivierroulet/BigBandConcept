<?php

    $w_routes = array(
    // REDIRECTION PAGE D'ACCUEIL
  
    ['GET|POST', '/', 'Default#home', 'default_home'],
    ['GET|POST', '/accueil', 'Default#home', 'accueil'],

    // REDIRECTION PAGE D'ACCUEIL
    ['GET|POST', '/formulaire_employeur', 'Clients#addEmployeur', 'form_employeur'],




    // GESTION DE LA CONNEXION, DECONNEXION, PREMIERE CONNEXION, PASSWORD OUBLIE
    ['GET|POST', '/first_login', 'Users#firstLogin', 'firstlogin'],
    ['GET|POST', '/login', 'Users#login', 'login'],
    ['GET|POST', '/forgot_password', 'Users#forgotPassword', 'forgot_password'],
    ['GET|POST', '/logout', 'Users#logout', 'logout'],

    // REDIRECTION UTILISATEUR AUTHENTIFIE EN FONCTION DE SON ROLE
    ['GET|POST', '/redirect_role', 'Users#redirectRole', 'redirectrole'],


    // INTERFACE ADMINISTRATEUR - GESTION DES UTILISATEURS
    ['GET|POST', '/gestion_des_utilisateurs', 'Users#gestionDesUtilisateurs', 'gestiondesutilisateurs'],
    ['GET|POST', '/ajouter_un_utilisateur', 'Users#ajouterUnUtilisateur', 'ajouterunutilisateur'],
    ['GET|POST', '/updater_un_utilisateur', 'Users#listerLesUtilisateurs', 'updaterunutilisateur'],
    ['GET|POST', '/lister_les_utilisateurs', 'Users#listerLesUtilisateurs', 'listerlesutilisateurs'],
        
    ['GET|POST', '/actualites', 'Actu#actuDisplay', 'Actu_Display'],
    ['GET|POST', '/actualites/update/[i:AC_Id]', 'Actu#actuUpd', 'Actu_Update'],		
    ['GET|POST', '/actualites/add', 'Actu#actuIns', 'Actu_Insert'],

    // GESTION DES ARTISTES
    ['GET|POST', '/artistes_add', 'Artistes#addArtiste', 'default_artistes'],
    ['GET|POST', '/artistes_upd', 'Artistes#updArtiste', 'upd_artistes'],

);
