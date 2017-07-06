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
	// 3 méthodes dans la classe : Display, upd & insert

    public function actuDisplay()
    {
    	// début des tests sur les droits du user
    	// isGranted pour savoir si le visiteur peut ins/upd l' actu
    	//Début de l' affichage sans condition
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
        $this->show('actu/view', $data);
        // Après avoir affiché, va falloir se cogner la partie update en base

	} // fin de function Display


    public function actuUpd($AC_Id)
    {

    	// On bloque l'acccès à la page, uniquement pour les admins (id: 1) et les artistes (id: 3)
    	// $this->allowTo() Retourne true si l'id_role de l'utilisateur est dans la liste, sinon false (ou redirect vers page login si non connecté)
/*		if($this->allowTo(['1', '3']) == false){ 
			$this->showNotFound();
		}
*/

		if(!is_numeric($AC_Id) || empty($AC_Id)){
			$this->showNotFound(); 
		}


		$Actu = new ActuModel();	// déplacé en début de function
		// Récupération de l'actualité courrante (passée en ID)
		$current_news = $Actu->find($AC_Id);
		//debug($current_news);
		if(empty($current_news)){
			$this->showNotFound();

		}



		// Formulaire de mise à jour
		$post = [];
		$errors = [];
		$formValid = false;

        if(!empty($_POST)) // Lorsqu'on a reçu un submit d'un form
        {
            $post = array_map('trim', array_map('strip_tags', $_POST));
			$additionalChars = "AaÁáÂâCcĆćĈĉEeÉéÊêIiÍíÎî";

			// ici téléphone fixe optionnel  v::optional(v::alpha())->validate(null); pas sûr que la syntaxe soit OK

            if (!v::Date()->validate($post['AC_Date'])){
                $errors[] = 'La date est invalide'; 
            }
            if (!v::alnum($additionalChars)->length(2, null)->validate($post['AC_Com1'])){
                $errors[] = 'Le 1er commmentaire doit faire au minimum 2 caractères'; 
            }
            if (!v::alnum($additionalChars)->length(2, null)->validate($post['AC_Com2'])){
                $errors[] = 'Le 2nd commmentaire  doit faire au minimum 2 caractères'; 
			}
            if (!v::intval()->length(1, null)->validate($post['AC_Num'])){
                $errors[] = 'Le chiffre au minimum 2 caractères'; 
			}			
            if (!v::stringType()->length(2, null)->validate($post['AC_Puce'])){
                $errors[] = 'La puce doit faire au minimum 2 caractères';  
            }
            if (!v::alnum($additionalChars)->length(4, null)->validate($post['AC_Notes'])) {
                $errors[] = 'La note doit faire au minimum 4 caractères'; 
            }
            if (!v::alnum($additionalChars)->length(2, null)->validate($post['AC_Adresse'])){
                $errors[] = 'L\' adresse doit faire au minimum 2 caractères';  
            }
            if (!v::stringType()->length(5, 5)->validate($post['AC_Code_Postal'])){
                $errors[] = 'Le code postal doit faire 5 caractères';  
            }
            if (!v::alnum($additionalChars)->length(2, null)->validate($post['AC_Lieu'])){
                $errors[] = 'Le lieu doit faire au minimum 2 caractères';  
            }

            // Si on a pas d'erreurs, on mets à jour
            if(count($errors) === 0){
                $authModel = new AuthentificationModel();
                $data = [
                    'AC_Date' 		=> $post['AC_Date'],
                    'AC_Com1' 		=> $post['AC_Com1'],
                    'AC_Com2' 		=> $post['AC_Com2'],
                    'AC_Num' 		=> $post['AC_Num'],
                    'AC_Puce' 		=> $post['AC_Puce'],
                    'AC_Notes' 		=> $post['AC_Notes'],
                    'AC_Adresse' 	=> $post['AC_Adresse'],
                    'AC_Code_Postal'=> $post['AC_Code_Postal'],
                    'AC_Lieu' 		=> $post['AC_Lieu'],
					'AC_Visibilite' => $post['AC_Visibilite'],
                ];
				
                $update = $Actu->update($data, (int) $AC_Id); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

                if(!empty($update)){
                    $formValid = true;
                }
            } // fin de count($errors)
		} // Fin de  !empty


       $params = [
            // Dans la vue, les clés deviennent des variables
       		'current_news'	=> $current_news,
            'formValid' 	=> $formValid, 
            'formErrors'	=> $errors,
        ];
       // Si on oublie pas d' afficher tout ça dans la méthode show()
        $this->show('actu/update', $params);

	} // fin de function upd

	public function actuIns()
    {
    	// insertion d' un (nouvel) évènement
	 	$this->show('actu/add', $data);
    }

} // fin de class UsersController OK




