<?php

class responsablesModel extends Model{
	
    public function __construct() {
        parent::__construct('responsables');
    }
	
	public function insertarResponsable($parentesco,$dni,$nombre,$apellido,$tel_fijo,$tel_celular,$direccion,$correo,$id_alumno){
		$fecha_actual=date(DATE_ATOM);;
		$rta = $this->_db->query("INSERT INTO responsables VALUES(null,'".$nombre."','".$apellido."',".$dni.",".$tel_fijo.",".$tel_celular.",'".$direccion."','".$correo."','".$parentesco."','".$fecha_actual."')");
		$responsable = $this->getResponsableByDni($dni);
		$rta = $this->_db->query("INSERT INTO alumnos_responsables VALUES(null,".$id_alumno.",".$responsable['id_responsable'].")");
		return $rta;
	}
	
	public function delete($id){
        return $this->_db->query("UPDATE alumnos SET `estado` = 'e' WHERE `id_alumno` = ".$id);
    }
	
	public function agregarResponsable($id_responsable,$id_alumno){
		$rta = $this->_db->query("INSERT INTO alumnos_responsables VALUES(null,".$id_alumno.",".$id_responsable.")");
		return $rta;
	}
	
	// ---------- GETTERS AND SETTERS ---------- //
	
	public function getAll($id_alumno = false){
		if(!$id_alumno){
        	$datos = $this->_db->query("SELECT * FROM responsables");
		} else {
			$datos = $this->_db->query("SELECT * FROM responsables WHERE id_responsable NOT IN (
    									SELECT r.id_responsable FROM responsables r INNER JOIN alumnos_responsables ar ON ar.id_responsable = r.id_responsable 
										WHERE ar.id_alumno = ".$id_alumno.")");
		}
        return $datos->fetchall();
    }
	
	public function getResponsable($id_responsable){
        $datos = $this->_db->query(
                "SELECT * FROM responsables WHERE id_responsable = ".$id_responsable
                );
		if ($datos->rowCount() > 0){
        	return $datos->fetch();
		}
		return false;
    }
    
    public function getResponsableByDni($dni){
        $datos = $this->_db->query(
                "SELECT * FROM responsables WHERE dni = ".$dni
                );
		if ($datos->rowCount() > 0){
        	return $datos->fetch();
		}
		return false;
    }
	
	public function find($casillero, $id_alumno = false){
		if($this->esDni($casillero)){
			$consulta = "SELECT * FROM responsables WHERE id_responsable NOT IN (
    									SELECT r.id_responsable FROM responsables r INNER JOIN alumnos_responsables ar ON ar.id_responsable = r.id_responsable 
										WHERE ar.id_alumno = '".$id_alumno."') AND dni LIKE '%".$this->esDni($casillero)."%'";
		} else {
			$palabras = explode(" ", $casillero);
			$consulta = "SELECT * FROM responsables WHERE id_responsable NOT IN (
    									SELECT r.id_responsable FROM responsables r INNER JOIN alumnos_responsables ar ON ar.id_responsable = r.id_responsable 
										WHERE ar.id_alumno = '".$id_alumno."') AND id_responsable IN (SELECT re.id_responsable FROM responsables re WHERE concat_ws(' ',re.apellido,re.nombre) LIKE '%".$palabras[0]."%' )";
			for ($i = 1; $i < sizeof($palabras); $i++) {
   				$consulta = $consulta."AND id_responsable IN (SELECT re.id_responsable FROM responsables re WHERE concat_ws(' ',re.apellido,re.nombre) LIKE '%".$palabras[$i]."%' )";
			}
		}
		$datos = $this->_db->query($consulta);
		return $datos->fetchall();
	}	
	
}

?>
