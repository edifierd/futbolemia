<?php

class versionesController extends administradorController{

  public function __construct() {
        parent::__construct();
  }


  public function index(){
		$this->_acl->acceso('control_alumnos');
		$this->_view->renderizar('index');
  }


}

?>
