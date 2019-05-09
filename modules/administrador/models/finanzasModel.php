<?php

class finanzasModel extends Model{

    public function __construct() {
        parent::__construct('finanzas');
    }

	public function generarFinanzasAñoSedes($año,$mes){
		$sedes = array('Los Hornos','El Retiro','La Cumbre');

		foreach($sedes as $sede){
			$datos = $this->_db->query( "SELECT * FROM finanzas WHERE sede = '".$sede."' AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' " );
	    	if ($datos->rowCount() == 0){
				$rta = $this->_db->query("INSERT INTO finanzas (id_finanza,fecha,sede) VALUES(null,'".$año."-".$mes."-01','".$sede."')");
			}
		}
	}

	public function getFinanzasSede($año,$sede){
		$finanzas = array();
		for($i=3; $i<=12;$i++){
			$datos = $this->_db->query( "SELECT * FROM finanzas WHERE sede = '".$sede."' AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$i."' " );
			$finanzas[$i] = $datos->fetch();
		}
		return $finanzas;
	}

	public function setFinanzasSede($id_finanza,$complejo,$profesores,$camisetas){
		$this->_db->query("UPDATE finanzas SET `complejo` = ".$complejo.", `profesores` = ".$profesores.", `camisetas` = ".$camisetas." WHERE id_finanza = ".$id_finanza);
	}

	/*
	NO LO UTILIZO LO HAGO DESDE EL MODELO DE REPORTES

	private function getTotalRecaudadoSede($sede,$año,$mes){
		$datos = $this->_db->query(
					  "SELECT IFNULL(SUM(r.recaudado),0) AS recaudado
					   FROM reportes r INNER JOIN grupos g ON r.id_grupo = g.id_grupo
					   WHERE g.sede = '".$sede."' AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$i."'" );
		$recaudado = $datos->fetch();
		return $recaudado['recaudado'];
	}*/


}

?>
