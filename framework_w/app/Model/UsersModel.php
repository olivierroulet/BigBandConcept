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

	/**
	 * Teste si un utilisateur dont le nom est present en bdd a un password associé
	 * @param string $email L'email à tester
	 * @return mixed l'utilisateur si trouvé, false sinon
	 */

	public function emailExistsAndAuthorized($email)
	{

		$sql = 'SELECT * FROM ' . $this->table . 
		' WHERE US_email = :email AND US_AuthorizedYN=true LIMIT 1';

		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':email', $email);
		
		if($sth->execute()){
			$foundUser = $sth->fetch();
			if($foundUser){
				return $foundUser;
			}
		}

		return false;
	}

	public function update(array $data, $US_id, $stripTags = true)
	{
		if (!is_numeric($US_id)){
			return false;
		}
		
		$sql = 'UPDATE ' . $this->table . ' SET ';
		foreach($data as $key => $value){
			$sql .= "`$key` = :$key, ";
		}
		// Supprime les caractères superflus en fin de requète
		$sql = substr($sql, 0, -2);
		$sql .= ' WHERE ' . $this->primaryKey .' = :US_id';

		$sth = $this->dbh->prepare($sql);
		foreach($data as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(':'.$key, $value);
		}
		$sth->bindValue(':US_id', $US_id);

		if(!$sth->execute()){
			return false;
		}
		return $this->find($US_id);
	}

}