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


/**
	 * Récupère toutes les lignes de la table employeur, liée à la table user
	 * @param $orderBy La colonne en fonction de laquelle trier
	 * @param $orderDir La direction du tri, ASC ou DESC
	 * @param $limit Le nombre maximum de résultat à récupérer
	 * @param $offset La position à partir de laquelle récupérer les résultats
	 * @return array Les données sous forme de tableau multidimensionnel
	 */
	public function findAllEmployeurs($orderBy = "", $orderDir = 'ASC', $limit = null, $offset = null)
	{
		$sql = 'SELECT * FROM ' . $this->table . ' INNER JOIN users on CL_ID_InUsersTable=US_Id ';
		
		
		if (!empty($orderBy)){

			if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
				die('Error: invalid orderBy param');
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != 'ASC' && $orderDir != 'DESC'){
				die('Error: invalid orderDir param');
			}
			if ($limit && !is_int($limit)){
				die('Error: invalid limit param');
			}

			if ($offset && !is_int($offset)){
				die('Error: invalid offset param');
			}

			if($orderBy!=''){
				$sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
			}
		}
		if($limit){
			$sql .= ' LIMIT '.$limit;
			if($offset){
				$sql .= ' OFFSET '.$offset;
			}
		}
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}
}