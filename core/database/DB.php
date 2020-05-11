<?php

class DB {

    private static $_instance = null;
    private $_config;
    private $_pdo, $_query, $_error = false, $_result;

    private function __construct() {
        
        $this->_config = App::get('config')['database'];

        try{
            $this->_pdo = new PDO(
            $this->_config['connection'].';dbname='.$this->_config['name'].';charset='.$this->_config['charset'],
            $this->_config['username'],
            $this->_config['password'],
            $this->_config['options']
			);
        } catch(PDOException $e){

            die($e->getMessage());            
        }
    }

    public static function getInstance(){

        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function getPDO(){

        return $this->_pdo;
    }

    public function query($sql, $params = [], $fetch = true){

		$this->_error = false;

		if($this->_query = $this->_pdo->prepare($sql)){
			$x = 1;
			if(count($params)){
				foreach($params as $param){
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}

			if($this->_query->execute()){
                if($fetch){
                    $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);

                }else{
                   // $this->_result = $this->_query->fetchAll(); //we don't fetch anything during SQL update and delete

                }                
            }else{
				$this->_error = true;
			}
		}

		return $this;
	}


    public function results(){
        return $this->_result;
    }
	
      

    public function error(){
        return $this->_error;
    }
}