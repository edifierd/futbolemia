<?php

class gruposModel extends Model
{
    public function __construct() {
        parent::__construct('grupos');
    }
	
	public function insertarGrupo($sede, $tipo, $dias, $hoario){
		$rta = $this->_db->query("INSERT INTO grupos VALUES(null,'".$sede."','".$tipo."','".implode(",", $dias)."','".$hoario."')");
		return $rta;
	}
	
	public function deleteGrupo($id){
        $id = (int) $id;
		$sql2 = $this->_db->query("UPDATE alumnos SET `estado` = 'e', `id_grupo` = 1 WHERE `id_grupo` = ".$id);
		if($sql2){
			$rta = $this->_db->query("DELETE FROM grupos WHERE id_grupo = $id");
			return $rta;
		}
        return false;
    }
	
	// ---------- GETTERS AND SETTERS ---------- //
    
    public function getGrupos(){
		$datos = $this->_db->query("SELECT * FROM grupos WHERE id_grupo != 1 ORDER BY sede DESC, tipo DESC");
		return $datos->fetchall();
	}
	
	public function getGrupo($id_grupo){
		$datos = $this->_db->query("SELECT * FROM grupos WHERE id_grupo = ".$id_grupo);
		return $datos->fetch();
	}
	
	public function getGruposMenos($id_grupo){
		$datos = $this->_db->query("SELECT * FROM grupos WHERE id_grupo != ".$id_grupo." AND id_grupo != 1 ORDER BY sede DESC, tipo DESC");
		return $datos->fetchall();
	}
	
	public function getGruposSede($sede){
		if(!$sede){
			$datos = $this->_db->query("SELECT * FROM grupos WHERE id_grupo != 1 ");
		} else {
			$datos = $this->_db->query("SELECT * FROM grupos WHERE sede = '".$sede."' AND id_grupo != 1 ");
		}
		return $datos->fetchall();
	}
	
	public function getAlumnosGrupo($id_grupo){
		$datos = $this->_db->query("SELECT * FROM alumnos WHERE id_grupo = ".$id_grupo." AND id_grupo != 1 ORDER BY apellido ASC, nombre ASC");
		return $datos->fetchall();
	}

	
	// ---------- VALIDACIONES ---------- //
	
	public function getGrupoBy($sede, $tipo, $dias){
		$datos = $this->_db->query("SELECT * FROM grupos WHERE sede = '".$sede."' AND tipo = '".$tipo."' AND dias LIKE '".implode(",", $dias)."' AND id_grupo != 1 ");
		
		if ($datos->rowCount() > 0){
        	return $datos->fetch();
		}
		return false;
	}
	
	
	
}

?>
