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
       debug($show);
        $params = ['group' => $show];
            $this->show('views_admin/info_groupe', $params);

    }














}