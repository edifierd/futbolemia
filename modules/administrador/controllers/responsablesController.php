<?php

class responsablesController extends administradorController{
	
	private $_responsables;
	private $_alumnos;
	
    public function __construct() {
        parent::__construct();
		$this->_responsables = $this->loadModel('responsables');
		$this->_alumnos = $this->loadModel('alumnos');
    }
	
	public function index(){
		$this->_acl->acceso('control_responsables');
		
		if(($this->getInt('buscar') == 1) and ($this->getAlphaNum('casillero'))){
			$this->_view->assign('datos', $_POST);
			$responsables = $this->_responsables->find($this->getTexto('casillero'));
		} else {
			$responsables = $this->_responsables->getAll();
		}
		$this->_view->assign('responsables', $responsables);
        $this->_view->assign('titulo', 'Listado de Responsables');
        $this->_view->renderizar('index');
	}
    
    public function listado($id_alumno){
		$this->_acl->acceso('control_responsables');
		
		if(!$this->_alumnos->getAlumno($id_alumno)){
			$this->redireccionar('administrador/alumnos');
            exit;
		}
		
		if(($this->getInt('buscar') == 1) and ($this->getAlphaNum('casillero'))){
			$this->_view->assign('datos', $_POST);
			$responsables = $this->_responsables->find($this->getTexto('casillero'),$id_alumno);
		} else {
			$responsables = $this->_responsables->getAll($id_alumno);
		}
		$this->_view->assign('responsables', $responsables);
		$this->_view->assign('alumno', $this->_alumnos->getAlumno($id_alumno));
        $this->_view->assign('titulo', 'Listado de Responsables');
        $this->_view->renderizar('listado');
    }
	
	public function nuevo($id_alumno){
		$this->_acl->acceso('control_responsables');
		
        $this->_view->assign('titulo', 'Nuevo Responsable');
		        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
			
			if($this->getTexto('parentesco') == 'null'){
				$this->_view->assign('_error', 'Debe seleccionar un parentesco.');
                $this->_view->renderizar('nuevo', '');
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
			
			if($this->getDni('dni') == 0 or !$this->getDni('dni')){
                $this->_view->assign('_error', 'Debe introducir un número valido de DNI del alumno.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
            }
			
			if($this->_responsables->getResponsableByDni($this->getDni('dni'))){
                $this->_view->assign('_error', 'Este responsable ya existe en nuestros registros.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
            }
			
			if(!$this->getAlphaNum('tel_fijo')){
				$this->_view->assign('_error', 'Debe indicar un teléfono fijo.');
                $this->_view->renderizar('nuevo', '');
                exit;
			}
			
			if(!$this->getAlphaNum('tel_celular')){
				$this->_view->assign('_error', 'Debe indicar un teléfono celular.');
                $this->_view->renderizar('nuevo', '');
                exit;
			}
			
			if(!$this->getTexto('direccion')){
				$this->_view->assign('_error', 'No se ha ingresado una dirección.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
			}
			
			if($this->validarEmail($this->getTexto('email'))){
				$this->_view->assign('_error', 'No se ha ingresado un correo valido.');
                $this->_view->renderizar('nuevo', 'alumno');
                exit;
			}
			
            if(!$this->_responsables->insertarResponsable(
								$this->getTexto('parentesco'),
								$this->getDni('dni'),
								$this->getTexto('nombre'),
								$this->getTexto('apellido'),
								$this->getAlphaNum('tel_fijo'),
								$this->getAlphaNum('tel_celular'),
								$this->getTexto('direccion'),
								$this->getTexto('email'),
								$id_alumno
							)){
				$this->_view->assign('_error', 'No se guardo al alumno.');
			}
			            
            $this->redireccionar('administrador/alumnos/show/'.$id_alumno);
        }
        
        $this->_view->renderizar('nuevo', '');
	}
	
	public function asignar_alumno($id_responsable,$id_alumno){
		$this->_acl->acceso('control_responsables');
		
		if(!$this->_responsables->getResponsable($id_responsable)){
			$this->_view->assign('_error', 'Algo salio mal. Por favor intente nuevamente.');
            $this->_view->renderizar('listado', '');
            exit;
		}
		
		if(!$this->_alumnos->getAlumno($id_alumno)){
			$this->_view->assign('_error', 'Algo salio mal. Por favor intente nuevamente.');
            $this->_view->renderizar('listado', '');
            exit;
		}
		
		if(!$this->_responsables->agregarResponsable($id_responsable,$id_alumno)){
			$this->_view->assign('_error', 'Algo salio mal. No se pudo agregar a la BD.');
            $this->_view->renderizar('listado', '');
            exit;
		} 
		
		$this->redireccionar('administrador/alumnos/show/'.$id_alumno);
	}
	
	public function delete($id){
		$alumno = $this->_responsables->getAlumno($id);
		if(!$alumno){
			$this->redireccionar('administrador/alumnos');
			exit;
		}
		
		if(!$this->_responsables->delete($id)){
			$this->_view->assign('_mensaje', 'No se ha podido eliminar de BD');
			$this->_view->renderizar('index');
			exit;
		}
		
		$this->redireccionar('administrador/alumnos');
	}
	
	
    
    
}

?>