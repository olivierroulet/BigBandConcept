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

        $id = 1;


        $afficher = new GroupeInfoModel();
        $show = $afficher->find($id);
        $params = ['group' => $show];
            $this->show('views_admin/info_groupe', $params);

    }
    
    
    
    public function updateInfoGroupe()
    {
        if(isset($_POST) and !empty($_POST))
        {
           $post = array_map('trim', array_map('strip_tags', $_POST));
            
            $id = 1;
                
            $update = new GroupeinfoModel();
            $newupdate = $update->update($id);
            if($newupdate == true)
            {
                
                 $this->redirectToRoute('info_groupe');
                
            }
            
            
            
            
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
    }













}