<?php

class alumnosModel extends Model
{
    public function __construct() {
        parent::__construct('alumno');
    }
	
	public function insertarAlumno($dni, $nombre, $apellido, $nacimiento, $colegio, $obra_social, $numero_afiliado, $observacion_medica, $notas, $id_grupo){
		$fecha_actual=date("d/m/Y");
		$rta = $this->_db->query("INSERT INTO alumnos VALUES(null,'".$nombre."','".$apellido."',".$dni.",".$nacimiento.",'".$colegio."','".$observacion_medica."','".$obra_social."','".$numero_afiliado."',null,'".$notas."','".$fecha_actual."',".$id_grupo.")");
		return $rta;
	}
	
	// ---------- GETTERS AND SETTERS ---------- //
	
	public function getAll(){
        $datos = $this->_db->query("SELECT * FROM alumnos ");
		if ($datos->rowCount() > 0){
        	return $datos->fetchall();
		}
		return false;
    }
	
	public function getAlumno($id_alumno){
        $datos = $this->_db->query(
                "SELECT * FROM alumnos WHERE id_alumno = ".$id_alumno
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
	
	
}

?>
