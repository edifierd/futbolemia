<?php

class asistenciasController extends administradorController{
	
	private $_asistencias;
	private $_grupos;
	
    public function __construct() {
        parent::__construct();
		$this->_asistencias = $this->loadModel('asistencias');
		$this->_grupos = $this->loadModel('grupos');
    }
    
    public function index(){
		$this->_acl->acceso('control_grupos');
		
		
        $this->_view->renderizar('index');
    }
	
	public function tomarAsistencia($id_grupo){
		$this->_acl->acceso('control_asistencias');
		
		$id = $this->filtrarInt($id_grupo);
		        
        if(!$id){
            $this->redireccionar('administrador/grupos');
        }
		
		$grupo = $this->_grupos->getGrupo($id);
		if(!$grupo){
			$this->redireccionar('administrador/grupos');
		}
		
		$alumnos = $this->_grupos->getAlumnosGrupo($id);
		$this->_view->assign('alumnos', $alumnos);
		$this->_view->assign('grupo', $grupo);
		$this->_view->assign('titulo', 'Asistencias');
		
		if($this->getInt('guardar') == 1){
			$this->_view->assign('datos', $_POST);
			
			$fecha = $this->getPostParam('fecha');
			if(!$this->validarDate($fecha)){
				$this->_view->assign('_error', 'No es una fecha de calendario valida.');
                $this->_view->renderizar('tomarAsistencia', '');
                exit;
			}
			
			$dias = explode(',',$grupo['dias']);
			if(!in_array($this->getDia($fecha),$dias)){
				$this->_view->assign('_error', 'No es una fecha valida para este grupo.');
                $this->_view->renderizar('tomarAsistencia', '');
                exit;
			}
			
			if(!$this->_asistencias->asistenciaValida($grupo['id_grupo'],$fecha)){
				$this->_view->assign('_error', 'Ya se ha pasado asistencia a este Curso en esta fecha.');
                $this->_view->renderizar('tomarAsistencia', '');
                exit;
			}
			
			foreach ($alumnos as $clave => $valor) {
				if (array_key_exists($valor['id_alumno'], $_POST)) {
					$valorA = "presente";
				} else {
					$valorA = "ausente";
				}
				if(!$this->_asistencias->insertarAsistencia($valor['id_alumno'],$id,$fecha,$valorA)){
					$this->_view->assign('_error', 'No se ha podido pasar asistencia.');
                	$this->_view->renderizar('tomarAsistencia', '');
                	exit;
				}
			}
		}
		
		$this->_view->renderizar('tomarAsistencia', '');
		
	}
	
	
    
}

?>