<?php

namespace Controller;

use \W\Controller\Controller;
//use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \W\Security\AuthorizationModel;
use Respect\Validation\Validator as v;
use \Model\ActuModel;

// Cf http://respect.github.io/Validation/docs/date.html

// 1- on affiche la table Actu en mode liste, avec 2 boutons Modif et Suppression (suppression logique seulement)
// 2- si le lecteur n'est pas habilité, les boutons sont inactifs (class="disabled")

class ActuController extends \W\Controller\Controller
{
    public function Display()
    {
    	// début des tests sur les droits du user
    	// isGranted pour savoir si le visiteur peut ins/upd l' actu
    	
    	// $User = new UsersModel();	// déplacé en début de function
     //            $authModel = new AuthentificationModel();

     //            $data = [
     //            	'AC_id' => '',
     //                'US_email' => $post['US_email'],
     //                'US_FirstName' 	=> $post['US_FirstName'],
     //                'US_LastName' 	=> $post['US_LastName'],
     //                'US_Password' 	=> $authModel->hashPassword($post['US_Password']),
     //                'US_Pseudo'		=> $post['US_Pseudo'],
     //                'US_tel'		=> $post['US_tel'],
     //                'US_idURole'		=> $post['US_idURole'],
     //                'US_ActiveYN'		=> $post['US_ActiveYN'],
     //            ];
				
     //            $insert = $User->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

     //            if(!empty($insert)){
     //                $formValid = true;
     //            }
    	// fin des tests sur les droits du user
        
    	//Début de l' affichage sans condition
    // $BigBandDB = new Database('v_agenda_pubpriv');
    	$BigBandDB = new ActuModel() ;
    	$reponses =  $BigBandDB->findWhere();
//SELECT `AC_Id`, `AC_Date`, `AC_Com1`, `AC_Com2`, `AC_Num`, `AC_Puce`, `AC_Lieu`, `AC_Adresse`, `AC_Code_Postal`, `AC_Notes`, `AC_Visibilite` FROM `actu`

               $data = [
               'reponses' => $reponses
                	// 'AC_Id' => $reponse['AC_Id'],
                 //    'AC_Date' => $reponse['AC_Date'],
                 //    'AC_Com1' => $reponse['AC_Com1'],
                 //    'AC_Com2' => $reponse['AC_Com2'],
                 //    'AC_Num' => $reponse['AC_Num'],
                 //    'AC_Puce' => $reponse['AC_Puce'],
                 //    'AC_Notes' => $reponse['AC_Notes'],
                 //    'AC_Adresse' => $reponse['AC_Adresse'],
                 //    'AC_Code_Postal' => $reponse['AC_Code_Postal'],
                 //    'AC_Lieu' => $reponse['AC_Lieu'],
                 //    'AC_Visibilite' => $reponse['AC_Visibilite'],                    

                ];


        // Si on oublie pas d' afficher tout ça dans la méthode show()
        $this->show('Actu', $data);
        // Après avoir affiché, va falloir se cogner la partie insertion en base


	} // fin de function connect


    public function UpdateActu()
    {
    	$User = new UsersModel();	// déplacé en début de function
        $post = [];
        $errors = [];
        $formValid = false;
        //		$rolesAvailable = ['admin', 'artiste', 'employeur', 'fan']; en version Axel 

			$US_id = isset($post['US_id']) ? $post['US_id'] : '';
			$US_email = isset($post['US_email']) ? $post['US_email'] : '';
			$US_FirstName = isset($post['US_FirstName']) ? $post['US_FirstName'] : '';
			$US_LastName = isset($post['US_LastName']) ? $post['US_LastName'] : '';
			$US_Password = isset($post['US_Password']) ? $post['US_Password'] : '';			
			$US_Pseudo = isset($post['US_Pseudo']) ? $post['US_Pseudo'] : '';
			$US_tel = isset($post['US_tel']) ? $post['US_tel'] : '';
			$US_idURole = isset($post['US_idURole']) ? $post['US_idURole'] : '';
			$US_ActiveYN = isset($post['US_ActiveYN']) ? $post['US_ActiveYN'] : '';


        if(!empty($_POST))
        {
            $post = array_map('trim', array_map('strip_tags', $_POST));

			// ici téléphone fixe optionnel  v::optional(v::alpha())->validate(null); pas sûr que la syntaxe soit OK

            if (!v::email()->validate($post['US_email'])){
                $errors[] = 'L\'adresse mail est invalide'; // true
            }
            if (!v::stringType()->length(2, null)->validate($post['US_FirstName'])){
                $errors[] = 'Le prénom doit faire au minimum 2 caractères'; // true
            }
            if (!v::stringType()->length(2, null)->validate($post['US_Pseudo'])){
                $errors[] = 'Le pseudo/nom d\' artiste doit faire au minimum 2 caractères'; // true
            }
            if ((!v::Alnum()->length(8, null)->validate($post['US_Password'])) || ($post['US_Password'] != $post['mdp2'])) {
				$errors[] = 'Les 2 mots de passe ne concordent pas, ou ne font pas au minimum 8 caractères'; // true
            }

            if (!v::stringType()->length(2, null)->validate($post['US_LastName'])){
                $errors[] = 'Le prénom doit faire au minimum 2 caractères';  
            }
            if (!v::Alnum()->length(8, null)->validate($post['US_tel'])){
                $errors[] = 'Le numéro de téléphone est invalide'; // true
            }

            if (!preg_match("#^[12][0-9]{2}[0-1][0-9](2[AB]|[0-9]{2})[0-9]{3}[0-9]{3}[0-9]{2}$#",($post['AR_N_De_Securite_Sociale']))){
                $errors[] = 'Le numéro de Sécurité Sociale est incorrect'; // true
            }

			// ici date et format
			/*            if (!v::date('d-m-Y')->validate($post['AR_Date_De_Naissance'])){
                $errors[] = 'La date de naissance est incorrecte'; // true
            */
		} // Fin de  !empty
            if(count($errors) === 0){
                $authModel = new AuthentificationModel();
                $data = [
                	'US_id' => '',
                    'US_email' => $post['US_email'],
                    'US_FirstName' 	=> $post['US_FirstName'],
                    'US_LastName' 	=> $post['US_LastName'],
                    'US_Password' 	=> $authModel->hashPassword($post['US_Password']),
                    'US_Pseudo'		=> $post['US_Pseudo'],
                    'US_tel'		=> $post['US_tel'],
                    'US_idURole'		=> $post['US_idURole'],
                    'US_ActiveYN'		=> $post['US_ActiveYN'],
                ];
				
                $insert = $User->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

                if(!empty($insert)){
                    $formValid = true;
                }

            } 	//count($errors) === 0){
        

        $params = [
            // Dans la vue, les clés deviennent des variables
            'formValid' 	=> $formValid, 
            'formErrors'	=> $errors,
        ];
        // Si on oublie pas d' afficher tout ça dans la méthode show()
 //       $this->show('accueil', $params);
        // Après avoir affiché, va falloir se cogner la partie insertion en base


	} // fin de function connect


    public function updActu()
    {

    	// On bloque l'acccès à la page, uniquement pour les admins (id: 1) et les artistes (id: 3)
    	// $this->allowTo() Retourne true si l'id_role de l'utilisateur est dans la liste, sinon false (ou redirect vers page login si non connecté)
    	if($this->allowTo(['1', '3']) == false){ 
    		$this->showNotFound();
    	} // OK

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
                $errors[] = 'Le pseudo/nom d\' artiste doit faire au minimum 2 caractères'; // true
            }
            if (!v::email()->validate($post['AR_Adresse_Mail'])){
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
            if (!v::date('sd-m-Y')->validate($post['AR_Date_De_Naissance'])){
                $errors[] = 'La date de naissance est incorrecte'; // true
            }

            if (!v::stringType()->length(2, null)->validate($post['AR_Lieu_De_Naissance'])){
                $errors[] = 'Le lieu de naissance doit faire au minimum 3 caractères'; // true
            }

            if (!v::stringType()->length(2, null)->validate($post['AR_Nationalite'])){
                $errors[] = 'Le nationalité doit faire 2 caractères'; // true
            }
        } // not empty 
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

            } // count erreurs 
        

        $params = [
            // Dans la vue, les clés deviennent des variables
            'formValid' 	=> $formValid, 
            'formErrors'	=> $errors,
        ];
    
        // Si on oublie pas d' afficher tout ça dans la méthode show()
        $this->show('artistes', $params);
        // Après avoir affiché, va falloir se cogner la partie insertion en base
    }



} // fin de class UsersController OK


