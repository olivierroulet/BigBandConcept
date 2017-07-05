<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}


    public function backAdmin()
    {
        $this->show ('default/admin');
    }
    
}


	public function contact()
	{
		$this->show('#contact');
	}
}

