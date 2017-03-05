<?php

class alumnosController extends administradorController{
	
	private $_alumnos;
	private $_grupos;
	private $_reportes;
	
    public function __construct() {
        parent::__construct();
		$this->_alumnos = $this->loadModel('alumnos');
		$this->_grupos = $this->loadModel('grupos');
		$this->_reportes = $this->loadModel('reportes');
    }
	
	public function getModel($nombre){
		if($nombre == 'alumnos'){
			return $this->_alumnos;
		}
	}
    
    public function index(){
		$this->_acl->acceso('control_alumnos');
		if($this->getInt('buscar') == 1){
			$this->_view->assign('datos', $_POST);
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
		
		$id_alumno = $this->filtrarInt($id_alumno);
		$alumno = $this->_alumnos->getAlumno($id_alumno);
		if(!$alumno){
			$this->redireccionar('administrador/alumnos');
			exit;
		}
		
		$this->permisoSede($alumno['sede']);
		
		if($this->getInt('guardar') == 1){
			if($this->_alumnos->setNota($id_alumno, $this->getTexto('notas'))){
				$this->_view->assign('_emensaje', 'Nota guardada correctamente.');
			} else {
				$this->_view->assign('_error', 'Algo salio mal. No se guardo la nota.');
			}
		}
		
		$this->_view->assign('alumno', $this->_alumnos->getAlumno($id_alumno));
		$this->_view->assign('responsables', $this->_alumnos->getResponsables($id_alumno));
		$this->_view->assign('titulo', 'Perfil de '.$alumno['apellido']." ".$alumno['nombre']);
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
			
			$grupo = $this->_grupos->getGrupo($this->getInt('grupo'));
			$this->permisoSede($grupo['sede']);
			
			
			if($this->getDni('dni') == 0 or !$this->getDni('dni')){
                $this->_view->assign('_error', 'Debe introducir un número valido de DNI del alumno.');
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
			$this->_reportes->nuevoAlumno($alumno['id_grupo']);
            $this->redireccionar('administrador/alumnos/show/'.$alumno['id_alumno']);
        }
        
        $this->_view->renderizar('nuevo', '');
	}
	
	
	public function edit($id_alumno){	
		
		$this->_acl->acceso('control_alumnos');
		
		$alumno = $this->_alumnos->getAlumno($id_alumno);
		if(!$alumno){
			$this->redireccionar('administrador/alumnos');
		}
		
		$this->permisoSede($alumno['sede']);
		
		$this->_view->assign('grupo', $this->_grupos->getGrupo($alumno['id_grupo']));
		$this->_view->assign('grupos', $this->_grupos->getGruposMenos($alumno['id_grupo']));
		$this->_view->assign('id_alumno', $id_alumno);
		$this->_view->assign('nombre', $alumno['nombre']);
		$this->_view->assign('apellido', $alumno['apellido']);
		$this->_view->assign('dni', $alumno['dni']);
		$this->_view->assign('datos', $alumno);
		$this->_view->setJsPlugin(array('canvas-to-blob.min','resize','process','validaciones'),'imgUploader');
		$this->_view->assign('titulo', 'Editar Alumno');
		
		if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
			
			if(!$this->validarDate($this->getPostParam('nacimiento'))){
				$this->_view->assign('_error', 'No es una fecha de nacimiento valida.');
                $this->_view->renderizar('edit', 'alumno');
                exit;
			}
			
			if(!$this->getTexto('colegio')){
				$this->_view->assign('_error', 'No parece ser el nombre de un colegio.');
                $this->_view->renderizar('edit', 'alumno');
                exit;
			}
			
			if(!$this->getTexto('obra_social')){
				$obra_social = '';
			} else {
				$obra_social = $this->getTexto('obra_social');
			}
						
			if(!$this->getAlphaNum('num_afiliado')){
				$numero_afiliado = '';
			} else {
				$numero_afiliado = $this->getAlphaNum('num_afiliado');
			}
			
			if(!$this->getTexto('observacion_medica')){
				$observacion_medica = '';
			} else {
				$observacion_medica = $this->getTexto('observacion_medica');
			}
			
			if(!$this->_alumnos->edit($id_alumno,
									  $this->getPostParam('nacimiento'),
									  $this->getTexto('colegio'),
								      $obra_social,
								      $numero_afiliado,
								      $observacion_medica,
									  $this->getInt('grupo')
								  )){
				$this->_view->assign('_error', 'No se pudo modificar al alumno. Intente nuevamente.');
			} else {
				$this->redireccionar('administrador/alumnos/show/'.$id_alumno);
			}

		} 
		$this->_view->renderizar('edit', '');
	}
	
	
	public function delete($id){ //ESTO ES SUPENDER (Un eliminar logico)
		$this->_acl->acceso('control_alumnos');
		$alumno = $this->_alumnos->getAlumno($id);
		if(!$alumno){
			$this->redireccionar('administrador/alumnos');
			exit;
		}
		$this->permisoSede($alumno['sede']);
		if(!$this->_alumnos->delete($id)){
			$this->_view->assign('_error', 'No se ha podido eliminar de BD');
			$this->_view->renderizar('index');
			exit;
		}
		
		$this->_reportes->dejoAlumno($alumno['id_grupo']);
		
		$this->redireccionar('administrador/alumnos');
	}
	
	public function reactivar($id){
		$this->_acl->acceso('control_alumnos');
		$alumno = $this->_alumnos->getAlumno($id);
		if(!$alumno){
			$this->redireccionar('administrador/alumnos');
			exit;
		}
		$this->permisoSede($alumno['sede']);
		$this->_view->assign('alumno', $alumno);
		$this->_view->assign('grupo', $this->_grupos->getGrupo($alumno['id_grupo']));
		$this->_view->assign('grupos', $this->_grupos->getGruposMenos($alumno['id_grupo']));
		$this->_view->assign('titulo', 'Reactivar Alumno');
		
		if($this->getInt('guardar') == 1){
			if($this->getInt('grupo') == 0){
                $this->_view->assign('_error', 'Debe seleccionar un grupo de una Sede.');
                $this->_view->renderizar('reactivar', '');
                exit;
            }
			
			if(!$this->_alumnos->reactivar($id,$this->getInt('grupo'))){
				$this->_view->assign('_error', 'No se ha podido reactivar el alumno de la BD');
				$this->_view->renderizar('index');
				exit;
			}
			
			$alumno = $this->_alumnos->getAlumno($id);
			$this->_reportes->volvioAlumno($alumno['id_grupo']);
			
			$this->redireccionar('administrador/alumnos/show/'.$id);
		}
		
		$this->_view->renderizar('reactivar', '');
	}
    
    
}

?>