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

	/**
	 * Page d'accueil par défaut
	 */
	public function prestations()
	{
		$this->show('default/home#prestations');
	}

}