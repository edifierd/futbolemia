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
	
	public function current_user(){
		if(Session::get('usuario')){
			return Session::get('usuario');
		} 
		return false;
	}
	
}

?>
