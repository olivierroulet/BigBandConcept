<?php

namespace Controller;

use \W\Controller\Controller;
// use \W\Model\UsersModel;
use Model\DevisModel as Devis;
use Model\ClientsModel as Clients;
use Model\UsersModel as Users;
use \W\Security\AuthentificationModel;
use Respect\Validation\Validator as v;
// Cf http://respect.github.io/Validation/docs/date.html

class ClientsController extends \W\Controller\Controller
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

    public function addEmployeur()
    {
            
        $post = [];
        $errors = [];
        
        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $additionalChars = "AaÁáÂâCcĆćĈĉEeÉéÊêIiÍíÎî'";

            if (!v::Alnum($additionalChars)->length(2, null)->validate($post['CL_Prenom'])){
                $errors[] = 'Le prénom doit faire au minimum 2 caractères'; // true
            }

            if (!v::Alnum($additionalChars)->length(2, null)->validate($post['CL_Nom'])){
                $errors[] = 'Le nom doit faire au minimum 2 caractères'; // true
            }

            if (!v::Alnum()->length(10, null)->validate($post['CL_Telephone'])){
                $errors[] = 'Le numéro de téléphone est invalide'; // true
            }

            if (!v::email()->validate($post['CL_Email1'])){
                $errors[] = 'L\'adresse mail est invalide'; // true
            }

            if ($post['CL_Email1'] != $post['CL_Email2']){
                $errors[] = 'Les deux adresses mail ne sont pas identiques'; // true
            }

            if($post['CL_Statut_Juridique'] != 'particulier'){
                if (!v::Alnum($additionalChars)->validate($post['CL_Raison_Sociale'])){
                    $errors[] = 'La raison sociale n\'est pas valide'; 
                }
            }

            $authStatutjuridique=['particulier', 'entreprise', 'administration', 'association loi 1901'];
            if(!in_array($post['CL_Statut_Juridique'], $authStatutjuridique)){
                $errors[] = $post['CL_Statut_Juridique'].'Indiquez votre statut juridique'; // true
            }

            if (!v::date('d/m/Y')->validate($post['DV_Datedelaprestation'])){
                $errors[] = 'La date de la prestation est incorrecte'; // true
            }

            if (!v::Alnum()->validate($post['DV_Codepostal'])){
                $errors[] = 'Le code postal  n\'est pas valide'; // true
            }

            if (!v::Alnum($additionalChars)->length(3, null)->validate($post['DV_Ville'])){
                $errors[] = 'Le nom de la localité doit faire au minimum 3 caractères'; // true
            }

            if(count($errors) === 0){

                $dataUser = [
                'US_firstname'   => $post['CL_Prenom'],
                'US_lastname'   => $post['CL_Nom'],
                'US_email'   => $post['CL_Email1'],
                'US_tel'   => $post['CL_Telephone'],
                'US_idURole'    => 2,
                'US_AuthorizedYN' => false, // à la création de la demande de devis l'utilisateur n'a pas le droit de se créer un compte
                ];
                    // on verifie que l'utilisateur n'ai pas déjà un compte
                $user = new Users();
                $verif = $user -> getUserByUsernameOrEmail($post['CL_Email1']);
                if($verif){
                    // L'utilisateur à un id
                    $lastid=$verif['US_id'];
                    $client = new Clients();
                    $recherche = $client->findClientByIdUser($lastid);
                    $lastidemployeur = $recherche['CL_Idclient'];
                } 
                else {
                // L'utilisateur n'a pas de compte utilisateur, on lui en crée un 
                $insert = $user->insert($dataUser); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()
                $lastid = $insert['US_id'];
                    // on crée la fiche employeur
                    // on determine le mois de date de prestation habituelle
                $data = [
                'CL_ID_InUsersTable'   => $lastid,
                'CL_Raison_Sociale'    => $post['CL_Raison_Sociale'],
                'CL_Statut_Juridique'   => $post['CL_Statut_Juridique'],
                'CL_Titulaire_Licence_Entrepreneur_De_Spectacles'   => $post['CL_Titulaire_Licence_Entrepreneur_De_Spectacles'],
                ];
                $employeur = new Clients();
                $insert = $employeur->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()
                // On recupere l'id employeur créé
                $lastidemployeur = $insert['CL_Idclient'];
            }
                // on a inséré les données dans la table employeur
                // maintenant on ajoute les données dans la table devis
            $datePrestaEn = date ('Y-m-d', strtotime($post['DV_Datedelaprestation']));
            $data = [
            'DV_Idclient'   => $lastidemployeur,
            'DV_Datedelaprestation'    => $datePrestaEn,
            'DV_CodePostalPrestation'   => $post['DV_Codepostal'],
            'DV_Lieudelaprestation'   => $post['DV_Ville'],
            'DV_Statut_Du_Devis'    => 'a faire',
            ];
            $devis = new Devis();
                $insert = $devis->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()
                if($insert){
                    $json = [
                    'result' => true,
                    'success' => 'Votre demande de devis a bien été envoyée,<br>Elle sera rapidement traitée !',
                    ];
                }

                else {
                    $json = [
                    'result' => false,
                    'errors' => 'Une erreur est survenue ! :-(',
                    ];
                }
            } // count($errors)
            else {
                $json = [
                'result' => false,
                'errors' => implode('<br>', $errors),
                ];
            }

            $this->showJson($json);

        }
    }
    public function listerTousLesEmployeurs()
    {
        $this->verifAdmin();
        
        $employeur = new Clients();
        $employeurs = $employeur->findAllEmployeurs("", 'ASC',1,0);
        
        $params = [
        'employeurs'    =>      $employeurs,
        ];

        
        

        $this->show('views_employeur/liste_des_employeurs', $params); // affichage du template employeur
        
    }
    
    public function employeurSuivant()
    {
        if (!empty($_POST['actualIdClient']))
        {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            $employeur = new Clients();
            $next = $employeur->findNextEmployeur($post['actualIdClient']);
            $params = ['employeurs'=> $next];
            
            debug($params);
              $this->show('views_employeur/employeur_suivant', $params); 
            
            
        }
    }
    
     public function employeurPrecedent()
    {
            if (!empty($_POST['actualIdClient']))
        {
            $post = array_map('trim', array_map('strip_tags', $_POST));
            $employeur = new Clients();
            $previous = $employeur->findPreviousEmployeur($post['actualIdClient']);
            $params = ['employeurs'=> $previous];
            debug($params);
            
              $this->show('views_employeur/employeur_precedent', $params); 
                       
        }
    }
    
    
    


}
                
                
                
                
   