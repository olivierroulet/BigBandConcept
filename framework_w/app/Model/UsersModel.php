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

// liste des méthodes existantes
// getUserByUsernameOrEmail($usernameOrEmail)
// emailExists($email)	
// usernameExists($username)
// insérer 2 méthodes : insert & update la table artistes

// Dans Model:
// function insert(array $data, $stripTags = true)
// 	public function update(array $data, $id, $stripTags = true)






//	ci-dessous juste pour l'exemple
	/**
	 * Teste si un pseudo est présent en base de données
	 * @param string $username Le pseudo à tester
	 * @return boolean true si présent en base de données, false sinon
	 */
/*	public function usernameExists($username)
	{

	    $app = getApp();

	    $sql = 'SELECT ' . $app->getConfig('security_username_property') . ' FROM ' . $this->table .
	           ' WHERE ' . $app->getConfig('security_username_property') . ' = :username LIMIT 1';

	    $dbh = ConnectionModel::getDbh();
	    $sth = $dbh->prepare($sql);
	    $sth->bindValue(':username', $username);
	    if($sth->execute()){
	        $foundUser = $sth->fetch();
	        if($foundUser){
	            return true;
	        }
	    }

	    return false;
	}*/
}