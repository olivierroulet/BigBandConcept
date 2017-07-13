<?php

namespace Controller;

use \W\Controller\Controller;
use Controller\UsersController;
use Model\DevisModel as Devis;
use Model\Detail_devisModel as Detaildevis;
use Model\Detaildevis2Model as Detaildevis2;
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
        $tousLesDevis = $devis->findAllDevis('','DV_Date_De_Creation','ASC',NULL,NULL);
        $nbDeDevis=count($tousLesDevis);

        $tousLesDevis = $devis->findAllDevis('','DV_Date_De_Creation','ASC',1,0);

        $operateur = new Operateur();
        $tousLesOperateurs = $operateur->findAll();

        $ourshop = new Groupeinfo();
        $requeteOurShop = $ourshop->findAll();
        $ourShop=$requeteOurShop[0];

        $params = [
        'tousLesDevis'          =>        $tousLesDevis,
        'ourShop'               =>        $ourShop,
        'tousLesOperateurs'     =>        $tousLesOperateurs,
        'nbDeDevis'             =>        $nbDeDevis,
        'offset'                =>        0,
        ];

        $this->show('views_admin/liste_des_devis', $params); // affichage du template devis
    }

    public function devisOffset($enr = 0)
    {

        $this->verifAdmin();

        $devis = new Devis();
        $Devis = $devis->findAllDevis('','DV_Date_De_Creation','ASC',NULL,NULL);
        $nbDeDevis=count($Devis);

        $tousLesDevis = $devis->findAllDevis('','DV_Date_De_Creation','ASC', 1, (int) $enr);

        $operateur = new Operateur();
        $tousLesOperateurs = $operateur->findAll();

        $ourshop = new Groupeinfo();
        $requeteOurShop = $ourshop->findAll();
        $ourShop=$requeteOurShop[0];

        $params = [
        'tousLesDevis'          =>        $tousLesDevis,
        'ourShop'               =>        $ourShop,
        'tousLesOperateurs'     =>        $tousLesOperateurs,
        'nbDeDevis'             =>        $nbDeDevis,
        'enr'                   =>        $enr,
        ];

        $this->show('views_admin/liste_des_devis', $params); // affichage du template devis
    }

    public function afficherUnDevis($id)
    {
        $this->verifAdmin();

        $devis = new Devis();
        $tousLesDevis = $devis->findDevis($id);

        $nbDeDevis=count($tousLesDevis);

        $operateur = new Operateur();
        $tousLesOperateurs = $operateur->findAll();

        $ourshop = new Groupeinfo();
        $requeteOurShop = $ourshop->findAll();
        $ourShop=$requeteOurShop[0];

        $params = [
        'tousLesDevis'          =>        $tousLesDevis,
        'ourShop'               =>        $ourShop,
        'tousLesOperateurs'     =>        $tousLesOperateurs,
        'nbDeDevis'             =>        $nbDeDevis,
        'offset'                =>        0,
        ];

        $this->show('views_admin/liste_des_devis', $params); // affichage du template devis
    }

    public function updaterLeDevis()
    {
        $this->verifAdmin();

        $post = [];
        $errors = [];
        $formValid = false;

        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            // on a pas le temps de faire les verifs pour la soutenance 
            // mais elle seraient bien sur ajoutées...

            $date_fr = $post['DV_Datedudevis'];
            $date_us = date('Y-m-d', strtotime(str_replace('/', '-', $date_fr)));
            
            $date_prestation_fr = $post['DV_Datedelaprestation'];
            $date_prestation_us = date('Y-m-d', strtotime(str_replace('/', '-', $date_prestation_fr)));
            switch ($post['DE_Formule']) {
                case 'Musique de rue':
                $descriptif='4 Musiciens en acoustique\n
                2h00 d\'animation\n
                Salaires bruts : 4 x 181.19 €\n
                Cotisations salariale : 4 x 31.19 €\n
                Cotisations patronales : 4 x 102.19 €\n
                Salaires net : 4 x 150.00 €';
                $totalsalairesnets=600;
                $totaldescotisations=533.52;

                break;
                
                case 'Concert':
                $descriptif='4 Musiciens sur scène\n
                1h45 de concert\n
                Salaires bruts : 4 x 258.06 €\n
                Cotisations salariale : 4 x 38.06 €\n
                Cotisations patronales : 4 x 126.35 €\n
                Salaires net : 4 x 220.00 €\n
                \n(technique non comprise)'
                ;
                $totalsalairesnets=880;
                $totaldescotisations=657.64;

                break;

                case 'Soirée privée':
                $descriptif='4 Musiciens\n
                2h00 d\'animation en acoustique ou sonorisé\n
                Salaires bruts : 4 x 181.19 €\n
                Cotisations salariale : 4 x 31.19 €\n
                Cotisations patronales : 4 x 102.19 €\n
                Salaires net : 4 x 150 €';
                $totalsalairesnets=600;
                $totaldescotisations=533.52;
                break;

                default:
                $descriptif='';
            }
            $prixtotal= $totalsalairesnets+$totaldescotisations+$post['coutdeplacements'];
            // On update la table Devis
            $dataDevis = [
            'DV_Datedudevis' => $date_us,
            'DV_CodePostalPrestation' => $post['DV_CodePostalPrestation'],
            'DV_Datedelaprestation' => $date_prestation_us,
            'DV_Lieudelaprestation' => $post['DV_Lieudelaprestation'],
            'DV_Montantdessalaires' => $totalsalairesnets,
            'DV_Montantdescotisations' => $totaldescotisations,
            'DV_Montantdesfrais'=>  $post['coutdeplacements'],
            'DV_Prixtotal' => $prixtotal,
            'DV_Statut_Du_Devis'  => $post['DV_Statut_Du_Devis'],
            ];
            $Devis= new Devis();
            $update = $Devis->update($dataDevis,$post['DV_Iddevis']);

            // On update la table Detaildevis
            $dataDetailDevis = [
            'DE_Id_Operateur' => $post['DE_Id_Operateur'],
            'DE_Formule' => $post['DE_Formule'],
            'DE_Voicilacomposition' => $descriptif,
            ];
            $Detaildevis= new Detaildevis();
            $update = $Detaildevis->update($dataDetailDevis,$post['DE_Iddetaildudevis']);

            $this->afficherUnDevis($post['DV_Iddevis']);

            // $devis = new Devis();
            // $tousLesDevis = $devis->findAllDevis('','DV_Date_De_Creation','DESC',1,0);

            // $operateur = new Operateur();
            // $tousLesOperateurs = $operateur->findAll();

            // $ourshop = new Groupeinfo();
            // $requeteOurShop = $ourshop->findAll();
            // $ourShop=$requeteOurShop[0];

            // $params = [
            // 'tousLesDevis'          =>        $tousLesDevis,
            // 'ourShop'               =>        $ourShop,
            // 'tousLesOperateurs'     =>        $tousLesOperateurs,
            // 'post'                  =>        $post,
            // ];
        }
        // $this->show('views_admin/liste_des_devis', $params); // affichage du template devis
        //     // $this->redirectToRoute('listertouslesdevis'); // on redirige vers l'affichage
    }

}