<?php
/*
INSERT INTO asistencias VALUES(null,1,5,'2017-05-01','presente');
INSERT INTO asistencias VALUES(null,1,5,'2017-05-05','ausente');
INSERT INTO asistencias VALUES(null,1,5,'2017-05-09','presente');
INSERT INTO asistencias VALUES(null,1,5,'2017-05-13','ausente');
INSERT INTO asistencias VALUES(null,1,5,'2017-05-17','presente');
INSERT INTO asistencias VALUES(null,1,5,'2017-05-23','ausente');
INSERT INTO asistencias VALUES(null,1,5,'2017-05-26','presente');
INSERT INTO asistencias VALUES(null,1,5,'2017-05-29','ausente');
INSERT INTO asistencias VALUES(null,1,5,'2017-05-30','ausente');
*/

class asistenciasModel extends Model{
	
    public function __construct() {
        parent::__construct('asistencias');
    }
	
	public function insertarAsistencia($id_alumno,$id_grupo,$fecha,$valor){
		$rta = $this->_db->query("INSERT INTO asistencias VALUES(null,".$id_alumno.",".$id_grupo.",'".$fecha."','".$valor."')");
		return $rta;
	}
	

	// ---------- GETTERS AND SETTERS ---------- //
    
	public function getAsistenciasAlumno($id_alumno,$año = false,$mes = false){
		if(!$año){
			$año = date("Y");
		}
		if(!$mes){
			$asistenciasMes = array();
			for($i=1; $i<=12;$i++){
				$datos = $this->_db->query(
				   "SELECT * FROM asistencias a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE id_alumno = ".$id_alumno." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$i."' "
				);
				$asistenciasMes[$i] = $datos->fetchall();
			}
		} else {
			$datos = $this->_db->query(
				"SELECT * FROM asistencias a INNER JOIN grupos g ON a.id_grupo = g.id_grupo WHERE id_alumno = ".$id_alumno." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' "
			);
			$asistenciasMes = $datos->fetchall();
		}
		return $asistenciasMes;
	}
	
	public function getCantAsistenciasAlumno($id_alumno,$año = false,$mes = false){
		if(!$año){
			$año = date("Y");
		}
		if(!$mes){
			$asistenciasMes = array();
			for($i=1; $i<=12;$i++){
				$datos = $this->_db->query("SELECT count(IF(valor = 'presente', 1, NULL)) as cantidad 
											FROM asistencias 
											WHERE id_alumno = ".$id_alumno." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$i."' ");
				$datos = $datos->fetch();
				$asistenciasMes[$i] = $datos['cantidad'];
			}
		} else {
			$mes = date("m");
			$datos = $this->_db->query("SELECT count(IF(valor = 'presente', 1, NULL)) as cantidad 
											FROM asistencias 
											WHERE id_alumno = ".$id_alumno." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' ");
			$datos = $datos->fetch();
			$asistenciasMes = $datos['cantidad'];
		}
		return $asistenciasMes;
	}
	
	public function getCantClasesAlumno($id_alumno,$año = false,$mes = false){
		if(!$año){
			$año = date("Y");
		}
		if(!$mes){
			$asistenciasMes = array();
			for($i=1; $i<=12;$i++){
				$datos = $this->_db->query("SELECT count(id_alumno) as cantidad 
											FROM asistencias 
											WHERE id_alumno = ".$id_alumno." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$i."' ");
				$datos = $datos->fetch();
				$asistenciasMes[$i] = $datos['cantidad'];
			}
		} else {
			$mes = date("m");
			$datos = $this->_db->query("SELECT count(id_alumno) as cantidad 
											FROM asistencias 
											WHERE id_alumno = ".$id_alumno." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' ");
			$datos = $datos->fetch();
			$asistenciasMes = $datos['cantidad'];
		}
		return $asistenciasMes;
	}

	
	
	// ---------- VALIDACIONES ---------- //
	
	public function getGrupoBy($sede, $tipo, $dias){
		$datos = $this->_db->query("SELECT * FROM grupos WHERE sede = '".$sede."' AND tipo = '".$tipo."' AND dias LIKE '".implode(",", $dias)."' AND id_grupo != 1 ");
		
		if ($datos->rowCount() > 0){
        	return $datos->fetch();
		}
		return false;
	}
	
	public function asistenciaValida($id_grupo,$fecha){
		$datos = $this->_db->query("SELECT * FROM asistencias WHERE id_grupo = ".$id_grupo." AND fecha = '".$fecha."'");
		if ($datos->rowCount() > 0){
        	return false;
		}
		return true;

	}
	
	
	
}

?>
