<?php

class reportesController extends administradorController{
	
	private $_reportes;
	private $_finanzas;
	
    public function __construct() {
        parent::__construct();
		$this->_reportes = $this->loadModel('reportes');
		$this->_finanzas = $this->loadModel('finanzas');
    }
	
	public function index(){
		$this->redireccionar('administrador/reportes/lista/'.$año = date("Y").'/Los_Hornos');
	}
    
    public function lista($año=false,$sede=false){
		$this->_acl->acceso('control_asistencias');
		
		$this->_view->assign('titulo', 'Reportes estadisticos');
		$this->_view->assign('listaAnios', $this->getListaAnios(50));
		$this->_view->assign('nombreMes', $this->getListaMeses());
		
		if($this->getInt('buscar') == 1){
			$this->_view->assign('sede', $this->getTexto('sede'));
			$sede = str_replace("_", " ", $this->getTexto('sede'));
			$this->_view->assign('anioA', $this->getInt('anio'));
			$reportes = $this->_reportes->getReportesGeneral($this->getInt('anio'),$sede);
			$finanzas = $this->_finanzas->getFinanzasSede($this->getInt('anio'),$sede);
		} else if (!$año and !$sede){
			$reportes = false;
		} else {
			$this->_view->assign('sede', $sede);
			$sede = str_replace("_", " ", $sede);
			$this->_view->assign('anioA', $año);
			$reportes = $this->_reportes->getReportesGeneral($año,$sede);
			$finanzas = $this->_finanzas->getFinanzasSede($año,$sede);
		}
		
		$this->_view->assign('reportes', $reportes);
		$this->_view->assign('finanzas', $finanzas);
        $this->_view->renderizar('lista');
    }
	
	public function generar($año,$sede){
		$this->_acl->acceso('control_reportes');
		
		$sedeA = str_replace("_", " ", $sede);
		
		for ($i=3; $i <= 12; $i++){
			$this->_reportes->generarReportesAñoSedes($año,$i); //CREO LOS REPORTES QUE NO HAN SIDO CREADOS
			$this->_finanzas->generarFinanzasAñoSedes($año,$i); //CREO LOS REPORTES DE FINANZAS QUE NO HAN SIDO CREADOS
			
			$reportes = $this->_reportes->getReportes($año,$sedeA,$i);
			foreach ($reportes as $reporte) {
				$this->_reportes->generarPorGrupo($reporte['id_reporte']);
			}
		}
		
		$this->redireccionar('administrador/reportes/lista/'.$año.'/'.$sede);
	}
	
	public function listaSede($sede,$año,$mes){
		$sedeA = str_replace("_", " ", $sede);
		$reportes = $this->_reportes->getReportes($año,$sedeA,$mes);
		$this->_view->assign('anioA', $año);
		$this->_view->assign('sede', $sede);
		$this->_view->assign('reportes', $reportes);
		$this->_view->assign('titulo', 'Reporte Detallado Estadistica');
		$this->_view->renderizar('listaSede');
	}
	
	public function guardarFinanzas($año,$sede){
		
		$sedeA = str_replace("_", " ", $sede);
		if($this->getInt('guardar') == 1){
			$this->_finanzas->setFinanzasSede($this->getInt('id_finanza'),$this->getInt('complejo'),$this->getInt('profesores'),$this->getInt('camisetas'));
		}
		$this->redireccionar('administrador/reportes/lista/'.$año.'/'.$sede);
	}

}

?>