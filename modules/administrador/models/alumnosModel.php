<?php

class alumnosModel extends Model{
	
    public function __construct() {
        parent::__construct('alumnos');
    }
	
	public function insertarAlumno($dni, $nombre, $apellido, $nacimiento, $colegio, $obra_social, $numero_afiliado, $observacion_medica, $notas, $id_grupo){
		$fecha_actual=date("Y-m-d");
		$rta = $this->_db->query("INSERT INTO alumnos VALUES(null,'".$nombre."','".$apellido."',".$dni.",'".$nacimiento."','".$colegio."','".$observacion_medica."','".$obra_social."','".$numero_afiliado."',null,'".$notas."','".$fecha_actual."','a',".$id_grupo.")");
		return $rta;
	}
	
	public function delete($id){
        return $this->_db->query("UPDATE alumnos SET `estado` = 'e', `id_grupo` = 1 WHERE `id_alumno` = ".$id);
    }
	
	public function edit($id_alumno,$dni,$nacimiento,$colegio,$obra_social,$numero_afiliado,$observacion_medica,$id_grupo){
		$id_alumno = (int) $id_alumno;
		$sql = "UPDATE alumnos SET `dni` = ".$dni.", `nacimiento` = '".$nacimiento."',`colegio` = '".$colegio."',`obra_social` = '".$obra_social."', `num_afiliado` = '".$numero_afiliado."',`observacion_medica` = '".$observacion_medica."',`id_grupo` = ".$id_grupo." WHERE `id_alumno` = ".$id_alumno;
        $sql = $this->_db->query($sql);
		return $sql;
	}
	
	public function modificarImagen($nombreImagen, $datosAuxiliares){
		$id_alumno = (int) $datosAuxiliares[0];
		
		$alumno = $this->getAlumno($id_alumno);
		
		//Elimino las imagenes viejas
		if($alumno['certificado_fisico'] != ''){
			unlink(ROOT.'public/img/alumnos/'.$alumno['certificado_fisico']);
			unlink(ROOT.'public/img/alumnos/thumb/thumb_'.$alumno['certificado_fisico']);
		}
		
		$sql = "UPDATE alumnos SET `certificado_fisico` = '".$nombreImagen."' WHERE `id_alumno` = ".$id_alumno;
		$sql = $this->_db->query($sql);
		return $sql;
	}
	
	public function eliminarImagen($id_alumno){
				
		$alumno = $this->getAlumno($id_alumno);
		
		//Elimino las imagenes viejas
		if($alumno['certificado_fisico'] != ''){
			unlink(ROOT.'public/img/alumnos/'.$alumno['certificado_fisico']);
			unlink(ROOT.'public/img/alumnos/thumb/thumb_'.$alumno['certificado_fisico']);
		}
		
		$sql = "UPDATE alumnos SET `certificado_fisico` = null WHERE `id_alumno` = ".$id_alumno;
		$sql = $this->_db->query($sql);
		return $sql;
	}
	
	public function reactivar($id_alumno,$id_grupo){
		return $this->_db->query("UPDATE alumnos SET `estado` = 'a', `id_grupo` = ".$id_grupo." WHERE `id_alumno` = ".$id_alumno);
	}
	
	
	
	// ---------- GETTERS AND SETTERS ---------- //
	
	public function setNota($id_alumno,$nota){
		$id_alumno = (int) $id_alumno;
		$sql = "UPDATE alumnos SET `notas` = '".$nota."' WHERE `id_alumno` = ".$id_alumno;
        return $this->_db->query($sql);
	}
	
	public function getAll(){
        $datos = $this->_db->query("SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo ORDER BY a.estado ASC, a.apellido ASC, a.nombre ASC ");
		return $datos->fetchall();
    }
	
	public function getAlumno($id_alumno){
        $datos = $this->_db->query(
                "SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE a.id_alumno = ".$id_alumno
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
		if(!$casillero){
			$consulta = "SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo ";
		} else if($this->esDni($casillero)){
			$consulta = "SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE a.dni LIKE '%".$this->esDni($casillero)."%'";
		} else {
			$palabras = explode(" ", $casillero);
			$consulta = "SELECT * FROM alumnos a INNER JOIN grupos g ON a.id_grupo = g.id_grupo 
						 WHERE a.id_alumno IN (SELECT al.id_alumno FROM alumnos al WHERE concat_ws(' ',al.apellido,al.nombre) LIKE '%".$palabras[0]."%' )";
			for ($i = 1; $i < sizeof($palabras); $i++) {
   				$consulta = $consulta." AND a.id_alumno IN (SELECT al.id_alumno FROM alumnos al WHERE concat_ws(' ',al.apellido,al.nombre) LIKE '%".$palabras[$i]."%' )";
			}
			//$consulta = $consulta." AND a.estado = 'a'"; //Selecciono aquellos usuarios activos
		}
		if($sede != 'todos'){
			$consulta = $consulta." AND g.sede = '".$sede."'"; //Selecciono aquellos pertenecientes a una sede especifica
		}
		$consulta = $consulta."ORDER BY a.estado ASC, a.apellido ASC, a.nombre ASC";
		$datos = $this->_db->query($consulta); //Ejecuto la consulta
        return $datos->fetchall();
	}
	
	public function getResponsables($id_alumno){
		$consulta = "SELECT * FROM alumnos_responsables ar INNER JOIN responsables r ON ar.id_responsable = r.id_responsable WHERE ar.id_alumno = ".$id_alumno;
		$datos = $this->_db->query($consulta); //Ejecuto la consulta
        return $datos->fetchall();
	}
	
}

?>
