<?php

class reportesController extends administradorController{
	
	private $_reportes;
	
    public function __construct() {
        parent::__construct();
		$this->_reportes = $this->loadModel('reportes');
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
		} else if (!$año and !$sede){
			$reportes = false;
		} else {
			$this->_view->assign('sede', $sede);
			$sede = str_replace("_", " ", $sede);
			$this->_view->assign('anioA', $año);
			$reportes = $this->_reportes->getReportesGeneral($año,$sede);
		}
		
		$this->_view->assign('reportes', $reportes);
        $this->_view->renderizar('lista');
    }
	
	public function generar($año,$sede){
		$this->_acl->acceso('control_reportes');
		
		$sedeA = str_replace("_", " ", $sede);
		
		for ($i=1; $i <= 12; $i++){
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

}

?>