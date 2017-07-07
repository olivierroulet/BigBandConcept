<?php

namespace Controller;

use \W\Controller\Controller;
use Model\ClientsModel as Employeurs;
use Model\DevisModel as Devis;
//use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \W\Security\AuthorizationModel;
use Respect\Validation\Validator as v;
use \Model\ActuModel;

// Cf http://respect.github.io/Validation/docs/date.html

// 1- on affiche la table Actu en mode liste, avec 2 boutons Modif et Suppression (suppression logique seulement)
// 2- si le lecteur n'est pas habilité, les boutons sont inactifs (class="disabled")

class AdminController extends \W\Controller\Controller
{
    public function compteRendu()
    {
        $me = $this->getUser(); // utilisateur connecté
        
        // Limite l'accès à la page à un utilisateur connecté
        
        ///////// VERIFICATION DE LA CONNEXION
        if(empty($me)){
            $this->redirectToRoute('default_home');// retour a l'accueil du site
        } 
        //////// AUTORISE QUE POUR ADMINISTRATEUR
        $roleUser=$me['US_idURole'];
        if ($roleUser !=1) {
            $this->redirectToRoute('redirectrole'); // erreur de role on redirige vers la page autorisée
        }
        //////// FIN DES VERIFICATION D'USAGE

        //////// SCRIPT DE COMPTE RENDU DE LA BDD
        
        //Nb d'employeurs
        $employeur = new Employeurs();
        $employeurs=$employeur->findAll();
        $nbEmployeurs=count($employeurs);

        //Nb de devis a faire
        $devis = new Devis();
        $devisAFaire=$devis->findAllWithStatut('a faire');
        $nbDevisAFaire=count($devisAFaire);

        //Nb de devis en attente
        $devis = new Devis();
        $devisEnAttente=$devis->findAllWithStatut('en attente');
        $nbDevisEnAttente=count($devisEnAttente);


        $params = [
        'nbEmployeurs'=> $nbEmployeurs,
        'nbDevisAFaire'=> $nbDevisAFaire,
        'nbDevisEnAttente'=> $nbDevisEnAttente,
        ];

        


        $this->show('views_admin/administrateur_accueil', $params); // affichage de l'accueil administrateur

    }



} // fin de class AdminController


