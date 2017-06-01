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

  private function in_arreglo($aguja,$pajar){
    echo $aguja;
    foreach ($pajar as $value){
      echo "<br>";
      echo $pajar;
      if ($this->in_arreglo($aguja,$value)){
        echo "existe";
        return true;
      }
    }
    return false;
  }

	private function getUltimaDeuda($id_alumno){
    //array(array('fecha' => date("m/Y")));
		$retorno = array('fecha' => date("m/Y"));
		$rta = $this->_db->query("
      SELECT DATE_FORMAT(fecha_mes,'%m/%Y') AS fecha FROM cuotas WHERE id_alumno = ".$id_alumno." AND MONTH(fecha_mes) = MONTH(NOW()) AND YEAR(fecha_mes) = YEAR(NOW())"
    );
		if ($rta->rowCount() > 0){
      $retorno = $rta->fetch();
      //print_r($retorno[0]);
		}
		return $retorno;
	}

	public function getMesesAdeudados($id_alumno){
		$retorno = array();
    $ultimaDeuda = $this->getUltimaDeuda($id_alumno);
		$rta = $this->_db->query("
			SELECT DATE_FORMAT(a.fecha,'%m/%Y') AS fecha FROM asistencias a
			WHERE a.id_alumno = ".$id_alumno."
			AND NOT EXISTS (
					SELECT * FROM cuotas c
					WHERE c.id_alumno = a.id_alumno
					AND YEAR(c.fecha_mes) = YEAR(a.fecha) AND MONTH(c.fecha_mes) = MONTH(a.fecha)
				)
			GROUP BY MONTH(a.fecha) ");
    $retorno = $rta->fetchall();
		if ($rta->rowCount() > 0){
      $mesesAdeudados = $rta->fetchall();

      // var_dump($ultimaDeuda);
      // $this->in_arreglo($ultimaDeuda[0]['fecha'],$mesesAdeudados);
        if(!$this->in_arreglo($ultimaDeuda['fecha'],$mesesAdeudados)){
          $retorno = array_merge ($mesesAdeudados,$ultimaDeuda);

        } else {
          $retorno = $mesesAdeudados;
        }


		} else {
			$retorno = $ultimaDeuda;
		}
    print_r($retorno);
		return $retorno;
	}

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
