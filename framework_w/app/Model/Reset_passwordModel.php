<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class Reset_passwordModel extends \W\Model\Model // Attention à l' arborescence !!!
{

	protected $primaryKey = 'RP_id'; // cette variable permet de ne pas être coincé par w\Model.php 
	
}