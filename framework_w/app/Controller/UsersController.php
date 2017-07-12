<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UsersModel;
use Model\ArtistesModel;
use Model\Reset_passwordModel as token;
use \W\Security\AuthentificationModel;
use \W\Security\AuthorizationModel;
use Respect\Validation\Validator as v;
use PHPMailer as Mail;

// Cf http://respect.github.io/Validation/docs/date.html

class UsersController extends \W\Controller\Controller
{

   // vérifie que l'utilisateur est bien connecté
   // et avec un rôle administrateur 
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


    public function firstLogin()
    {

        $post = [];
        $errors = [];
        $message='';
        
        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if (!v::email()->validate($post['email'])){
                $errors[] = 'L\'adresse mail est invalide'; // true
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
                    $verif2=$user->passwordExists($post['email']);
                    if($verif2){

                                // l'utilisateur n'a pas de mot de passe donc on va mettre a jour le compte
                        $authModel = new AuthentificationModel();
                        $passwordinsert=$authModel->hashPassword($post['password1']);
                        $data = [
                        'US_Password'   => $passwordinsert,
                        ];
                        $update=$user->update($data,$idUser);
                        $json = [
                        'result' => true,
                        'message' => 'Votre compte a été créé,<br><a href=""><span id="successcreateacountlogg>Connectez-vous avec vos nouveaux identifiants.</span></a>',
                        ];
                    } else{
                                // l'utilisateur a déja créé un mot de passe
                        $json = [
                        'result' => false,
                        'message' => 'Vous êtes déjà inscrit ! Si vous ne vous souvenez pas de votre mot de passe, <br>Revenez à l\'ecran de connexion et cliquez sur mot de passe oublié',
                        ];

                            } // fin de verif 2
                        } 
                        else {
                    // l'utilisateur n'a pas d'id.
                            $json = [
                            'result' => false,
                            'message' => 'Vous n\'êtes pas autorisé à vous créer un compte, contactez l\'administrateur du site',
                            ];
                    } // fin de verif          

                } else {


                 $json = [
                 'result' => false,
                 'message' => $message,
                 'errors' => implode('<br>', $errors),
                 ];

            }// fin de if count errors = 0
        } // fin de if !empty post
        $this->showJson($json);

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
                    $json = [
                    'result' => true,
                    ];
                }
            }

            else {
                $json = [
                'result' => false,
                'errors' => 'Erreur dans votre identifiant ou mot de passe !',
                ];

            }

        }
        $this->showJson($json);

    }

        public function forgotPassword()
    {

        $post = [];
        $errors = [];
        $formValid = false;

        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if (!v::email()->validate($post['forgotEmail'])){
                $errors[] = 'L\'adresse mail est invalide'; // true
            }

            // les verifications sont terminées on recherche si l'utilisateur a un compte mail dans la base user et qu'il ait été autorisé a se créer un compte

            $user = new UsersModel();
            $reqAuthorized = $user->emailExistsAndAuthorized($post['forgotEmail']);
            if ($reqAuthorized) {
                // on a trouvé un utilisateur et il est autorisé a se créer un compte
                // on récupére l'id
                $idUser=$reqAuthorized['US_id'];
                $firstname=$reqAuthorized['US_FirstName'];
                $lastname=$reqAuthorized['US_LastName'];
                $ident= $firstname.' '.$lastname;
                $tomail=$reqAuthorized['US_email'];
                // on créé un token
                $token = md5(uniqid(rand(), true));
                $dataToken = [
                'RP_idUser' => $idUser,
                'RP_token' => $token,
                ];
                // on verifie que l'utilisateur n'ai pas déjà un compte
                $reset = new token();
                // On stocke le token et l'id user dans la db
                $insert = $reset->insert($dataToken);
                $mail = new Mail();
                //$mail->SMTPDebug = 3;    // Enable verbose debug output
                $mail->isSMTP();    // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';    // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'bigbandv4@gmail.com';    // SMTP username
                $mail->Password = 'Gibson-v4';  // SMTP password
                $mail->SMTPSecure = 'ssl';  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;   
                $mail->setFrom('bigbandv4@gmail.com', 'Service Authentification de BigBand.fr');
                $mail->addAddress($tomail, $ident);   // Add a recipient
                // $mail->addAddress('ellen@example.com');  // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // $mail->addAttachment('/var/tmp/file.tar.gz');    // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name
                $mail->isHTML(true);     // Set email format to HTML
                $mail->CharSet = 'UTF-8'; 
                $mail->Subject = 'Rénitialisation de votre password';
                $mail->Body    = 'Bonjour '. $firstname.'<br>Vous avez demandé la réinitialisation de votre mot de passe sur le site BigBand.fr,<br>
                <br>Pour réinitialiser votre mot de passe, cliquez sur le lien suivant : <a href="http://localhost/BigBandConcept/framework_w/public/resetpasswd.php?id='.$idUser . '&token=' .$token. '">Réinitialisez mon mot de passe</a>';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$mail->Send()){
                    $json = [
                    'result' => false,
                    'message' => 'une erreur est survenue lors de l\'envoi du mail !',
                    ];
                } 
                else{
                    $json = [
                    'result' => true,
                    'message' => 'Le message a été envoyé',
                    ];
                }

            } else {
            // on a pas trouvé d'utilisateur
                $json = [
                'result' => false,
                'message' => 'Vous n\'etes pas autorisé à utiliser cette fonction, contactez l\'administrateur du site',
                ];

            } // fin du if reqAuthorized
            
            $this->showJson($json);
        } // FIN DE IF !EMPTY POST

    }

    Public function resetPasswd()
    {
        $this->show('login/resetpasswd');

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

    public function formulaireUpdate()
    {

        $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        //        $get_id = htmlspecialchars($_GET['id']);
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }

        if(isset($_GET['id']) AND  !empty($_GET['id'])){
            $get_id = htmlspecialchars($_GET['id']);
            $user = new UsersModel();
            $recherche = $user->find($get_id);
            if ($recherche == true){
                $data = ['idToModif'=>$recherche];

                $this->show('views_admin/updater_un_utilisateur', $data);
            }
            else{

                'cet utilisateur n\'existe pas';
            }

        }
        else{

            'L\id n\'est pas correct';
        }
        $post = [];
        $errors = [];
        $formValid = false;

        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));
            $get_id = htmlspecialchars($_GET['id']);
            //            if (!v::stringType()->length(2, null)->validate($post['US_FirstName'])){
            //                $errors[] = 'Le prénom doit faire au minimum 2 caractères'; // true
            //            }
            //            if (!v::stringType()->length(2, null)->validate($post['US_LastName'])){
            //                $errors[] = 'Le nom doit faire au minimum 2 caractères'; // true
            //            }
            //
            //            if (!v::email()->validate($post['US_email'])){
            //                $errors[] = 'L\'adresse mail est invalide'; // true
            //            }
            //
            //            $authRole=[1, 2, 3, 4];
            //            if(!in_array($post['US_idURole'], $authRole)){
            //                $errors[] = 'Indiquez le rôle de l\'utilisateur à ajouter'; // true
            //            }

            //            if(count($errors) === 0){



            $dataUser = [
            'US_FirstName' => $post['US_FirstName'],
            'US_LastName' => $post['US_LastName'],
            'US_email'   => $post['US_email'],
            'US_idURole'   => $post['US_idURole'],
            'US_AuthorizedYN'     => $post['US_AuthorizedYN'],
            ];
            $user = new UsersModel();
            $update = $user->update($dataUser,$post['idToModif']); 
            //                }

            if($update == true ){
                $formValid = true;
                echo 'bravo';
                /*$params = [
                    // Dans la vue, les clés deviennent des variables
                    'formValid'     => $formValid, 
                    'formErrors'    => $errors,
                    ]*/
                    ;

                    $this->redirectToRoute('listerlesutilisateurs');
                }
                else {

                    echo 'erreur';
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
    
    
    public function supprimerUnUtilisateur()
    {
        
                $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }
        
        if (isset($_GET['id']) and !empty($_GET['id'])){
            $get_id = htmlspecialchars($_GET['id']);
            $delete = new UsersModel();
            $suppression = $delete->delete($get_id);
            if($suppression = true){
                
                
                 $this->redirectToRoute('listerlesutilisateurs');
    
                
            }
              
        }
        
    }
 
}

