<?php

class loginModel extends Model{
	
	private $_item;
	
    public function __construct() {
        parent::__construct('login');
		
		//AGREGO EL ITEM AL USUARIO
		$user_type_model = USER_TYPE . 'Model';
		$ruta_user_type_model = ROOT . 'modules' . DS . 'administrador' . DS . 'models' . DS . $user_type_model . '.php';
        if(is_readable($ruta_user_type_model)){
            require_once $ruta_user_type_model;
            $this->_item = new $user_type_model;
        }
        else {
            throw new Exception('Error en USUARIO TYPE --> '.USER_TYPE);
        }
    }
    
    public function getUsuario($usuario, $password){
        $datos = $this->_db->query(
                "select * from usuarios " .
                "where usuario = '$usuario' " .
                "and pass = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'"
                );
        
		if ($datos->rowCount() > 0){
        	$usuario = $datos->fetch();
			return array_merge($usuario,$this->_item->getItem($usuario['item_id']));
		}
		return false;
    }
}

?>
