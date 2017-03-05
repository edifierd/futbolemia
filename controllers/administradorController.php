<?php

class administradorController extends Controller {    

	protected $_current_user;

    public function __construct(){
        parent::__construct();
		$this->_view->assign('current_user', $this->current_user());
		$this->_current_user = $this->current_user(); 
    }
    
    public function index(){
	}
	
	public function getModel($nombre){
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
	
	public function current_user(){
		if(Session::get('usuario')){
			return Session::get('usuario');
		} 
		return false;
	}
	
}

?>
