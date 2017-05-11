<?php

/*
 * -------------------------------------
 * www.dlancedu.com | Jaisiel Delance
 * framework mvc basico
 * Controller.php
 * -------------------------------------
 */


abstract class Controller
{
    private $_registry; 
    protected $_view;
    protected $_acl;
    protected $_request;
    
    public function __construct() 
    {
        $this->_registry = Registry::getInstancia();
        $this->_acl = $this->_registry->_acl;
        $this->_request = $this->_registry->_request;
        $this->_view = new View($this->_request, $this->_acl);
		$this->_view->assign('params', $this->getParams());
		$this->_view->assign('marcado', '');
    }
    
    abstract public function index();
	
	abstract public function getModel($nombre);
    
    protected function loadModel($modelo, $modulo = false)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';
        
        if(!$modulo){
            $modulo = $this->_request->getModulo();
        }
        
        if($modulo){
           if($modulo != 'default'){
               $rutaModelo = ROOT . 'modules' . DS . $modulo . DS . 'models' . DS . $modelo . '.php';
           } 
        }
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo - No se ha encontrado el nombre de modelo indicado a cargar. --> '.$modelo);
        }
    }
	
	protected function redireccionar($ruta = false){
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }
    
    protected function getLibrary($libreria){
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
           	require_once $rutaLibreria;
        } else{
           throw new Exception('Error de libreria');
        }
    }
    
    protected function getTexto($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        
        return '';
    }
    
    protected function getInt($clave){
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        
        return 0;
    }
	
	protected function getDni($clave){
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
			if (strlen($_POST[$clave]) > 6 && strlen($_POST[$clave]) < 9){
            	return $_POST[$clave];
			} else {
				return 0;
			}
        }
    }

    protected function filtrarInt($int){
        $int = (int) $int;
        
        if(is_int($int)){
            return $int;
        }
        else{
            return 0;
        }
    }
    
    protected function getPostParam($clave){	
    	if(isset($_POST[$clave])){
           	return $_POST[$clave];
        } else {
			return "<br> error de parametro POST[ ".$clave." ] (Controller linea 121) <br>";
		}
    }
	
	
	protected function getParams(){
        $params = $this->_request->getArgs();
		if(isset($params) && !empty($params)){
			return $params;
		} 
		return false;
    }
    
    protected function getSql($clave){
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);
            
            if(!get_magic_quotes_gpc()){
                $_POST[$clave] = mysql_real_escape_string($_POST[$clave], mysql_connect(DB_HOST, DB_USER, DB_PASS));
            }
            
            return trim($_POST[$clave]);
        }
    }
    
    protected function getAlphaNum($clave,$trim = false){
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
			if ($trim == true){
            	return trim($_POST[$clave]);
			} else {
				return $_POST[$clave];
			}
        }
    }
	
	public function getDia($fecha){
		$array_dias['Sunday'] = "Do";
		$array_dias['Monday'] = "Lu";
		$array_dias['Tuesday'] = "Ma";
		$array_dias['Wednesday'] = "Mi";
		$array_dias['Thursday'] = "Ju";
		$array_dias['Friday'] = "Vi";
		$array_dias['Saturday'] = "Sa";
		return $array_dias[date('l', strtotime($fecha))];
	}
	
	public function getListaAnios($atrasa=0,$adelanta=0){
		if($atrasa == 0){
			$atrasa = 100;
		}
    	$anios = array();
    	for($i = date("Y"); $i >= date("Y") - $atrasa; $i--){
        	$anios[] = array($i, $i + $adelanta);
    	}
    	return $anios;
	}
	
	public function getListaMeses(){
		$meses = array();
		$meses[1] = "Enero";
		$meses[2] = "Febrero";
		$meses[3] = "Marzo";
		$meses[4] = "Abril";
		$meses[5] = "Mayo";
		$meses[6] = "Junio";
		$meses[7] = "Julio";
		$meses[8] = "Agosto";
		$meses[9] = "Septiembre";
		$meses[10] = "Octubre";
		$meses[11] = "Noviembre";
		$meses[12] = "Diciembre";
		return $meses;
	}
    
    public function validarEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        
        return true;
    }
	
	public function validarDate($str){ 
    	trim($str); 
        $trozos = explode ("-", $str); 
        $año=$trozos[0]; 
        $mes=$trozos[1]; 
        $dia=$trozos[2];      
        if(checkdate ($mes,$dia,$año)){ 
        	return true; 
        } 
        return false; 
	}  
    
    protected function formatPermiso($clave){
		
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
    }
	
	public function uploader(){
		/*Controlador
		$controlador = "alumnos";
		$modelo = $this->getModel($controlador);
		$modelo->modificarImagen("fede.jpg",array(1)); 
		exit;*/
		
		// Recuperando imagem em base64
		// Exemplo: data:image/png;base64,AAAFBfj42Pj4
		$imagen = $_POST['imagen'];
		
		// Separando tipo dos datos da imagen
		// $tipo: data:image/png
		// $datos: base64,AAAFBfj42Pj4
		list($tipo, $datos) = explode(';', $imagen);

		// Isolando apenas o tipo da imagen
		// $tipo: image/png
		list(, $tipo) = explode(':', $tipo);
		

		// Isolando apenas os datos da imagen
		// $datos: AAAFBfj42Pj4
		list(, $datos) = explode(',', $datos);

		//Convertendo base64 para imagen
	    $datos = base64_decode($datos);

		//Gerando nombre aleatório para a imagen
		$nombre = 'upl_' . $_POST['nombre'];
		
		//Controlador
		$controlador = $_POST['controlador'];
		$modelo = $this->getModel($controlador);
		
		//Ruta
		$ruta = ROOT . 'public' . DS . 'img' . DS . $controlador . DS;

		
		// Salvando imagen em disco
		if (file_put_contents($ruta."{$nombre}.jpg", $datos)){
		
			//$parametro = json_decode(stripslashes($_POST['datos']),true);
			$parametro = $_POST['datos'];

			if($modelo->modificarImagen($nombre.".jpg",$parametro)){
			//$modelo->modificarImagen($parametro[0],array(1)); 
			// El modelo debe contener este metodo en el cual recibe el nombre de la imagen y un Array de datos auxiliares
			
			$thumb = new upload($ruta."{$nombre}.jpg");
            $thumb->image_resize = true;
            $thumb->image_y = $thumb->image_dst_y / 2;
            $thumb->image_x = $thumb->image_dst_x / 2;
            $thumb->file_name_body_pre = 'thumb_';
            $thumb->process($ruta . 'thumb' . DS);
			}
				
		}
	}
}

?>
