<?php

class responsablesModel extends Model{
	
    public function __construct() {
        parent::__construct('responsables');
    }
	
	public function insertarAlumno($dni, $nombre, $apellido, $nacimiento, $colegio, $obra_social, $numero_afiliado, $observacion_medica, $notas, $id_grupo){
		$fecha_actual=date(DATE_ATOM);;
		$rta = $this->_db->query("INSERT INTO alumnos VALUES(null,'".$nombre."','".$apellido."',".$dni.",'".$nacimiento."','".$colegio."','".$observacion_medica."','".$obra_social."','".$numero_afiliado."',null,'".$notas."','".$fecha_actual."','a',".$id_grupo.")");
		return $rta;
	}
	
	public function delete($id){
        return $this->_db->query("UPDATE alumnos SET `estado` = 'e' WHERE `id_alumno` = ".$id);
    }
	
	// ---------- GETTERS AND SETTERS ---------- //
	
	public function getAll(){
        $datos = $this->_db->query("SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE a.estado = 'a' ");
		if ($datos->rowCount() > 0){
        	return $datos->fetchall();
		}
		return false;
    }
	
	public function getAlumno($id_alumno){
        $datos = $this->_db->query(
                "SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE a.id_alumno = ".$id_alumno." AND a.estado = 'a' "
                );
		if ($datos->rowCount() > 0){
        	return $datos->fetch();
		}
		return false;
    }
    
    public function getAlumnoByDni($dni){
        $datos = $this->_db->query(
                "SELECT * FROM alumnos WHERE dni = ".$dni
                );
		if ($datos->rowCount() > 0){
        	return $datos->fetch();
		}
		return false;
    }
	
	public function find($sede,$casillero = false){
		if($sede == 'todos'){
			if(!$casillero){
				$datos = $this->_db->query("SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE a.estado = 'a' ");
			} else {
				$datos = $this->_db->query("SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE a.nombre LIKE '%".$casillero."%'
																													  OR a.apellido LIKE '%".$casillero."%'
																													  OR a.dni LIKE '%".$casillero."%'
																													  AND a.estado = 'a' ");
			}
		} else {
			$datos = $this->_db->query("SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE a.estado = 'a' AND g.sede = '".$sede."'");
			$datos = $this->_db->query("SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE a.nombre LIKE '%".$casillero."%'
																													  OR a.apellido LIKE '%".$casillero."%'
																													  OR a.dni LIKE '%".$casillero."%'
																													  AND a.estado = 'a' 
																													  AND g.sede = '".$sede."'");
		}
		if ($datos->rowCount() > 0){
        	return $datos->fetchall();
		}
		return false;
	}
	
	
}

?>
