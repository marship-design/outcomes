<?php

class Model {

    protected $_db;
    private $_result, $_error = false;

    public function __construct(){

		$this->_db = DB::getInstance();       
	}
	
	public function selectAll($table, $sql = ""){

		if($sql == ""){
			$sql = "SELECT * FROM {$table}";
		}
		return $this->_db->query($sql, [], true)->results();
	}

	

    public function find($table, $conditions = [] ){    

        $sql = "SELECT * FROM  {$table}  WHERE {$conditions['conditions']}";
		$bindValue = $conditions['bind'];
		if(is_array($bindValue)){
			return $this->_db->query($sql, $bindValue, true)->results();
		} else {

			return $this->_db->query($sql, [$bindValue], true)->results();
		}
	}

	
	public function update($table, $id, $fields, $conditions){

        $fieldsString = '';
        $values = [];
		
        foreach($fields as $field => $value){
			$fieldsString .= ' ' . $field . ' = ?,';
            $values[] = $value;
		}
		$values[] = $id;

        $fieldsString = trim($fieldsString);
        $fieldsString = rtrim($fieldsString, ',');
		$sql = "UPDATE {$table} SET {$fieldsString} WHERE {$conditions['conditions']}";

        if(!$this->_db->query($sql, $values, false)->error()){
            return true;
        }
        return false;
    }
	
	public function results(){
        return $this->_result;
    }
	
	public function insert($table, $fields = []){
		
		$fieldsString = '';
		$valueString = '';
		$values = [];

		foreach($fields as $field => $value){
			$fieldsString .= '`' . $field . '`,';
			$valueString .= '?,';
			$values[] = $value;
		}

		$fieldsString = rtrim($fieldsString, ',');
		$valueString = rtrim($valueString, ',');

		$sql = 	"INSERT INTO {$table} ({$fieldsString}) VALUES ({$valueString})";

		if($this->_db->query($sql, $values, false)->error()){
			return true;
		}
		return false;
	}

	  public function delete($table, $conditions){

		$sql = "DELETE FROM {$table} WHERE {$conditions['conditions']}";
		
		$bindValue = $conditions['bind'];
        if($this->_db->query($sql,$bindValue,false)->error()){
            return true;
        }
        return false;
	}
	
	
	


}