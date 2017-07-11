<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class GroupeinfoModel extends \W\Model\Model 
{

	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey('GI_ID'); 
	}
 	
}