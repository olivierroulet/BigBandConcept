<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class OperateurModel extends \W\Model\Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey('OP_Idoperateur'); 
	}
 	
}