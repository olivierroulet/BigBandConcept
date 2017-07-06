<?php

namespace Controller;

use \W\Controller\Controller;
// use \W\Model\UsersModel;
use Model\DevisModel;
use Model\ClientsModel;
use Model\UsersModel;
use \W\Security\AuthentificationModel;
use Respect\Validation\Validator as v;
// Cf http://respect.github.io/Validation/docs/date.html

class ClientsController extends \W\Controller\Controller
{
    public function addEmployeur()
    {
    		// déplacé en début de function
        $post = [];
        $errors = [];
        $formValid = false;
        
        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if (!v::stringType()->length(2, null)->validate($post['CL_Prenom'])){
                $errors[] = 'Le prénom doit faire au minimum 2 caractères'; // true
            }
            if (!v::stringType()->length(2, null)->validate($post['CL_Nom'])){
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
                if (!v::Alnum()->validate($post['CL_Raison_Sociale'])){
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
            if (!v::postalCode('FR')->validate($post['DV_Codepostal'])){
                $errors[] = 'Le code postal (français) est invalide'; // true
            }
            if (!v::Alnum()->length(3, null)->validate($post['DV_Ville'])){
                $errors[] = 'Le nom de la localité doit faire au minimum 3 caractères'; // true
            }

            if(count($errors) === 0){

                $authModel = new AuthentificationModel();

                $dataUser = [
                'US_firstname'   => $post['CL_Prenom'],
                'US_lastname'   => $post['CL_Nom'],
                'US_email'   => $post['CL_Email1'],
                'US_tel'   => $post['CL_Telephone'],
                'US_idURole'    => 2,
                ];
                    // on verifie que l'utilisateur n'ai pas déjà un compte
                $user = new UsersModel();
                $verif = $user -> getUserByUsernameOrEmail($post['CL_Email1']);
                if($verif){
                    // L'utilisateur à un id
                    $idEmployeur=$verif['US_id'];
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
                $employeur = new ClientsModel();
                $insert = $employeur->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()
                // On recupere l'id employeur créé
                $lastidemployeur = $insert['CL_Idclient'];
                // on a inséré les données dans la table employeur
                // maintenant on ajoute les données dans la table devis
                $datePrestaEn = date ('Y-m-d', strtotime($post['DV_Datedelaprestation']));
                $data = [
                'DV_Idclient'   => $lastidemployeur,
                'DV_Datedelaprestation'    => $datePrestaEn,
                'DV_CodePostalPrestation'   => $post['DV_Codepostal'],
                'DV_Lieudelaprestation'   => $post['DV_Ville'],
                'DV_Statut_Du_Devis'    => 'A faire',
                ];
                $devis = new DevisModel();
                $insert = $devis->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()
                $formValid = true;
            }
                             
            if(!empty($insert)){
                $formValid = true;
            }

        }
    }

    $params = [
            // Dans la vue, les clés deviennent des variables
    'formValid' 	=> $formValid, 
    'formErrors'	=> $errors,
    ];

    $this->show('employeur/action_form_employeur', $params);

}

}