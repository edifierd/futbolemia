<?php

class alumnosController extends administradorController{
	
	private $_alumnos;
	private $_grupos;
	
    public function __construct() {
        parent::__construct();
		$this->_alumnos = $this->loadModel('alumnos');
		$this->_grupos = $this->loadModel('grupos');
    }
    
    public function index(){
		$this->_acl->acceso('control_alumnos');
		if($this->getInt('buscar') == 1){
			if($this->getTexto('casillero')){
				$alumnos = $this->_alumnos->find($this->getTexto('sede'),$this->getTexto('casillero'));
			}else{
				$alumnos = $this->_alumnos->find($this->getTexto('sede'));
			}
		} else {
			$alumnos = $this->_alumnos->getAll();
		}
		$this->_view->assign('alumnos', $alumnos);
        $this->_view->assign('titulo', 'Listado Alumnos');
        $this->_view->renderizar('index');
    }
	
	public function show($id_alumno){
		$this->_acl->acceso('control_alumnos');
		$this->_view->assign('titulo', 'Nuevo Alumno');
		$alumno = $this->_alumnos->getAlumno($id_alumno);
		if(!$alumno){
			$this->redireccionar('administrador/alumnos');
			exit;
		}
		$this->_view->assign('alumno', $this->_alumnos->getAlumno($id_alumno));
		$this->_view->renderizar('show', '');
	}
	
	public function nuevo(){
		$this->_acl->acceso('control_alumnos');
		
        $this->_view->assign('titulo', 'Nuevo Alumno');
		
		$this->_view->assign('grupos', $this->_grupos->getGrupos());
        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
			
			if($this->getInt('grupo') == 0){
                $this->_view->assign('_error', 'Debe seleccionar un grupo de una Sede.');
                $this->_view->renderizar('nuevo', '');
                exit;
            }
			
			if($this->getDni('dni') == 0 or !$this->getDni('dni')){
                $this->_view->assign('_error', 'Debe introducir un numero valido de DNI del alumno.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
            }
			
			if($this->_alumnos->getAlumnoByDni($this->getDni('dni'))){
                $this->_view->assign('_error', 'Este alumno ya existe en nuestros registros.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
            }
			
			if(!$this->getTexto('nombre')){
				$this->_view->assign('_error', 'No se ha ingresado un Nombre valido.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
			}
			
			if(!$this->getTexto('apellido')){
				$this->_view->assign('_error', 'No se ha ingresado un Apellido valido.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
			}
			
			if(!$this->validarDate($this->getPostParam('nacimiento'))){
				$this->_view->assign('_error', 'No es una fecha de nacimiento valida.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
			}
			
			if(!$this->getTexto('colegio')){
				$this->_view->assign('_error', 'No parece ser el nombre de un colegio.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
			}
			
			if(!$this->getTexto('obra_social')){
				$obra_social = '';
			} else {
				$obra_social = $this->getTexto('obra_social');
			}
						
			if(!$this->getAlphaNum('numero_afiliado')){
				$numero_afiliado = '';
			} else {
				$numero_afiliado = $this->getAlphaNum('numero_afiliado');
			}
			
			if(!$this->getTexto('observacion_medica')){
				$observacion_medica = '';
			} else {
				$observacion_medica = $this->getTexto('observacion_medica');
			}
			
			if(!$this->getTexto('notas')){
				$notas = '';
			} else {
				$notas = $this->getTexto('notas');
			}

            if(!$this->_alumnos->insertarAlumno(
								$this->getDni('dni'),
								$this->getTexto('nombre'),
								$this->getTexto('apellido'),
								$this->getPostParam('nacimiento'),
								$this->getTexto('colegio'),
								$obra_social,
								$numero_afiliado,
								$observacion_medica,
								$notas,
								$this->getInt('grupo')
							)){
				$this->_view->assign('_error', 'No se guardo al alumno.');
			}
			            
			$alumno = $this->_alumnos->getAlumnoByDni($this->getDni('dni'));
            $this->redireccionar('administrador/alumnos/show/'.$alumno['id_alumno']);
        }
        
        $this->_view->renderizar('nuevo', '');
	}
	
	public function delete($id){
		$alumno = $this->_alumnos->getAlumno($id);
		if(!$alumno){
			$this->redireccionar('administrador/alumnos');
			exit;
		}
		
		if(!$this->_alumnos->delete($id)){
			$this->_view->assign('_mensaje', 'No se ha podido eliminar de BD');
			$this->_view->renderizar('index');
			exit;
		}
		
		$this->redireccionar('administrador/alumnos');
	}
	
	
    
    
}

?>