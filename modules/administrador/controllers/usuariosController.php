<?php

class usuariosController extends administradorController
{
    private $_usuarios;
	private $_login;
	private $_registro;
    
    public function __construct(){
        parent::__construct();
        $this->_usuarios = $this->loadModel('user');
		$this->_login = $this->loadModel('login');
		$this->_registro = $this->loadModel('registro');
    }
	
	public function index(){
        if(Session::get('autenticado')){
            $this->redireccionar('administrador');
        } 
        
        $this->_view->assign('titulo', 'Iniciar Sesion');
        
        if($this->getInt('enviar') == 1){
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getAlphaNum('usuario')){
                $this->_view->assign('_error', 'Debe introducir su nombre de usuario');
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('index','login');
                exit;
            }
            
            $row = $this->_login->getUsuario(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );
            
            if(!$row){
                $this->_view->assign('_error', 'Usuario y/o password incorrectos');
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if($row['estado'] != 1){
                $this->_view->assign('_error', 'Este usuario no esta habilitado');
                $this->_view->renderizar('index','login');
                exit;
            }
                        
            Session::set('autenticado', true);
            Session::set('level', $row['role']);
            Session::set('usuario', $row['usuario']);
            Session::set('id_usuario', $row['id']);
            Session::set('tiempo', time());
            
            $this->redireccionar('administrador');
        }
        
        $this->_view->renderizar('index','');
    }
    
    public function cerrar(){
        Session::destroy();
        $this->redireccionar('administrador');
    }
	
	public function registro(){
        if(!Session::get('autenticado')){
			$this->redireccionar('administrador');
		}
        
        $this->_view->assign('titulo', 'Registro');
        
        if($this->getInt('enviar') == 1){ //Si recibo los datos creo el nuevo usuario
            $this->_view->assign('datos', $_POST);
            
            if(!$this->getSql('nombre')){
                $this->_view->assign('_error', 'Debe introducir su nombre');
                $this->_view->renderizar('registro', 'registro');
                exit;
            }
            
            if(!$this->getAlphaNum('usuario')){
                $this->_view->assign('_error', 'Debe introducir su nombre usuario');
                $this->_view->renderizar('registro', 'registro');
                exit;
            }
            
            if($this->_registro->verificarUsuario($this->getAlphaNum('usuario'))){
                $this->_view->assign('_error', 'El usuario ' . $this->getAlphaNum('usuario') . ' ya existe');
                $this->_view->renderizar('registro', 'registro');
                exit;
            }
            
            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_view->assign('_error', 'La direccion de email es inv&aacute;lida');
                $this->_view->renderizar('registro', 'registro');
                exit;
            }
            
            if($this->_registro->verificarEmail($this->getPostParam('email'))){
                $this->_view->assign('_error', 'Esta direccion de correo ya esta registrada');
                $this->_view->renderizar('registro', 'registro');
                exit;
            }
            
            if(!$this->getSql('pass')){
                $this->_view->assign('_error', 'Debe introducir su password');
                $this->_view->renderizar('registro', 'registro');
                exit;
            }
            
            if($this->getPostParam('pass') != $this->getPostParam('confirmar')){
                $this->_view->assign('_error', 'Los passwords no coinciden');
                $this->_view->renderizar('registro', 'registro');
                exit;
            }
            
            $this->getLibrary('class.phpmailer');
            $mail = new PHPMailer();
			
            $this->_registro->registrarUsuario(
                    $this->getSql('nombre'),
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass'),
                    $this->getPostParam('email')
                    );
            
            $usuario = $this->_registro->verificarUsuario($this->getAlphaNum('usuario'));
			
            if(!$usuario){
                $this->_view->assign('_error', 'Error al registrar el usuario');
                $this->_view->renderizar('registro', 'registro');
                exit;
            }
			
			/* CUANDO SE DESEA USAR LA ACTIVACION DE CUENTA POR CORREO 
			
            $mail->From = 'www.mvc.dlancedu.com';
            $mail->FromName = 'Tutorial MVC';
            $mail->Subject = 'Activacion de cuenta de usuario';
            $mail->Body = 'Hola <strong>' . $this->getSql('nombre') . '</strong>,' .
                        '<p>Se ha registrado en www.mvc.dlancedu.com para activar ' .
                        'su cuenta haga clic sobre el siguiente enlace:<br>' .
                        '<a href="' . BASE_URL .'registro/activar/' . 
                        $usuario['id'] . '/' . $usuario['codigo'] . '">' .
                        BASE_URL .'registro/activar/' . 
                        $usuario['id'] . '/' . $usuario['codigo'] .'</a>' ;

            $mail->AltBody = 'Su servidor de correo no soporta html';
            $mail->AddAddress($this->getPostParam('email'));
            $mail->Send();
             
			$this->_view->assign('datos', false);
            $this->_view->assign('_mensaje', 'Registro Completado, revise su email para activar su cuenta'); */
			
			$this->activar($usuario['id'],$usuario['codigo']);
			$this->_view->assign('datos', false);
            $this->_view->assign('_mensaje', 'Registro Completado, revise su email para activar su cuenta');
        }        
        
        $this->_view->renderizar('registro', 'registro');
    }

    public function activar($id, $codigo){
		
        if(!$this->filtrarInt($id) || !$this->filtrarInt($codigo)){
            $this->_view->assign('_error', 'Esta cuenta no existe');
            $this->_view->renderizar('activar', 'registro');
            exit;   
            }

        $row = $this->_registro->getUsuario(
                            $this->filtrarInt($id),
                            $this->filtrarInt($codigo)
                            );

        if(!$row){
            $this->_view->assign('_error', 'Esta cuenta no existe');
            $this->_view->renderizar('activar', 'registro');
            exit;
        }

        if($row['estado'] == 1){
            $this->_view->assign('_error', 'Esta cuenta ya ha sido activada');
            $this->_view->renderizar('activar', 'registro');
            exit;
        }

        $this->_registro->activarUsuario(
                            $this->filtrarInt($id),
                            $this->filtrarInt($codigo)
                            );

        $row = $this->_registro->getUsuario(
                            $this->filtrarInt($id),
                            $this->filtrarInt($codigo)
                            );

        if($row['estado'] == 0){
            $this->_view->assign('_error', 'Error al activar la cuenta, por favor intente mas tarde');
            $this->_view->renderizar('activar', 'registro');
            exit;
        }

        /*$this->_view->assign('_mensaje', 'Su cuenta ha sido activada');
        $this->_view->renderizar('activar', 'registro');*/
    }
    
    public function listado(){
		
		if(!Session::get('autenticado')){
			$this->redireccionar('administrador');
		}
		
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('titulo', 'Usuarios');
		$this->_view->assign('marcado', '');
        $this->_view->assign('usuarios', $this->_usuarios->getUsuarios());
        $this->_view->renderizar('listado', 'usuarios');
    }
    
    public function permisos($usuarioID){
		
		if(!Session::get('autenticado')){
			$this->redireccionar('administrador');
		}
		
        $id = $this->filtrarInt($usuarioID);
        
        if(!$id){
            $this->redireccionar('usuarios');
        }
        
        if($this->getInt('guardar') == 1){
            $values = array_keys($_POST);
            $replace = array();
            $eliminar = array();
            
            for($i = 0; $i < count($values); $i++){
                if(substr($values[$i],0,5) == 'perm_'){
                    $permiso = (strlen($values[$i]) - 5);
                    
                    if($_POST[$values[$i]] == 'x'){
                        $eliminar[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], -$permiso)
                        );
                    }
                    else{
                        if($_POST[$values[$i]] == 1){
                            $v = 1;
                        }
                        else{
                            $v = 0;
                        }
                        
                        $replace[] = array(
                            'usuario' => $id,
                            'permiso' => substr($values[$i], -$permiso),
                            'valor' => $v
                        );
                    }
                }
            }
            
            for($i = 0; $i < count($eliminar); $i++){
                $this->_usuarios->eliminarPermiso(
                        $eliminar[$i]['usuario'],
                        $eliminar[$i]['permiso']);
            }
            
            for($i = 0; $i < count($replace); $i++){
                $this->_usuarios->editarPermiso(
                        $replace[$i]['usuario'],
                        $replace[$i]['permiso'],
                        $replace[$i]['valor']);
            }
        }
        
        $permisosUsuario = $this->_usuarios->getPermisosUsuario($id);
        $permisosRole = $this->_usuarios->getPermisosRole($id);
        
        if(!$permisosUsuario || !$permisosRole){
            $this->redireccionar('usuarios');
        }
        
        $this->_view->assign('titulo', 'Permisos de usuario');
		$this->_view->assign('marcado', '');
        $this->_view->assign('permisos', array_keys($permisosUsuario));
        $this->_view->assign('usuario', $permisosUsuario);
        $this->_view->assign('role', $permisosRole);
        $this->_view->assign('info', $this->_usuarios->getUsuario($id));
        
        $this->_view->renderizar('permisos', 'usuarios');
    }
}

?>
