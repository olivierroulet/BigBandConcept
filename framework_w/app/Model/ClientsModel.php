<?php

namespace Model;


/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class ClientsModel extends \W\Model\Model // Attention à l' arborescence !!!
{

	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey('CL_Idclient'); // cette variable permet de ne pas être coincé par w\Model.php 

	}

/**
	 * Récupère une ligne de la table en fonction d'un identifiant
	 * @param  integer Identifiant
	 * @return mixed Les données sous forme de tableau associatif
	 */
	public function findClientByIdUser($idUser)
	{
		if (!is_numeric($idUser)){
			return false;
		}

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE CL_ID_InUsersTable = :idUser LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':idUser', $idUser);
		$sth->execute();

		return $sth->fetch();
	}
}