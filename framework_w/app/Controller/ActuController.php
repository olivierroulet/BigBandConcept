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
		//SELECT `AC_Id`, `AC_Date`, `AC_DateFin`, `AC_Com1`, `AC_Com2`, `AC_Num`, `AC_Puce`, `AC_Lieu`, `AC_Adresse`, `AC_Code_Postal`, `AC_Notes`, `AC_Visibilite` FROM `actu`

               $data = [
               'reponses' => $reponses
                ];

        // Si on oublie pas d' afficher tout ça dans la méthode show()
        $this->show('actu/view', $data);
        // Après avoir affiché, va falloir se cogner la partie update en base

	} // fin de function Display


    public function actuDeact($AC_Id)
    {

        // On bloque l'acccès à la page, uniquement pour les admins (id: 1) et les artistes (id: 3)
        // $this->allowTo() Retourne true si l'id_role de l'utilisateur est dans la liste, sinon false (ou redirect vers page login si non connecté)
        if($this->allowTo(['1', '3']) == false){ 
            $this->showNotFound();
        }

        
        if(!is_numeric($AC_Id) || empty($AC_Id)){
            $this->showNotFound(); 
        }

        $Actu2 = new ActuModel();   // déplacé en début de function
        // Récupération de l'actualité courante (passée en ID)
        $current_news = $Actu2->find($AC_Id);
        $disable = $current_news['AC_Visibilite'];
        $update = [];
        if ($disable !== 'Restreint') {
            $disable = 'Restreint' ;
        }

        $data = [
            'AC_Visibilite' => $disable,
        ];
        $update = $current_news->update($data, (int) $AC_Id);

        $this->redirectToRoute('Actu_Display');        


    } // fin de function actuDeact



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

		$Actu2 = new ActuModel();	// déplacé en début de function
		// Récupération de l'actualité courante (passée en ID)
		$current_news = $Actu2->find($AC_Id);

		// if(empty($current_news)){
		// 	$this->showNotFound();

		// }

		// Formulaire de mise à jour
		$post2 = [];
        $data2 = [];
		$errors2 = [];
		$formValid2 = false;

        if(!empty($_POST)) // Lorsqu'on a reçu le submit d'un form
        {

            $post2 = array_map('trim', array_map('strip_tags', $_POST));
			$additionalChars2 = "AaÁáÂâCcĆćĈĉEeÉéÊêIiÍíÎî";
                 
            // if (!v::alnum()->length(2, null)->validate($post2['AC_Puce'])){
//                if (!v::optional(v::Alnum()->Alnum($additionalChars2)->validate($post2['AC_Com1'])){

/*            if (!v::Date()->validate($post2['AC_Date'])){
                $errors2[] = 'La date est invalide';    
            }
            if (!v::optional(v::Alnum())->Alnum($additionalChars2)->validate($post2['AC_Com1'])){       
                $errors2[] = 'Le 1er commentaire doit comporter au minimum 2 caractères'; 
            }
            if (!v::optional(v::Alnum()->length(2, null))->validate($post2['AC_Com2'])){
                $errors2[] = 'Le 2nd commentaire doit comporter au minimum 2 caractères'; 
			}*/

   //          if (v::optional(v::Alnum()->length(0, null))->validate($post2['AC_Num'])){
/*            if (!v::optional(v::Alnum()->Alnum($additionalChars2)->validate($post2['AC_Com1'])){            
                $errors2[] = 'Le numéro d\'évènement doit être compris entre 2 et 8 caractères'; 
			}	*/		
            /*
            if (!v::optional(v::Alnum()->length(2, null))->validate($post2['AC_Puce'])){
                $errors2[] = 'La puce doit comporter au minimum 2 caractères';  
            }
            if (!v::optional(v::Alnum()->length(2, null))->validate($post2['AC_Notes'])){
                $errors2[] = 'La note doit comporter au minimum 2 caractères'; 
            }
            if (!v::alnum($additionalChars2)->length(2, null)->validate($post2['AC_Adresse'])){
                $errors2[] = 'L\' adresse doit comporter au minimum 2 caractères';  
            }
            if (!v::intVal()->length(5, 5)->validate($post2['AC_Code_Postal'])){
                $errors2[] = 'Le code postal doit comporter 5 caractères';  
            }
            if (!v::alnum($additionalChars2)->length(2, null)->validate($post2['AC_Lieu'])){
                $errors2[] = 'Le lieu doit comporter au minimum 2 caractères';  
            }*/

            // Si on a pas d'erreurs, on met à jour
            if(count($errors2) === 0){
                $authModel2 = new AuthentificationModel();
                $toto2[]=1;
                $data2 = [
                    'AC_Date' 		=> $post2['AC_Date'],
                    'AC_DateFin'    => $post2['AC_DateFin'],
                    'AC_Com1' 		=> $post2['AC_Com1'],
                    'AC_Com2' 		=> $post2['AC_Com2'],
                    'AC_Num' 		=> $post2['AC_Num'],
                    'AC_Puce' 		=> $post2['AC_Puce'],
                    'AC_Notes' 		=> $post2['AC_Notes'],
                    'AC_Adresse' 	=> $post2['AC_Adresse'],
                    'AC_Code_Postal'=> $post2['AC_Code_Postal'],
                    'AC_Lieu' 		=> $post2['AC_Lieu'],
					'AC_Visibilite' => $post2['AC_Visibilite'],
                ];
				
                $update = $Actu2->update($data2, (int) $AC_Id); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

                if(!empty($update)){
                    $formValid2 = true;
                }
            } // fin de count($errors)
		} // Fin de  !empty


       $params2 = [
            // Dans la vue, les clés deviennent des variables
       		'current_news'	=> $current_news,
            'formValid' 	=> $formValid2, 
            'formErrors'	=> $errors2,
            'data'          => $post2,
        ];


       // Si on oublie pas d' afficher tout ça dans la méthode show()
        $this->show('actu/update', $params2);

	} // fin de function upd

	public function actuIns()
    {
    	// insertion d' un (nouvel) évènement
		$Actu = new ActuModel();	// déplacé en début de function	 	

		// Formulaire de mise à jour
		$post = [];
		$errors = [];
		$formValid = false;
		$data = [];

        if(!empty($_POST)) // Lorsqu'on a reçu un submit d'un form
        {
            $post = array_map('trim', array_map('strip_tags', $_POST));
			$additionalChars = "AaÁáÂâCcĆćĈĉEeÉéÊêIiÍíÎî";

			// Syntaxe de validation de champ optionnel ==> v::optional(v::alpha())->validate(null);  

/*            if (!v::Date()->validate($post['AC_Date'])){
                $errors[] = 'La date est invalide'; 
            }
            if (!v::alnum($additionalChars)->length(2, null)->validate($post['AC_Com1'])){
                $errors[] = 'Le 1er commmentaire doit comporter au minimum 2 caractères'; 
            }
            if (!v::alnum($additionalChars)->length(2, null)->validate($post['AC_Com2'])){
                $errors[] = 'Le 2nd commmentaire doit comporter au minimum 2 caractères'; 
			}
            if (!v::intval()->length(1, null)->validate($post['AC_Num'])){
                $errors[] = 'Le nombre au minimum 2 caractères'; 
			}			
            if (!v::stringType()->length(2, null)->validate($post['AC_Puce'])){
                $errors[] = 'La puce doit comporter au minimum 2 caractères';  
            }
            if (!v::alnum($additionalChars)->length(4, null)->validate($post['AC_Notes'])) {
                $errors[] = 'La note doit comporter au minimum 4 caractères'; 
            }
            if (!v::alnum($additionalChars)->length(2, null)->validate($post['AC_Adresse'])){
                $errors[] = 'L\' adresse doit comporter au minimum 2 caractères';  
            }
            if (!v::stringType()->length(5, 5)->validate($post['AC_Code_Postal'])){
                $errors[] = 'Le code postal doit comporter 5 caractères';  
            }
            if (!v::alnum($additionalChars)->length(2, null)->validate($post['AC_Lieu'])){
                $errors[] = 'Le lieu doit comporter au minimum 2 caractères';  
            }*/

            // Si on a pas d'erreurs, on insère
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
                    'AC_DateFin' => $post['AC_DateFin'],
                ];
				//  var_dump($data);
                $insert = $Actu->insert($data); // Retourne false si une erreur survient ou les nouvelles données insérées sous forme de array()

                if(!empty($insert)){
                $formValid = true;
                    $notif = [
                    'result' => true,
                    'success' => 'L\' évènement a bien été enregistré.',
                    ];
                }

                else {
                    $notif = [
                    'result' => false,
                    'errors' => 'Une erreur est survenue. Support en français et anglais au 3887 ou via le formulaire de contact',
                    ];
                }

            } // fin de count($errors)
		} // Fin de  !empty
        $this->flash('Bien entendu', 'info');
       $params = [
            // Dans la vue, les clés deviennent des variables
            'formValid' 	=> $formValid, 
            'formErrors'	=> $errors,
            'data'			=> $data,
            'notif'         => $notif,
        ];
       // Si on oublie pas d' afficher tout ça dans la méthode show() c'est encore MIEUXxxx !!!
        $this->show('actu/add', $params);

    }

} // fin de class UsersController OK




