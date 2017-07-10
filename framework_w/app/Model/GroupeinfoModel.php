<?php

namespace Model;


/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class GroupeinfoModel extends \W\Model\Model // Attention à l' arborescence !!!
{

	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey('GI_Id'); // cette variable permet de ne pas être coincé par w\Model.php

	}
}
