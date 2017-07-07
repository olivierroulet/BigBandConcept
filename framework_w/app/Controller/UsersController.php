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
            $id_user = $authModel->isValidLoginInfo($post['username'], $post['password']);

            if($id_user > 0){ // Ici, on à un id de l'utilisateur
                $usersModel = new UsersModel();

                // $me = $usersModel->getUserByUsernameOrEmail($post['ident']);
                $me = $usersModel->find($id_user); 

                // $me contient désormais toutes les infos de l'utilisateur qui veut se connecter

                $authModel->logUserIn($me); // Remplit la session $_SESSION['user']

                if(!empty($authModel->getLoggedUser())){
                    // Ici la session est complétée avec les infos du membre (hors mdp)
                    $this->flash('Vous êtes desormais connecté', 'success');
                    $this->redirectToRoute('redirectrole');
                }
            }

            else {
?>
<script>alert('Erreur dans votre identifiant ou mot de passe !');</script><?php


                /*$this->('Le couple identifiant / mot de passe est invalide', 'danger');*/
            }

        }

        /*$this->redirectToRoute('redirectrole');*/
    }

    public function forgotPassword()
    {

    }

    public function redirectRole()
    {
        $me = $this->getUser(); // utilisateur connecté

        /* On récupere le role 
         1: Admin, 
         2: Employeur, 
         3: Artiste, 
         4: Fan
         */
        $roleUser=$me['US_idURole'];

        switch ($roleUser) {
            case 1:
                // Administrateur
            $this->redirectToRoute('administrateuraccueil');
            break;

            case 2:
                // Employeur
                $this->show('views_employeur/infosemployeur');
                break;

            case 3:
                // Artiste
                $this->show('views_artiste/infosartiste');
                break;

            case 4:
                // Fan
                $this->show('views_fan/infosfan'); 
                break;

            default:
                $this->redirectToRoute('default_home'); // retour a l'accueil du site
                break;
        }


        // Limite l'accès à la page à un utilisateur connecté
        if(empty($me)){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }

        $this->redirectToRoute('default_home'); // retour a l'accueil du site

    }

    public function logout()
    {
        // On peut éventuellement faire un formulaire de confirmation

        $authModel = new AuthentificationModel();
        $authModel->logUserOut();

        if(empty($authModel->getLoggedUser())){
            // Si l'utilisateur est "vide", on a donc bien vider la session, il est donc déconnecté
            $this->redirectToRoute('default_home');
        }
    }

    public function gestionDesUtilisateurs()
    {

        $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }
        $this->show('views_admin/gestion_des_utilisateurs');
    }

    public function ajouterUnUtilisateur()
    {

        $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }

        $post = [];
        $errors = [];
        $formValid = false;

        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if (!v::stringType()->length(2, null)->validate($post['US_FirstName'])){
                $errors[] = 'Le prénom doit faire au minimum 2 caractères'; // true
            }
            if (!v::stringType()->length(2, null)->validate($post['US_LastName'])){
                $errors[] = 'Le nom doit faire au minimum 2 caractères'; // true
            }

            if (!v::email()->validate($post['US_email'])){
                $errors[] = 'L\'adresse mail est invalide'; // true
            }

            $authRole=[1, 2, 3, 4];
            if(!in_array($post['US_idURole'], $authRole)){
                $errors[] = 'Indiquez le rôle de l\'utilisateur à ajouter'; // true
            }

            if(count($errors) === 0){

                $authModel = new AuthentificationModel();

                $dataUser = [
                    'US_FirstName' => $post['US_FirstName'],
                    'US_LastName' => $post['US_LastName'],
                    'US_email'   => $post['US_email'],
                    'US_idURole'   => $post['US_idURole'],
                ];
                // on verifie que l'utilisateur n'ai pas déjà un compte
                $user = new UsersModel();
                $verif = $user -> getUserByUsernameOrEmail($post['US_email']);
                if($verif){
                    // L'utilisateur à un id
                    $idEmployeur=$verif['US_id'];
                    $errors[] = 'Cet utilisateur a déjà été ajouté !'; 
                } 
                else {
                    // L'utilisateur n'a pas de compte utilisateur, on lui en crée un 
                    $insert = $user->insert($dataUser); 
                }

                if(!empty($insert)){
                    $formValid = true;
                }

            }
        }

        $params = [
            // Dans la vue, les clés deviennent des variables
            'formValid'     => $formValid, 
            'formErrors'    => $errors,
        ];

        $this->show('views_admin/ajouter_un_utilisateur', $params);
    }

    public function updaterUnUtilisateur()
    {

        $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }
        if(isset($_GET['id']) AND  !empty($_GET['id'])){

            $get_id = htmlspecialchars($_GET['id']);
            $update = new UsersModel();
            $params = $update->find($get_id);

            $data = ['toto'=>$params];

            $this->show('views_admin/updater_un_utilisateur', $data);

        }
        $post = [];
        $errors = [];

        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));  

            if (!v::stringType()->length(2, null)->validate($post['US_FirstName'])){
                $errors[] = 'Le prénom doit faire au minimum 2 caractères'; // true
            }
            if (!v::stringType()->length(2, null)->validate($post['US_LastName'])){
                $errors[] = 'Le nom doit faire au minimum 2 caractères'; // true
            }
            $authRole=[1, 2, 3, 4];
            if(!in_array($post['US_idURole'], $authRole)){
                $errors[] = 'Indiquez le rôle de l\'utilisateur à ajouter'; // true
            }
            if(count($errors) === 0){
                $update = new Model();
                $updateUser = $update->update($post['US_idRole']);
                if ($updateUser){




                    $this->show('views_admin/liste_des_utilisateur');


                }

            }


        }
    }
    public function listerLesUtilisateurs()
    {

        $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }

        $user = new UsersModel();
        $users = $user->findAll('US_LastName','ASC');

        $params = ['users' => $users];
        $this->show('views_admin/liste_des_utilisateurs', $params);
    }

    public function rechercherUnUtilisateur()
    {

        $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }


        if (empty($_POST['US_email'])){
            $this->redirectToRoute('listerlesutilisateurs'); // retour a la liste des utilisateurs
        }
        $user = new UsersModel();
        $users = $user->getUserByUsernameOrEmail($_POST['US_email']);

        if($users){
            $resultat[]=$users;
        }

        $params = ['users' => $resultat,];
        $this->show('views_admin/liste_des_utilisateurs', $params);
    }



}

