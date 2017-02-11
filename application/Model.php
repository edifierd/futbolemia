<?php

/*
 * -------------------------------------
 * www.dlancedu.com | Jaisiel Delance
 * framework mvc basico
 * Model.php
 * -------------------------------------
 */


class Model
{
    private $_registry;
    protected $_db;
	private $_model_name;
    
    public function __construct($modelName) {
        $this->_registry = Registry::getInstancia();
        $this->_db = $this->_registry->_db;
		$this->_model_name = $modelName;
    }
	
	private function setModelName($name){
		$this->_model_name = $name;
	}
	
	public function model_name(){
		return $this->_model_name;
	}
	
	public function last(){
		$elemento = $this->_db->query(
						"select * from ". $_model_name ."
						 ORDER BY id DESC
						 LIMIT 1
						 "
					);
					
		return $usuario->fetch();
	}
	
	
}

?>
