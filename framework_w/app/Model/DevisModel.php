<?php

namespace Model;


/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class DevisModel extends \W\Model\Model // Attention à l' arborescence !!!
{

	public function __construct()
	{
		parent::__construct();
		$this->setPrimaryKey('DV_Iddevis'); // cette variable permet de ne pas être coincé par w\Model.php

	}


	/**
	 * Remonte les devis avec le statut 'à faire'
	 * @param string $statut -> le statut du devis à tester
	 * @return boolean true si présent en base de données, false sinon
	 */
	public function findAllWithStatut($statut)
	{
		if (!is_string($statut)){
			return false;
		}

		$sql = 'SELECT * FROM ' . $this->table . ' WHERE DV_Statut_Du_Devis = :statut';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':statut', $statut);
		$sth->execute();
		return $sth->fetchAll();
	}
}