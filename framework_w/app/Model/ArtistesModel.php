<?php

namespace W\Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class ArtistesModel extends UsersModel
{
	/**
	 * Constructeur
	 */
/*	public function __construct(){
		$app = getApp();
		// Définit la table en fonction de la config
		$this->setTable($app->getConfig('security_user_table'));

		$this->dbh = ConnectionModel::getDbh();
	}*/

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