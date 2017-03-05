<?php

class indexController extends administradorController{    
	
	private $_grupos;

    public function __construct() {
        parent::__construct();
		$this->_grupos = $this->loadModel('grupos');
    }
    
    public function index()
    {
		if(!Session::get('autenticado')){
			$this->redireccionar('administrador/usuarios');
		}
		
		$user_role = $this->_current_user['role'];
		if($user_role == 3 or $user_role == 6){
			$sede = "El Retiro";
		} else if($user_role == 7 or $user_role == 5){
			$sede = "Los Hornos";
		} else if($user_role == 8){
			$sede = "La Cumbre";
		} else {
			$sede = false;
		}
		
		$this->_view->assign('grupos',$this->_grupos->getGruposSede($sede));
		$this->_view->assign('titulo', 'Panel de Administración');
		$this->_view->renderizar('index', '');
	}
}

?>
