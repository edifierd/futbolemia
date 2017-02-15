<?php

class gruposModel extends Model
{
    public function __construct() {
        parent::__construct('grupos');
    }
	
	public function insertarGrupo($sede, $tipo, $dias, $hoario){
		$rta = $this->_db->query("INSERT INTO grupos VALUES(null,'".$sede."','".$tipo."','".implode(",", $dias)."','".$hoario."')");
		$this->error();
		return $rta;
	}
	
	public function deleteGrupo($id){
        $id = (int) $id;
		$rta = $this->_db->query("DELETE FROM grupos WHERE id_grupo = $id");
        return $rta;
    }
	
	// ---------- GETTERS AND SETTERS ---------- //
    
    public function getGrupos(){
		$datos = $this->_db->query("SELECT * FROM grupos ORDER BY sede DESC, tipo DESC");
		return $datos->fetchall();
	}
	
	public function getGrupo($id_grupo){
		$datos = $this->_db->query("SELECT * FROM grupos WHERE id_grupo = ".$id_grupo);
		return $datos->fetch();
	}
	
	
	// ---------- VALIDACIONES ---------- //
	
	public function getGrupoBy($sede, $tipo, $dias){
		$datos = $this->_db->query("SELECT * FROM grupos WHERE sede = '".$sede."' AND tipo = '".$tipo."' AND dias LIKE '".implode(",", $dias)."'");
		
		if ($datos->rowCount() > 0){
        	return $datos->fetch();
		}
		return false;
	}
	
	
	
}

?>
