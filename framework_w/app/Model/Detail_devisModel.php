<?php

namespace Model;


/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class Detail_devisModel extends \W\Model\Model 


{

	public function __construct()
	{
		parent::__construct();

		$this->setPrimaryKey('DE_Iddetaildudevis'); 
	}
 	
}
