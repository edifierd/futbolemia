<?php

class reportesModel extends Model{
	
    public function __construct() {
        parent::__construct('reportes');
    }
	
	public function generarPorGrupo($id_reporte){
		$datos = $this->_db->query(
				   "SELECT * FROM reportes r INNER JOIN grupos g ON r.id_grupo = g.id_grupo WHERE id_reporte = ".$id_reporte
				);
		$reporte = $datos->fetch();
		$año = date("Y", strtotime($reporte['fecha'])); 
		$mes = date("m", strtotime($reporte['fecha']));  
		$id_grupo = $reporte['id_grupo'];
		
		// CANTIDAD DE CHICOS //
		$cantChicos = $this->getCantidadChicos($id_grupo,$año,$mes);
		
		// DIFERENCIA CANTIDAD DE CHICOS (Mes actual - Mes Anterior) //
		$diferenciaMes = $this->getDiferenciaChicosMes($id_grupo,$año,$mes);
		
		// DIFERENCIA CANTIDAD DE CHICOS AÑO (Febrero/2017) - (Febrero/2016) //
		$diferenciaAño = $this->getDiferenciaChicosAño($id_grupo,$año,$mes);
		
		// CHICOS QUE SIGUEN -> 'Tienen asistencia en el mes pasado y en el actual' //
		$chicosSiguen = $this->getCantidadChicosSiguen($id_grupo,$año,$mes);
		
		// CHICOS QUE PAGARON //
		$chicosPagaron = $this->chicosPagaron($id_grupo,$año,$mes);;
		
		// CHICOS QUE ADEUDAN //
		$chicosAdeudan = $this->chicosAdeudan($id_grupo,$año,$mes);
		
		// MONTO RECAUDADO //
		$recaudado = $this->montoRecaudado($id_grupo,$año,$mes);
																	  
		$sql = "UPDATE reportes SET `chicos` = ".$cantChicos.",
									`dif_mes` = ".$diferenciaMes.",
									`dif_anual` = ".$diferenciaAño.",
									`siguen` = ".$chicosSiguen.",
									`pagaron` = ".$chicosPagaron.",
									`deben` = ".$chicosAdeudan.",
									`recaudado` = ".$recaudado."	
		        WHERE `id_reporte` = ".$id_reporte;
        $sql = $this->_db->query($sql);	
		return $sql;
	}
	
	public function getCantidadChicos($id_grupo,$año,$mes){
		$cantChicos = $this->_db->query(
				   "SELECT COUNT(*) AS cant FROM alumnos a WHERE id_grupo = ".$id_grupo." AND EXISTS (SELECT * 
				   																				  FROM asistencias asi 
																								  WHERE asi.id_alumno = a.id_alumno 
																								  AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."'
							              														  )" );
		$cantChicos = $cantChicos->fetch();	
		return $cantChicos['cant'];
	}
	
	public function getDiferenciaChicosAño($id_grupo,$año,$mes){
		$añoActual = $this->getCantidadChicos($id_grupo,$año,$mes);
		$año = $año - 1;
		$diferencia = $añoActual - $this->getCantidadChicos($id_grupo,$año,$mes); 
		return $diferencia;
	}
	
	public function getDiferenciaChicosMes($id_grupo,$año,$mes){
		$mesActual = $this->getCantidadChicos($id_grupo,$año,$mes);
		if($mes = 1){
			$año = $año - 1;
			$mes = 12;
		} else {
			$mes = $mes - 1;
		}
		$diferencia = $mesActual - $this->getCantidadChicos($id_grupo,$año,$mes); 
		return $diferencia;
	}
	
	public function getCantidadChicosSiguen($id_grupo,$año,$mes){
		if($mes = 1){
			$añoA = $año - 1;
			$mesA = 12;
		} else {
			$mesA = $mes - 1;
		}
		$cantChicos = $this->_db->query(
				   "SELECT COUNT(*) AS cant FROM alumnos a WHERE id_grupo = ".$id_grupo." AND EXISTS (SELECT * 
				   																				  FROM asistencias asi 
																								  WHERE asi.id_alumno = a.id_alumno 
																								  AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."'
							              														  )
																						  AND EXISTS (SELECT * 
				   																				  FROM asistencias asi 
																								  WHERE asi.id_alumno = a.id_alumno 
																								  AND YEAR(fecha) = '".$añoA."' AND MONTH(fecha) = '".$mesA."'
							              														  ) ");
																								  
		$cantChicos = $cantChicos->fetch();	
		return $cantChicos['cant'];
	}
	
	public function chicosPagaron($id_grupo,$año,$mes){
		$cantChicos = $this->_db->query("SELECT COUNT(*) AS cant FROM alumnos a WHERE id_grupo = ".$id_grupo." AND EXISTS (SELECT * FROM cuotas c 
																										   WHERE c.id_alumno = a.id_alumno
																										   AND YEAR(c.fecha_mes) = '".$año."' AND MONTH(c.fecha_mes) = '".$mes."'
																										   )");
	    $cantChicos = $cantChicos->fetch();	
		return $cantChicos['cant'];
	}
	
	public function chicosAdeudan($id_grupo,$año,$mes){
		$cantChicos = $this->_db->query("SELECT COUNT(*) AS cant FROM alumnos a WHERE id_grupo = ".$id_grupo." AND NOT EXISTS (SELECT * FROM cuotas c 
																										   WHERE c.id_alumno = a.id_alumno
																										   AND YEAR(c.fecha_mes) = '".$año."' AND MONTH(c.fecha_mes) = '".$mes."'
																										   )");
	    $cantChicos = $cantChicos->fetch();	
		return $cantChicos['cant'];
	}
	
	public function montoRecaudado($id_grupo,$año,$mes){
		$recaudado = $this->_db->query("SELECT SUM(c.monto) AS recaudado 
										FROM alumnos a INNER JOIN grupos g ON  a.id_grupo = g.id_grupo INNER JOIN cuotas c ON c.id_alumno = a.id_alumno
										WHERE g.id_grupo = ".$id_grupo." AND YEAR(c.fecha_mes) = '".$año."' AND MONTH(c.fecha_mes) = '".$mes."'");
		$recaudado = $recaudado->fetch();	
		return $recaudado['recaudado'];
	}

	public function nuevoAlumno($id_grupo){
		$año = date("Y");
		$mes = date("m");
		$datos = $this->_db->query(
				   "SELECT * FROM reportes WHERE id_grupo = ".$id_grupo." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' "
				);
	    if ($datos->rowCount() > 0){
			$reporte = $datos->fetch();
			$this->_db->query("UPDATE reportes SET `nuevos` = nuevos + 1 WHERE id_reporte = ".$reporte['id_reporte']);
		} else {
			$rta = $this->_db->query("INSERT INTO reportes (id_reporte,fecha,nuevos,id_grupo) VALUES(null,'".$this->fecha()."',1,".$id_grupo.")");
		}
	}
	
	public function dejoAlumno($id_grupo){
		$año = date("Y");
		$mes = date("m");
		$datos = $this->_db->query(
				   "SELECT * FROM reportes WHERE id_grupo = ".$id_grupo." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' "
				);
	    if ($datos->rowCount() > 0){
			$reporte = $datos->fetch();
			$this->_db->query("UPDATE reportes SET `dejaron` = dejaron + 1 WHERE id_reporte = ".$reporte['id_reporte']);
		} else {
			$rta = $this->_db->query("INSERT INTO reportes (id_reporte,fecha,dejaron,id_grupo) VALUES(null,'".$this->fecha()."',1,".$id_grupo.")");
		}
	}
	
	public function volvioAlumno($id_grupo){
		$año = date("Y");
		$mes = date("m");
		$datos = $this->_db->query(
				   "SELECT * FROM reportes WHERE id_grupo = ".$id_grupo." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' "
				);
	    if ($datos->rowCount() > 0){
			$reporte = $datos->fetch();
			$this->_db->query("UPDATE reportes SET `volvieron` = volvieron + 1 WHERE id_reporte = ".$reporte['id_reporte']);
		} else {
			$rta = $this->_db->query("INSERT INTO reportes (id_reporte,fecha,volvieron,id_grupo) VALUES(null,'".$this->fecha()."',1,".$id_grupo.")");
		}
	}
	
	public function generarReportesAñoSedes($año,$mes){
		$datos = $this->_db->query("SELECT * FROM grupos ");
		$grupos = $datos->fetchall();
		foreach ($grupos as $grupo) {
			$datos = $this->_db->query( "SELECT * FROM reportes WHERE id_grupo = ".$grupo['id_grupo']." AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' " );
	    	if ($datos->rowCount() == 0){
				$rta = $this->_db->query("INSERT INTO reportes (id_reporte,fecha,id_grupo) VALUES(null,'".$año."-".$mes."-01',".$grupo['id_grupo'].")");
			}
		}
	}
	

	// ---------- GETTERS AND SETTERS ---------- //
    
	public function getReportes($año,$sede,$mes=false){ //Busca los reportes de una Sede de un año por Mes
		if(!$año){
			$año = date("Y");
		}
		if(!$mes){
			$reportes = array();
			for($i=3; $i<=12;$i++){
				$datos = $this->_db->query(
					  "SELECT * FROM reportes r INNER JOIN grupos g ON r.id_grupo = g.id_grupo WHERE g.sede = '".$sede."' AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$i."' "
				);
				$reportes[$i] = $datos->fetchall();
			}
		} else {
			$datos = $this->_db->query(
					  "SELECT * FROM reportes r INNER JOIN grupos g ON r.id_grupo = g.id_grupo WHERE g.sede = '".$sede."' AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."' "
				);
		    $reportes = $datos->fetchall();
		}
		return $reportes;
	}
	
	
	public function getReportesGeneral($año,$sede,$mes=false){ //Busca los reportes de una Sede de un año por Mes
		if(!$año){
			$año = date("Y");
		}
		if(!$mes){
			$reportes = array();
			for($i=3; $i<=12;$i++){
				$datos = $this->_db->query(
					  "SELECT IFNULL(SUM(r.chicos),0) AS chicos, IFNULL(SUM(r.dif_mes),0) AS dif_mes, IFNULL(SUM(r.dif_anual),0) AS dif_anual, 
					          IFNULL(SUM(r.nuevos),0) AS nuevos, IFNULL(SUM(r.siguen),0) AS siguen, IFNULL(SUM(r.dejaron),0) AS dejaron, 
							  IFNULL(SUM(r.volvieron),0) AS volvieron, IFNULL(SUM(r.pagaron),0) AS pagaron, IFNULL(SUM(r.deben),0) AS deben,
							  IFNULL(SUM(r.recaudado),0) AS recaudado  
					   FROM reportes r INNER JOIN grupos g ON r.id_grupo = g.id_grupo 
					   WHERE g.sede = '".$sede."' AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$i."'" );
				$reportes[$i] = $datos->fetch();
			}
		} else {
			$datos = $this->_db->query(
					  "SELECT SUM(r.chicos) AS chicos, SUM(r.dif_mes) AS dif_mes, SUM(r.dif_anual) AS dif_anual, SUM(r.nuevos) AS nuevos, SUM(r.siguen) AS siguen, 
					  		  SUM(r.dejaron) AS dejaron, SUM(r.volvieron) AS volvieron, SUM(r.pagaron) AS pagaron, SUM(r.deben) AS deben 
					   FROM reportes r INNER JOIN grupos g ON r.id_grupo = g.id_grupo 
					   WHERE g.sede = '".$sede."' AND YEAR(fecha) = '".$año."' AND MONTH(fecha) = '".$mes."'" );
		    $reportes = $datos->fetch();
		}
		return $reportes;
	}
	
	
	
	

	
	
	
}

?>
