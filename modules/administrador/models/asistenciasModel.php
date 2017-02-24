<?php

class asistenciasModel extends Model{
	
    public function __construct() {
        parent::__construct('grupos');
    }
	
	public function insertarAsistencia($id_alumno,$id_grupo,$fecha,$valor){
		$rta = $this->_db->query("INSERT INTO asistencias VALUES(null,".$id_alumno.",".$id_grupo.",'".$fecha."','".$valor."')");
		return $rta;
	}
	

	// ---------- GETTERS AND SETTERS ---------- //
    

	
	
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
