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
	 * Récupère toutes les lignes de la table
	 * @param $statut le statut des devis a chercher
	 * @param $orderBy La colonne en fonction de laquelle trier
	 * @param $orderDir La direction du tri, ASC ou DESC
	 * @param $limit Le nombre maximum de résultat à récupérer
	 * @param $offset La position à partir de laquelle récupérer les résultats
	 * @return array Les données sous forme de tableau multidimensionnel
	 */

	public function findAllDevis($statut = "", $orderBy = "", $orderDir = 'ASC', $limit = null, $offset = null)
	{
		$sql = 'SELECT * FROM ' . $this->table . ' INNER JOIN detail_devis on DE_Id_Devis=DV_Iddevis INNER JOIN detail_devis_2 on D2_Iddevis= DV_Iddevis INNER JOIN clients on DV_Idclient=CL_Idclient INNER JOIN users on CL_ID_InUsersTable=US_Id ';
		
		if (!empty($statut)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if ($statut && !is_string($statut)){
				die('Error: invalid limit param');
			}
			$sql .= ' WHERE DV_Statut_Du_Devis = :statut';
		}			

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
		if ($statut){
			$sth->bindValue(':statut', $statut);
		}
		$sth->execute();
		return $sth->fetchAll();
	}

     /**
     * Récupère la ligne suivante de celle de l'identifiant
     * @param $statut le statut des devis a chercher
	 * @param $orderBy La colonne en fonction de laquelle trier
	 * @param $orderDir La direction du tri, ASC ou DESC
	 * @param $limit Le nombre maximum de résultat à récupérer
	 * @param $offset La position à partir de laquelle récupérer les résultats
	 * @param $id integer l'identifiant actuel
	 * @return array Les données sous forme de tableau
	 */
/*     public function findNextDevis($statut = "", $orderBy = "", $orderDir = 'ASC', $limit = null, $offset = null, $id)
     {
     	if (!is_numeric($id)){
     		return false;
     	}

     	$sql = 'SELECT * FROM ' . $this->table . ' INNER JOIN detail_devis on DE_Id_Devis=DV_Iddevis INNER JOIN detail_devis_2 on D2_Iddevis= DV_Iddevis INNER JOIN clients on DV_Idclient=CL_Idclient INNER JOIN users on CL_ID_InUsersTable=US_Id WHERE DV_Iddevis = (SELECT MIN(DV_iddevis) FROM ' . $this->table . ' WHERE DV_Iddevis > :id ) ';

     	if (!empty($statut)){

			//sécurisation des paramètres, pour éviter les injections SQL
     		if ($statut && !is_string($statut)){
     			die('Error: invalid limit param');
     		}
     		$sql .= ' WHERE DV_Statut_Du_Devis = :statut';
     	}			

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
     	if ($statut){
     		$sth->bindValue(':statut', $statut);
     	}


     	$sth = $this->dbh->prepare($sql);
     	$sth->bindValue(':id', $id);
     	$sth->execute();
     	$result = $sth->fetch();
     }*/


 }








