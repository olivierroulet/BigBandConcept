<?php

namespace Controller;

use \W\Controller\Controller;
use Model\GroupeInfoModel;
use Model\Reset_passwordModel as token;
use \W\Security\AuthentificationModel;
use \W\Security\AuthorizationModel;
use Respect\Validation\Validator as v;
use PHPMailer as Mail;

// Cf http://respect.github.io/Validation/docs/date.html

class GroupeController extends \W\Controller\Controller
{

    public function listeInfoGroupe() 
    {
            $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        //        $get_id = htmlspecialchars($_GET['id']);
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }

        $id = 1;


        $afficher = new GroupeInfoModel();
        $show = $afficher->find($id);
        $params = ['group' => $show];
            $this->show('views_admin/info_groupe', $params);

    }
    
    
    
    public function updateInfoGroupe()
    {
            $me = $this->getUser(); // utilisateur connecté
        // on stocke son role
        //        $get_id = htmlspecialchars($_GET['id']);
        $roleUser=$me['US_idURole'];
        // Limite l'accès à la page à un utilisateur connecté et avec le role administrateur
        if(empty($me) || $roleUser !=1){
            $this->redirectToRoute('default_home'); // retour a l'accueil du site
        }
      
        if(!empty($_POST))
        {
           $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $id = 1;
                
            $data = [
                
                'GI_Name' => $post['GI_Name'],
                'GI_PhotoMainPagePath' => $post['GI_PhotoMainPagePath'],
                'GI_Logo' => $post['GI_Logo'],
                'GI_Address' => $post['GI_Address'],
                'GI_Addr_ZipCode' => $post['GI_Addr_ZipCode'],
                'GI_Addr_City' => $post['GI_Addr_City'],
                'GI_OpeningHours' => $post['GI_OpeningHours'],
                'GI_Comments' => $post['GI_Comments'],
                'GI_News' => $post['GI_News'],
  
            ];
            $update = new GroupeinfoModel();
            $newupdate = $update->update($data,$id);
            if($newupdate == true)
            {
                
                 $this->redirectToRoute('infogroupe');
                
            }
            
            
            
        }
        
        
        
        
         $id = 1;


        $afficher = new GroupeInfoModel();
        $show = $afficher->find($id);
        $params = ['group' => $show];
            $this->show('views_admin/update_info_groupe', $params);
        
        
        
    }













}