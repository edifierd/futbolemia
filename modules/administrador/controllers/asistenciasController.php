<?php

class asistenciasController extends administradorController{
	
	private $_asistencias;
	private $_grupos;
	private $_alumnos;
	
    public function __construct() {
        parent::__construct();
		$this->_asistencias = $this->loadModel('asistencias');
		$this->_grupos = $this->loadModel('grupos');
		$this->_alumnos = $this->loadModel('alumnos');
    }
    
    public function index(){}
	
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
		
		$this->permisoSede($grupo['sede']);
		
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
			$this->_view->assign('_mensaje', 'Se tomo asistencia exitosamente.');
		}
		$this->_view->renderizar('tomarAsistencia', '');
	}
	
	public function alumno($id_alumno){
		$this->_acl->acceso('control_asistencias');
		
		$id_alumno = $this->filtrarInt($id_alumno);
		$alumno = $this->_alumnos->getAlumno($id_alumno);
		if(!$alumno){
			$this->redireccionar('administrador/alumnos');
			exit;
		}
		
		$this->permisoSede($alumno['sede']);
		
		if(($this->getInt('buscar') == 1) and ($this->getInt('anio'))){
			$año = $this->getInt('anio');
		} else {
			$año = $año = date("Y");
		}
		$asistencias = $this->_asistencias->getAsistenciasAlumno($id_alumno,$año);

		$this->_view->assign('asistencias', $asistencias);
		$this->_view->assign('alumno', $alumno);
		$this->_view->assign('listaAnios', $this->getListaAnios(50));
		$this->_view->assign('anioActual', $año);
		$this->_view->assign('titulo', 'Asistencias de '.$alumno['apellido']." ".$alumno['nombre']);
        $this->_view->renderizar('alumno', '');
	}
	
	
    
}

?>