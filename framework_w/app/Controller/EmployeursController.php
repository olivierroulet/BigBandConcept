<?php

namespace Controller;

use \W\Controller\Controller;
// use \W\Model\UsersModel;
use Model\ArtistesModel;
use \W\Security\AuthentificationModel;
use Respect\Validation\Validator as v;
// Cf http://respect.github.io/Validation/docs/date.html

class EmployeursController extends \W\Controller\Controller
{
    public function addEmployeur()
    {
    	$Artiste = new EmployeurModel();	// déplacé en début de function
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
            if (!v::email()->validate($post['CL_email1'])){
                $errors[] = 'L\'adresse mail est invalide'; // true
            }
            if ($post['CL_email1'] != $post['CL_email2']){
                $errors[] = 'Les deux adresses mail ne sont pas identiques'; // true
            }
            if (!v::Alnum()->validate($post['CL_Raison_Sociale'])){
                $errors[] = 'La raison sociale n\'est pas valide'; // true
            }
            $authStatutjuridique=['particulier', 'entreprise', 'administration', 'association loi 1901'];
            if(!in_array($authStatutjuridique, $post['CL_Statut_Juridique'])){
                $errors[] = 'Indiquez votre statut juridique'; // true
            }

            if (!empty($post['DV_Datedelaprestation']) && !v::date('d-m-Y')->validate($post['DV_Datedelaprestation'])){
                $errors[] = 'La date de la prestation est incorrecte'; // true
            }  



            /*
            if (!v::stringType()->length(2, null)->validate($post['AR_Pseudo'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le pseudo/nom d\' artiste doit faire au minimum 2 caractères'; // true
            }
            if (!v::email()->validate($post['AR_Adresse_Mail'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'L\'adresse mail est invalide'; // true
            }
            if ((!v::Alnum()->length(8, null)->validate($post['AR_Password'])) || ($post['AR_Password'] != $post['mdp2'])) {
				$errors[] = 'Les 2 mots de passe ne concordent pas, ou ne font pas au minimum 8 caractères'; // true
            }
            if (!v::stringType()->length(5, null)->validate($post['AR_Emploi_Occupe'])){
                $errors[] = 'L\' emploi occupé doit faire au minimum 5 caractères';  
            }

            if (!v::Alnum()->length(1, null)->validate($post['AR_Numero'])){
                $errors[] = 'Le numéro doit faire au minimum 2 caractères'; // true
            }
            if (!v::Alnum()->length(3, null)->validate($post['AR_Voie'])){
                $errors[] = 'La voie doit faire au minimum 5 caractères'; // true
            }
            if (!v::Alnum()->length(1, null)->validate($post['AR_Batiment'])){
                $errors[] = 'Le nom du bâtiment doit faire au minimum 2 caractères'; // true
            }
            // if (!v::Alnum()->length(5, null)->validate($post['AR_Adresse_Ligne_1'])){
            //     $errors[] = 'L\' adresse doit faire au minimum 5 caractères'; // true
            // }
            if (!v::postalCode('FR')->validate($post['AR_Code_Postal'])){
                $errors[] = 'Le code postal (français) est invalide'; // true
            }
            if (!v::Alnum()->length(3, null)->validate($post['AR_Ville'])){
                $errors[] = 'Le nom de la localité doit faire au minimum 3 caractères'; // true
            }

            if (!v::Alnum()->length(8, null)->validate($post['AR_Telephone_1'])){
                $errors[] = 'Le numéro de téléphone mobile est invalide'; // true
            }
	// ici téléphone fixe optionnel  v::optional(v::alpha())->validate(null); pas sûr que la syntaxe soit OK
            if (v::optional(v::Alnum()->length(8, null))->validate($post['AR_Telephone_2'])){
            }
            else
            { $errors[] = 'Le numéro de téléphone fixe est invalide'; // true}
            }
            if (!preg_match("#^[12][0-9]{2}[0-1][0-9](2[AB]|[0-9]{2})[0-9]{3}[0-9]{3}[0-9]{2}$#",($post['AR_N_De_Securite_Sociale']))){
                $errors[] = 'Le numéro de Sécurité Sociale est incorrect'; // true
            }
            if (!v::Alnum()->length(10, 10)->validate($post['AR_N_Du_Guso'])){
                $errors[] = 'Le Numéro de GUSO doit faire 10 caractères'; // true
            }

            if (!v::Alnum()->length(7, 7)->validate($post['AR_Numero_Conges_Spectacle'])){
                $errors[] = 'Le Numéro de Congés Spectacle doit faire 7 caractères'; // true
            }
// ici date et format
            if (!v::date('d-m-Y')->validate($post['AR_Date_De_Naissance'])){
                $errors[] = 'La date de naissance est incorrecte'; // true
            }

            if (!v::stringType()->length(2, null)->validate($post['AR_Lieu_De_Naissance'])){
                $errors[] = 'Le lieu de naissance doit faire au minimum 3 caractères'; // true
            }

            if (!v::stringType()->length(2, null)->validate($post['AR_Nationalite'])){
                $errors[] = 'Le nationalité doit faire 2 caractères'; // true
            }*/
            if(count($errors) === 0){

                $authModel = new AuthentificationModel();

                $data = [
                'AR_Idartiste' => '',
                'AR_Prenom' => $post['AR_Prenom'],
                'AR_Nom' 	=> $post['AR_Nom'],
                'AR_Pseudo' 	=> $post['AR_Pseudo'],
                'AR_Adresse_Mail' 	=> $post['AR_Adresse_Mail'],
                'AR_Password' 	=> $authModel->hashPassword($post['AR_Password']),
                'AR_Emploi_Occupe'		=> $post['AR_Emploi_Occupe'],
                'AR_Civilite'		=> $post['AR_Civilite'],
                'AR_Numero'		=> $post['AR_Numero'],
                'AR_Voie'		=> $post['AR_Voie'],
                'AR_Batiment'		=> $post['AR_Batiment'],
                    // 'AR_Adresse_Ligne_1'		=> $post['AR_Adresse_Ligne_1'],
                'AR_Code_Postal'		=> $post['AR_Code_Postal'],
                'AR_Ville'		=> $post['AR_Ville'],
                'AR_Telephone_1'		=> $post['AR_Telephone_1'],
                'AR_Telephone_2'		=> $post['AR_Telephone_2'],
                'AR_N_De_Securite_Sociale'		=> $post['AR_N_De_Securite_Sociale'],
                'AR_N_Du_Guso'		=> $post['AR_N_Du_Guso'],
                'AR_Numero_Conges_Spectacle'		=> $post['AR_Numero_Conges_Spectacle'],
                'AR_Date_De_Naissance'		=> $post['AR_Date_De_Naissance'],
                'AR_Lieu_De_Naissance'		=> $post['AR_Lieu_De_Naissance'],
                'AR_Nationalite'		=> $post['AR_Nationalite'],
                'AR_NewsLetterYN'		=> $post['AR_NewsLetterYN'],
                ];

// ici:question why un model dans un controller ??? // UsersModel est importé via le "use" en haut de la class actuelle
                /*$Artiste = new ArtistesModel();	// déplacé en début de function*/
                $insert = $Artiste->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

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
        $this->show('artistes', $params);
        // Après avoir affiché, va falloir se cogner la partie insertion en base



    }


//    public function login()
//    {
//        $post = [];
//        $errors = [];
//
//        if(!empty($_POST)){
//
//            $post = array_map('trim', array_map('strip_tags', $_POST));
//
//            $authModel = new AuthentificationModel();
//            $id_user = $authModel->isValidLoginInfo($post['ident'], $post['passwd']);
//
//            if($id_user > 0){ // Ici, on à un id de l'utilisateur
//                $usersModel = new UsersModel();
//
//                // $me = $usersModel->getUserByUsernameOrEmail($post['ident']);
//                $me = $usersModel->find($id_user); 
//
//                // $me contient désormais toutes les infos de l'utilisateur qui veut se connecter
//
//                $authModel->logUserIn($me); // Remplit la session $_SESSION['user']
//
//                if(!empty($authModel->getLoggedUser())){
//                    // Ici la session est complétée avec les infos du membre (hors mdp)
//                    $this->flash('Vous êtes desormais connecté', 'success');
//                    $this->redirectToRoute('default_home');
//                }
//            }
//
//            else {
//                $this->flash('Le couple identifiant / mot de passe est invalide', 'danger');
//            }
//
//        }
//
//        $this->show('users/login');
//    }
//
//
//    public function logout()
//    {
//        // On peut éventuellement faire un formulaire de confirmation
//
//        $authModel = new AuthentificationModel();
//        $authModel->logUserOut();
//
//        if(empty($authModel->getLoggedUser())){
//            // Si l'utilisateur est "vide", on a donc bien vider la session, il est donc déconnecté
//            $this->flash('Aurevoir, vous êtes désormais déconnecté', 'success');
//            $this->redirectToRoute('default_home');
//        }
//
//
//    }


}