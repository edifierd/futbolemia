<?php

class gruposController extends administradorController{

	private $_grupos;
	private $_asistencias;
	private $_cuotas;

    public function __construct() {
        parent::__construct();
		$this->_grupos = $this->loadModel('grupos');
		$this->_asistencias = $this->loadModel('asistencias');
		$this->_cuotas = $this->loadModel('cuotas');
    }

    public function index(){
		$this->_acl->acceso('control_grupos');

        $this->_view->assign('titulo', 'Lista Grupos');
		$this->_view->assign('grupos', $this->_grupos->getGrupos());
		$this->_view->assign('controller', $this);

        $this->_view->renderizar('index');
    }

	public function nuevo(){
		$this->_acl->acceso('nuevo_grupo');

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
		$this->_acl->acceso('super_usuario');

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

		if(!$id or $id == 1){
			$this->redireccionar('administrador/grupos');
		}

		$grupo = $this->_grupos->getGrupo($id);
		if(!$grupo){
			$this->redireccionar('administrador/grupos');
		}

		$this->permisoSede($grupo['sede']);

		$this->_view->assign('alumnos', $this->_grupos->getAlumnosGrupo($id));
		$this->_view->assign('asistenciasModel', $this->_asistencias);
		$this->_view->assign('cuotasModel', $this->_cuotas);
		$this->_view->assign('grupo', $grupo);
		$this->_view->assign('titulo', "Alumnos de ".$grupo['sede']."-".$this->getTipoGrupo($grupo['tipo']));
		$this->_view->assign('controller', $this);
		$this->_view->renderizar('show', '');
	}

	public function permisoSede($sede){
		if ($sede == 'Los Hornos'){
			$this->_acl->acceso('control_los_hornos');
		} else if ($sede == 'El Retiro'){
			$this->_acl->acceso('control_el_retiro');
		} else if ($sede == 'La Cumbre'){
			$this->_acl->acceso('control_la_cumbre');
		} else {
		    $this->_acl->acceso('super_usuario');
		}
	}

	// -----------  METODOS AUCILIARES PARA LA VISTA  -----------  //

	public function getTipoGrupo($tipo){
		$nombre = 'Sin Asignar';
		switch ($tipo) {
    		case 'Jardin':
        		$nombre = "Jardin";
        		break;
    		case '1y2':
        		$nombre = "1° y 2° Grado";
        		break;
    		case '3':
        		$nombre = "3° Grado";
        		break;
			case '4':
        		$nombre = "4° Grado";
        		break;
			case '3y4':
        		$nombre = "3° y 4° Grado";
        		break;
			case '5y6':
        		$nombre = "5° y 6° Grado";
        		break;
		}
		return $nombre;
	}

}

?>
