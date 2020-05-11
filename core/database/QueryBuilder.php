<?php
/*
class QueryBuilder {

	protected $pdo;

	public function __construct(PDO $pdo) {

		$this->pdo = $pdo;
	}

	public function selectAll($table){

		$statement = $this->pdo->prepare("select * from {$table}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

	public function insert($table, $parameters){
		$sql = sprintf(
			'Insert into %s (%s) values (%s)',
			$table,
			implode(', ', array_keys($parameters)),
			':' . implode(', :', array_keys($parameters))

		);		

		try{

			$statement = $this->pdo->prepare($sql);
			$statement->execute($parameters);

		}catch(Exception $e){
			die($e->getMessage());
		}

	}

	public function selectAllOutcomes($table){

		$sql = 'SELECT k.kategoria as category_name, o.id_user, o.id_kategorii, o.kwota, o.data_wydatku, o.tagi, o.waluta, o.id_wydatku, o.nazwa_wydatku
			FROM ' . $table . ' o 
			LEFT JOIN kategorie k ON o.id_kategorii = k.id_kategorii
			ORDER BY o.data_wydatku DESC';
		
		$statement = $this->pdo->prepare($sql);

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}

}
*/