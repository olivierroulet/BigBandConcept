<?php

namespace Controller;

use \W\Controller\Controller;
// use \W\Model\UsersModel;
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
        //		$rolesAvailable = ['admin', 'editor', 'user']; en version Axel 
/*        L' adresse doit faire au minimum 5 caractères
Le numéro de téléphone mobile est invalide
Le numéro de téléphone fixe est invalide
Le numéro de Sécurité Sociale est incorrect
Le Numéro de GUSO doit faire 10 caractères
Le Numéro de Congés Spectacle doit faire au minimum 7 caractères */

/*
SELECT `CL_Idclient`, `CL_Etiquetteemployeur`, `CL_Raison_Sociale`, `CL_Statut_Juridique`, `CL_Titulaire_Licence_Entrepreneur_De_Spectacles`, `CL_Code_Postal`, `CL_Ville`, `CL_Departement`, `CL_Createur`, `CL_Date_De_Creation`, `CL_Modificateur`, `CL_Date_De_Modification`, `CL_Habitude_De_Date`, `CL_Date_De_Prise_De_Decision`, `CL_Date_Du_Prochain_Suivi`, `CL_Note_De_Prochain_Suivi`, `CL_Type_Bareme`, `CL_Indicateur_De_Suivi`, `CL_Sortir_Des_Resultats_De_Recherche`, `CL_Statut_Du_Client`, `CL_Id_Message_Correspondant` FROM `clients` */
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
            if (!v::Alnum()->validate($post['CL_Raison_Sociale'])){
                $errors[] = 'La raison sociale n\'est pas valide'; // true
            }
            $authStatutjuridique=['particulier', 'entreprise', 'administration', 'association loi 1901'];
            if(!in_array($post['CL_Statut_Juridique'], $authStatutjuridique)){
                $errors[] = $post['CL_Statut_Juridique'].'Indiquez votre statut juridique'; // true
            }

            if (!empty($post['DV_Datedelaprestation']) && !v::date('d/m/Y')->validate($post['DV_Datedelaprestation'])){
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
                $verif = $user-> getUserByUsernameOrEmail($post['CL_Email1']);
                if($verif){
                    // L'utilisateur à un id
                    $idEmployeur=$verif;
                } 
                else {
                //l'utilisateur n'a pas de compte utilisateur, on lui en crée un 
                $insert = $user->insert($dataUser); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()
                $idEmployeur = $user->lastInsertId();
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
        // Si on oublie pas d' afficher tout ça dans la méthode show()
    $this->redirectToRoute('default/home#contact', $params);
        // Après avoir affiché, va falloir se cogner la partie insertion en base



}

}