<?php

class gruposController extends administradorController{
	
	private $_grupos;
	
    public function __construct() {
        parent::__construct();
		$this->_grupos = $this->loadModel('grupos');
    }
    
    public function index(){
		$this->_acl->acceso('control_grupos');
		
        $this->_view->assign('titulo', 'Lista Grupos');
		$this->_view->assign('grupos', $this->_grupos->getGrupos());
		
        $this->_view->renderizar('index');
    }
	
	public function nuevo(){
		$this->_acl->acceso('control_grupos');
		
        $this->_view->assign('titulo', 'Nuevo Grupo');
		        
        if($this->getInt('guardar') == 1){
            $this->_view->assign('datos', $_POST);
			
			if($this->getTexto('sede') == 'null'){
                $this->_view->assign('_error', 'Debe seleccionar una Sede.');
                $this->_view->renderizar('nuevo', '');
                exit;
            }
			
			if($this->getTexto('tipo') == 'null'){
                $this->_view->assign('_error', 'Seleccione el tipo de Grupo.');
                $this->_view->renderizar('nuevo', '');
                exit;
            }
			
			if (!is_array($this->getPostParam('dias'))){
				$this->_view->assign('_error', 'Seleccione los dias de actividad.');
                $this->_view->renderizar('nuevo', '');
                exit;
			}
			
			if(!$this->getTexto('horario')){
                $this->_view->assign('_error', 'Indique el horario en que se dicta la clase');
                $this->_view->renderizar('nuevo', '');
                exit;
            }
			
			if($this->_grupos->getGrupoBy($this->getTexto('sede'),$this->getTexto('tipo'),$this->getPostParam('dias'))){
				$this->_view->assign('_error', 'Ya existe un Grupo con estas caracteristicas');
                $this->_view->renderizar('nuevo', '');
                exit;
			}

            if(!$this->_grupos->insertarGrupo(
								$this->getTexto('sede'),
								$this->getTexto('tipo'),
								$this->getPostParam('dias'),
								$this->getTexto('horario')
								)){
				$this->_view->assign('_error', 'No se guardo el grupo.');
			}
            
            $this->redireccionar('administrador/grupos');
        }
        
        $this->_view->renderizar('nuevo', '');
	}
	
	public function delete_grupo($id_grupo){
		$this->_acl->acceso('control_usuarios');
		
		$id = $this->filtrarInt($id_grupo);
		        
        if(!$id){
            $this->redireccionar('administrador/grupos');
        }
		
		if(!$this->_grupos->getGrupo($id)){
			$this->redireccionar('administrador/grupos');
		}
		
        if(!$this->_grupos->deleteGrupo($id)){
			$this->_view->assign('_error', 'No se puedo eliminar. Intente nuevamente.');
			$this->_view->renderizar('grupos', '');
            exit;
		}
		
		$this->redireccionar('administrador/grupos');
    }
	
	public function show($id_grupo){
		$this->_acl->acceso('control_grupos');
		
		$id = $this->filtrarInt($id_grupo);
		        
        if(!$id){
            $this->redireccionar('administrador/grupos');
        }
		
		$grupo = $this->_grupos->getGrupo($id);
		if(!$grupo){
			$this->redireccionar('administrador/grupos');
		}
		
		$this->_view->assign('alumnos', $this->_grupos->getAlumnosGrupo($id));
		$this->_view->assign('grupo', $grupo);
		$this->_view->assign('titulo', "Alumnos de ".$grupo['sede']."-".$grupo['tipo'] );
		$this->_view->renderizar('show', '');
	}
	
	
    
    
}

?>