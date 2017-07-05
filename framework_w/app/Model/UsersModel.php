<?php

namespace Model;


/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class UsersModel extends \W\Model\UsersModel // Attention à l' arborescence !!!
{

	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey('US_id'); // cette variable permet de ne pas être coincé par w\Model.php 

	}
	
	/**
	 * Teste si un utilisateur dont le nom est present en bdd a un password associé
	 * @param string $email L'email à tester
	 * @return boolean true si l'utilisateur n'a pas de password, false sinon
	 */
	public function passwordExists($email)
	{

	   $app = getApp();

	   $sql = 'SELECT * FROM ' . $this->table .
	          ' WHERE US_email = :email AND US_Password = :password';

	   $sth = $this->dbh->prepare($sql);
	   $sth->bindValue(':email', $email);
	   $sth->bindValue(':password', '');
		if($sth->execute()){
	       $foundUser = $sth->fetch();
	       if($foundUser){
	           return true;
	       }
	   }

	   return false;
	}

}