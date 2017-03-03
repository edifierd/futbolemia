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
	
	public function error(){
		print_r($this->_db->errorInfo());
	}
	
	// ---------- FUNCIONES AUXILIARES ---------- //
	
	protected function esDni($dni){
		if (!filter_var($dni, FILTER_VALIDATE_INT) === false) {
    		$dni = filter_var($dni, FILTER_VALIDATE_INT);
			if (strlen($dni) > 6 && strlen($dni) < 9){
           		return $dni;
			} 
		}
		return false;
    }
	
	public function fecha(){
		return date(DATE_ATOM);
	}
	
}

?>
