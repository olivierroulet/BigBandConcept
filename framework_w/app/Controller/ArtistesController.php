<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use Respect\Validation\Validator as v;


class ArtistesController extends Controller
{
    public function addArtiste()
    {
        $post = [];
        $errors = [];
        $formValid = false;
        //		$rolesAvailable = ['admin', 'editor', 'user'];

        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if (!v::stringType()->length(2, null)->validate($post['AR_Prenom'])){
                $errors[] = 'Le prénom doit faire au minimum 2 caractères'; // true
            }
            if (!v::stringType()->length(2, null)->validate($post['AR_Nom'])){
                $errors[] = 'Le nom doit faire au minimum 2 caractères'; // true
            }
            if (!v::stringType()->length(2, null)->validate($post['AR_Pseudo'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le pseudo/nom d\' artiste doit faire au minimum 2 caractères'; // true
            }
            if (!v::email()->validate($post['AR_Adresse_Mail'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'L\'adresse mail est invalide'; // true
            }

            if (!v::Alnum()->length(8, null)->validate($post['US_Password'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le mot de passe doit faire au minimum 8 caractères'; // true
            }

            if ($post['US_Password'] != $post['mdp2']){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Les 2 mots de passe sont différents'; // true
            }

            if (!v::stringType()->length(5, null)->validate($post['AR_Emploi_Occupe'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'L\' emploi occupé doit faire au minimum 5 caractères'; // true
            }

            if (!v::stringType()->length(2, null)->validate($post['AR_Civilite'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'La civilité est erronée'; // true
            }

            if (!v::Alnum()->length(1, null)->validate($post['AR_Numero'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le numéro doit faire au minimum 2 caractères'; // true
            }

            if (!v::Alnum()->length(5, null)->validate($post['AR_Voie'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'La voie doit faire au minimum 5 caractères'; // true
            }

            if (!v::Alnum()->length(2, null)->validate($post['AR_Batiment'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le nom du bâtiment doit faire au minimum 2 caractères'; // true
            }

            if (!v::Alnum()->length(5, null)->validate($post['AR_Adresse_Ligne_1'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'L\' adresse doit faire au minimum 5 caractères'; // true
            }

            if (!v::postalCode('FR')->validate($post['AR_Code_Postal'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le code postal (français) est invalide'; // true
            }

            if (!v::Alnum()->length(3, null)->validate($post['AR_Ville'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le nom de la localité doit faire au minimum 3 caractères'; // true
            }

            if (!v::Alnum()->length(8, null)->validate($post['AR_Telephone_1'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le numéro de téléphone mobile est invalide'; // true
            }

            if (!v::Alnum()->length(8, null)->validate($post['AR_Telephone_2'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le numéro de téléphone fixe est invalide'; // true
            }
            if (!preg_match("#^[1-2][0-9]{2}[0-1][0-9][[2A-B]*][[[0-9]]*]{2}[0-9]{3}[0-9]{3}[0-9]{2}$#",($post['AR_N_De_Securite_Sociale']))){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le numéro de Sécurité Sociale est incorrect'; // true
            }

            if (!v::intType()->length(10, 10)->validate($post['AR_N_Du_Guso'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le Numéro de GUSO doit faire 10 caractères'; // true
            }

            if (!v::Alnum()->length(7, 7)->validate($post['AR_Numero_Conges_Spectacle'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le Numéro de Congés Spectacle doit faire au minimum 7 caractères'; // true
            }

            if (!v::date()->validate($post['AR_Date_De_Naissance'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'La date de naissance est incorrecte'; // true
            }

            if (!v::stringType()->length(3, null)->validate($post['AR_Lieu_De_Naissance'])){
                $errors[] = 'Le lieu de naissance doit faire au minimum 3 caractères'; // true
            }

            if (!v::stringType()->length(2, null)->validate($post['AR_Nationalite'])){
                //if (!v::stringType()->alpha()->length(2, 30)->validate($title)){		
                $errors[] = 'Le nationalité doit faire 2 caractères'; // true
            }
            if(count($errors) === 0){
                $authModel = new AuthentificationModel();

                $data = [
                    'AR_Prenom' => $post['AR_Prenom'],
                    'AR_Nom' 	=> $post['AR_Nom'],
                    'AR_Pseudo' 	=> $post['AR_Pseudo'],
                    'AR_Adresse_Mail' 	=> $post['AR_Adresse_Mail'],
                    'US_Password' 	=> $authModel->hashPassword($post['US_Password']),
                    'AR_Emploi_Occupe'		=> $post['AR_Emploi_Occupe'],
                    'AR_Civilite'		=> $post['AR_Civilite'],
                    'AR_Numero'		=> $post['AR_Numero'],
                    'AR_Voie'		=> $post['AR_Voie'],
                    'AR_Batiment'		=> $post['AR_Batiment'],
                    'AR_Adresse_Ligne_1'		=> $post['AR_Adresse_Ligne_1'],
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

                // UsersModel est importé via le "use" en haut de la class actuelle
                $ArtistesModel = new ArtistesModel();
                $insert = $ArtistesModel->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

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
        // Si on oublie pas de transmettre tout ça dans la méthode show()
        $this->show('artistes', $params);

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