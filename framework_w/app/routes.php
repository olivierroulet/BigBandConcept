<?php



//le masque d'URL à associer 
// "Default#services",    //le nom du contrôleur et le nom de la méthode à appeler
// "default_services"    //le nom de cette route-ci
// URI           contrôleur/Méthode         Route 
// le # remplace le mot réservé 'Controller'
// fin des commentaires d' entête 

$w_routes = array(

         // REDIRECTION PAGE D'ACCUEIL    
    ['GET|POST', '/', 'Default#home', 'default_home'],
    ['GET|POST', '/accueil', 'Default#home', 'accueil'],        
    // TRAITEMENT DU FORMULAIRE EMPLOYEUR    
    ['GET|POST', '/formulaire_employeur', 'Clients#addEmployeur', 'form_employeur'],  
    // GESTION DES ARTISTES
    ['GET|POST', '/artistes_add', 'Artistes#addArtiste', 'default_artistes'],
    ['GET|POST', '/artiste_upd/[i:AR_Idartiste]', 'Artistes#updArtiste', 'upd_artistes'],        
    ['GET|POST', '/artistes_view', 'Artistes#viewArtiste', 'view_artistes'],  
    ['GET|POST', '/artistes_view/[i:AR_Idartiste]', 'Artistes#deactArtiste', 'deact_artistes'],

    // GESTION DE LA PREMIERE CONNEXION, CONNEXION, PASSWORD OUBLIE, RESET PASSWORD, DECONNEXION
    ['GET|POST', '/firstlogin', 'Users#firstLogin', 'firstlogin'],
    ['GET|POST', '/login', 'Users#login', 'login'],
    ['GET|POST', '/forgotpassword', 'Users#forgotPassword', 'forgotpassword'],
    ['GET|POST', '/login/resetpasswd', 'Users#resetPasswd', 'resetpasswd'],
    ['GET|POST', '/logout', 'Users#logout', 'logout'],  
      
    // GESTION DES ACTUALITES
    ['GET|POST', '/actu', 'Actu#actuDisplay', 'Actu_Display'],
    ['GET|POST', '/actu_upd[i:AC_Id]', 'Actu#actuUpd', 'Actu_Update'],        
    ['GET|POST', '/actu[i:AC_Id]', 'Actu#actuDeact', 'Actu_Deact'],          
    ['GET|POST', '/actuadd', 'Actu#actuIns', 'Actu_Add'],      

    // REDIRECTION UTILISATEUR AUTHENTIFIE EN FONCTION DE SON ROLE
    ['GET|POST', '/redirect_role', 'Users#redirectRole', 'redirectrole'],        

    #############################
    ## SECTION ADMINISTRATEUR  ##
    #############################
    // INTERFACE ADMINISTRATEUR - ACCUEIL    
    ['GET|POST', '/administrateur_accueil', 'Admin#compteRendu', 'administrateuraccueil'],

        // INTERFACE ADMINISTRATEUR - GESTION DES UTILISATEURS
    ['GET|POST', '/gestion_des_utilisateurs', 'Users#gestionDesUtilisateurs', 'gestiondesutilisateurs'],
    ['GET|POST', '/ajouter_un_utilisateur', 'Users#ajouterUnUtilisateur', 'ajouterunutilisateur'],
    ['GET|POST', '/updater_un_utilisateur', 'Users#formulaireUpdate', 'updaterunutilisateur'],
    ['GET|POST', '/lister_les_utilisateurs', 'Users#listerLesUtilisateurs', 'listerlesutilisateurs'],
    ['GET|POST', '/supprimer_un_utilisateur', 'Users#supprimerUnUtilisateur', 'supprimerunutilisateur'],

    ['GET|POST', '/rechercher_un_utilisateur', 'Users#rechercherUnUtilisateur', 'rechercherunutilisateur'],
    
    // INTERFACE ADMINISTRATEUR - GESTION DES Employeurs
    ['GET|POST', '/lister_tous_les_employeurs', 'Clients#listerTousLesEmployeurs', 'listertouslesemployeurs'],
    ['GET|POST', '/employeur_suivant', 'Clients#employeurSuivant', 'employeursuivant'],
    ['GET|POST', '/employeur_precedent', 'Clients#employeurPrecedent', 'employeurprecedent'],

        // INTERFACE ADMINISTRATEUR - GESTION DES DEVIS
    ['GET|POST', '/lister_tous_les_devis', 'Devis#listerTousLesDevis', 'listertouslesdevis'],
    ['GET|POST', '/updater_le_devis', 'Devis#updaterLeDevis', 'updaterledevis'],   
    
        // Info groupe et update
    ['GET|POST', '/info_groupe', 'Groupe#listeInfoGroupe', 'infogroupe'],
    ['GET|POST', '/update_info_groupe', 'Groupe#updateInfoGroupe', 'updateinfogroupe'],


    );


