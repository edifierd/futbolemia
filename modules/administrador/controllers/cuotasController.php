<?php

class cuotasController extends administradorController{
	
	private $_cuotas;
	private $_alumnos;
	private $_asistencias;
	
    public function __construct() {
        parent::__construct();
		$this->_cuotas = $this->loadModel('cuotas');
		$this->_alumnos = $this->loadModel('alumnos');
		$this->_asistencias = $this->loadModel('asistencias');
    }
    
    public function index(){}
	
	public function alumno($id_alumno){
		$this->_acl->acceso('control_pagos');
		$this->_view->assign('titulo', 'Listado de Pagos');
		
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
			$año = date("Y");
		}
		
		$this->_view->assign('alumno', $alumno);
		$this->_view->assign('asistencias', $this->_asistencias->getAsistenciasAlumno($id_alumno,$año));
		$this->_view->assign('cantAsistencias', $this->_asistencias->getCantAsistenciasAlumno($id_alumno,$año));
		$this->_view->assign('cuotas', $this->_cuotas->getCuotasAlumno($id_alumno,$año));
		$this->_view->assign('nombreMes', $this->getListaMeses());
		$this->_view->assign('listaAnios', $this->getListaAnios(50));
		
		if($this->getInt('pagar') == 1){
			$this->_view->assign('datos', $_POST);
			
			if(!$this->getInt('mes')){
				$this->_view->assign('_error', 'El valor ingresado no parece ser un número de mes valido.');
				$this->_view->renderizar('alumno');
				exit;
			}
			
			if($this->_cuotas->mesPago($id_alumno,$año,$this->getInt('mes'))){ 
				$this->_view->assign('_error', 'La cuota de este mes ya se encuentra paga.');
				$this->_view->renderizar('alumno');
				exit;
			}
			
			$monto = $this->getInt('monto'.$this->getInt('mes'));
			if(!$monto){
				$this->_view->assign('_error', 'El valor ingresado no parece ser un número.');
				$this->_view->renderizar('alumno');
				exit;
			}
			
			if(!$this->_cuotas->insertarCuota($id_alumno,$monto,$año.'-'.$this->getInt('mes').'-01',date(DATE_ATOM))){ 
				$this->_view->assign('_error', 'Algo salio mal. Intente nuevamente con el pago.');
				$this->_view->renderizar('alumno');
				exit;
			} else {
				$this->redireccionar('administrador/cuotas/alumno/'.$id_alumno);
			}
		}

		$this->_view->renderizar('alumno');
	}
    
}

?>