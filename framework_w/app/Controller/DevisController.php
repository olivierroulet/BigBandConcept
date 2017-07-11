<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\UsersController;
use Model\DevisModel as Devis;
use Model\ClientsModel;
use Model\GroupeinfoModel as Groupeinfo;
use Model\OperateurModel as Operateur;
use Model\UsersModel;
use \W\Security\AuthentificationModel;
use Respect\Validation\Validator as v;

class DevisController extends \W\Controller\Controller
{
    public function verifAdmin()
    {
            $me = $this->getUser(); // utilisateur connecté

        // Limite l'accès à la page à un utilisateur connecté

        ///////// VERIFICATION DE LA CONNEXION
            if(empty($me)){
            $this->redirectToRoute('default_home');// retour a l'accueil du site
        } 
        //////// AUTORISE QUE POUR ADMINISTRATEUR
        $roleUser=$me['US_idURole'];
        $authLoggedUser=$me['US_FirstName'];
        if ($roleUser !=1) {
            $this->redirectToRoute('redirectrole'); // erreur de role on redirige vers la page autorisée
        }
        //////// FIN DES VERIFICATION D'USAGE
    }
    public function listerTousLesDevis()
    {
            $this->verifAdmin();
            
            $devis = new Devis();
            $tousLesDevis = $devis->findAllDevis('','DV_Date_De_Creation','DESC',1,0);
            
            $operateur = new Operateur();
            $tousLesOperateurs = $operateur->findAll();

            $ourshop = new Groupeinfo();
            $requeteOurShop = $ourshop->findAll();
            $ourShop=$requeteOurShop[0];

            $params = [
        'tousLesDevis'          =>        $tousLesDevis,
        'ourShop'               =>        $ourShop,
        'tousLesOperateurs'     =>        $tousLesOperateurs,
        ];

        $this->show('views_admin/liste_des_devis', $params); // affichage du template devis
            }

}