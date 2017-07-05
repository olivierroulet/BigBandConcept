<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UsersModel;
use Model\ArtistesModel;
use \W\Security\AuthentificationModel;
use \W\Security\AuthorizationModel;
use Respect\Validation\Validator as v;
// Cf http://respect.github.io/Validation/docs/date.html

class UsersController extends \W\Controller\Controller
{

    public function updArtiste()
    {

    	// On bloque l'acccès à la page, uniquement pour les admins (id: 1) et les artistes (id: 3)
    	// $this->allowTo() Retourne true si l'id_role de l'utilisateur est dans la liste, sinon false (ou redirect vers page login si non connecté)
    	if($this->allowTo(['1', '3']) == false){ 
    		$this->showNotFound();
    	}

    	$Artiste = new ArtistesModel();	// déplacé en début de function
        $post = [];
        $errors = [];
        $formValid = false;

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
            { 
            	$errors[] = 'Le numéro de téléphone fixe est invalide'; // true}
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
            }
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

    public function firstLogin()
    {
        $params = [];
        $post = [];
        $errors = [];
        $formValid = false;
        
        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if (!v::email()->validate($post['email'])){
                $errors[] = 'L\'adresse mail est invalide'; // true
            }

            if (!v::Alnum()->length(8, null)->validate($post['username'])){
                $errors[] = 'Votre pseudo doit faire au minimum 8 caractères'; // true
            }
            if (!v::Alnum()->length(8, null)->validate($post['password1'])){
                $errors[] = 'Le mot de passe doit faire au minimum 8 caractères'; // true
            }

            if ($post['password1'] !== $post['password2']){
                $errors[] = 'Les deux mots de passe ne sont pas identiques'; // true
            }

            if(count($errors) === 0){

                // on verifie que l'utilisateur ai déjà un id
                $user = new UsersModel();
                $verif = $user-> getUserByUsernameOrEmail($post['email']);
                if($verif){
                    // L'utilisateur a bien un id on l'attribue a isUser
                    $idUser=$verif['US_id'];
                    // on verifie maintenant que l'utilisateur n'ai pas de mot de passe
                    $verif=$user->passwordExists($post['email']);
                    if($verif){

                        // l'utilisateur n'a pas de mot de passe donc on va mettre a jour le compte
                        $authModel = new AuthentificationModel();
                        $passwordinsert=$authModel->hashPassword($post['password1']);
                        $data = [
                        'US_Pseudo'   => $post['username'],
                        'US_Password'   => $passwordinsert,
                        ];
                        $update=$user->update($data,$idUser);
                        if(!empty($update)){
                            $formValid = true; 
                        }
                    } else{
                    // l'utilisateur n'a déja saisi un mot de passe
                        $message = 'Vous êtes déjà inscrit !<br>Si vous ne vous souvenez pas de votre mot de passe, <br>cliquez sur mot de passe oublié'; 
                        $formValid = false; 
                    }
                } 
                else {
                    // l'utilisateur n'a pas d'id.
                    $message= 'Vous n\'êtes pas autorisé à vous créer un compte, contactez l\'administrateur du site'; 
                    $formValid = false; 
                }                 

            }

            $params = [
            // Dans la vue, les clés deviennent des variables
            'formValid'     => $formValid, 
            'formErrors'    => $errors,
            'message'    => $message,
            ];
        }
        $this->show('login/first_login',$params);
    }

   public function login()
    {
        $post = [];
        $errors = [];

        if(!empty($_POST)){

            $post = array_map('trim', array_map('strip_tags', $_POST));

            $authModel = new AuthentificationModel();
            $id_user = $authModel->isValidLoginInfo($post['email'], $post['password']);

            if($id_user > 0){ // Ici, on à un id de l'utilisateur
                $usersModel = new UsersModel();

                // $me = $usersModel->getUserByUsernameOrEmail($post['ident']);
                $me = $usersModel->find($id_user); 

                // $me contient désormais toutes les infos de l'utilisateur qui veut se connecter

                $authModel->logUserIn($me); // Remplit la session $_SESSION['user']

                if(!empty($authModel->getLoggedUser())){
                    // Ici la session est complétée avec les infos du membre (hors mdp)
                    $this->flash('Vous êtes desormais connecté', 'success');
                    $this->redirectToRoute('default_artistes');
                }
            }

            else {
                $this->flash('Le couple identifiant / mot de passe est invalide', 'danger');
            }

        }

        $this->show('users/login');
    }

    public function forgotPassword()
    {

    }
}