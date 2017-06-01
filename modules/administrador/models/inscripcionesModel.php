<?php

class inscripcionesModel extends Model{

  public function __construct() {
      parent::__construct('inscripcion');
  }

	public function insertarInscripcion($id_alumno,$monto){
		$fecha_actual=date(DATE_ATOM);
		$rta = $this->_db->query("INSERT INTO inscripciones VALUES(null,'".$fecha_actual."',".$id_alumno.",".$monto.")");
		return $rta;
	}


	// ---------- GETTERS AND SETTERS ---------- //

  public function getInscripcion($id_alumno){
		$id_alumno = (int) $id_alumno;
		$datos = $this->_db->query("SELECT * FROM inscripciones WHERE `id_alumno` = ".$id_alumno." AND YEAR(fecha) = YEAR(NOW())");
		return $datos->fetch();
	}

  public function getMontoInscripcionesSede($año,$sede){
    $inscripciones = array();
		for($i=3; $i<=12;$i++){
			$datos = $this->_db->query("
        SELECT SUM(i.monto) AS monto FROM inscripciones i
        INNER JOIN alumnos a ON i.id_alumno = a.id_alumno
        INNER JOIN grupos g ON g.id_grupo = a.id_grupo
        WHERE g.sede = '".$sede."' AND MONTH(i.fecha) = ".$i." AND YEAR(i.fecha) = ".$año."
      ");
			$inscripciones[$i] = $datos->fetch();
		}
		return $inscripciones;
	}

  public function getMontoInscripcionesGrupo($mes,$año,$grupo){
		$datos = $this->_db->query("
      SELECT IFNULL(SUM(i.monto),0) AS monto FROM inscripciones i
      INNER JOIN alumnos a ON i.id_alumno = a.id_alumno
      WHERE a.id_grupo = ".$grupo." AND MONTH(i.fecha) = ".$mes." AND YEAR(i.fecha) = ".$año."
    ");
    $datos = $datos->fetch();
		return $datos['monto'];
	}



}

?>
