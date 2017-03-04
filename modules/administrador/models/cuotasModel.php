<?php

class cuotasModel extends Model{
	
    public function __construct() {
        parent::__construct('cuotas');
    }
	
	public function insertarCuota($id_alumno,$monto,$fechaMes,$fecha){
		$rta = $this->_db->query("INSERT INTO cuotas VALUES(null,".$id_alumno.",".$monto.",'".$fechaMes."','".$fecha."')");
		return $rta;
	}
	

	// ---------- GETTERS AND SETTERS ---------- //
    
	public function getCuotasAlumno($id_alumno,$año = false,$mes = false){
		if(!$año){
			$año = date("Y");
		}
		if(!$mes){
			$cuotasMes = array();
			for($i=3; $i<=12;$i++){
				$datos = $this->_db->query("SELECT * FROM cuotas WHERE id_alumno = ".$id_alumno." AND YEAR(fecha_mes) = '".$año."' AND MONTH(fecha_mes) = '".$i."' ");
				if ($datos->rowCount() > 0){
					$cuotasMes[$i] = $datos->fetch();
				} else {
					$cuotasMes[$i] = 'impago';
				}
			}
		} else {
			$mes = date("m");
			$datos = $this->_db->query("SELECT * FROM cuotas WHERE id_alumno = ".$id_alumno." AND YEAR(fecha_mes) = '".$año."' AND MONTH(fecha_mes) = '".$mes."' ");
			if ($datos->rowCount() > 0){
					$cuotasMes = $datos->fetch();
			} else {
					$cuotasMes = 'impago';
			}
		}
		return $cuotasMes;
	}

	
	
	// ---------- VALIDACIONES ---------- //
	
	public function mesPago($id_alumno,$año,$mes){
		$datos = $this->_db->query("SELECT * FROM cuotas WHERE id_alumno = ".$id_alumno." AND YEAR(fecha_mes) = '".$año."' AND MONTH(fecha_mes) = '".$mes."' ");
		if ($datos->rowCount() > 0){
			return true;
		} else {
			return false;
		}
	}
	
	
	
}

?>
