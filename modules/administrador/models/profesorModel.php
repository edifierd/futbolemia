<?php

class profesorModel extends Item_model {
    public function __construct() {
        parent::__construct('profesor');
    }
    
    public function setDatos($datos){
		$this->_db->prepare(
                "insert into ". $this->model_name() ." values" .
                "(null, :nombre, :apellido, :dni)"
                )
                ->execute(array(
                    ':nombre' => $datos['nombre'],
                    ':apellido' => $datos['apellido'],
                    ':dni' => $datos['dni'],
                ));
		$profesor = $this->find_by_dni($datos['dni']);
		return $profesor['id'];
	}
	
	public function getItem($id){
		$profesor = $this->_db->query("
				SELECT i.nombre, i.apellido, i.dni
				FROM ". $this->model_name() ." i
				WHERE id = ".$id."
		 	");
        return $profesor->fetch();
	}
	
	public function eliminar($id){
		$datos = $this->_db->query("DELETE FROM ". $this->model_name() ." WHERE id = ".$id);
		if ($datos == false){
			return false;
		}
		return true;
	}
	
	public function find_by_dni($dni){
		$dni = (int) $dni;
		$profesor = $this->_db->query("
				SELECT *
				FROM ". $this->model_name() ."
				WHERE dni = ".$dni."
		 	");
        return $profesor->fetch();
	}
	
	
}

?>
