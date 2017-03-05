<?php

class registroModel extends Model
{
	private $_item;
	
    public function __construct() {
        parent::__construct('usuarios');
		
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
    
    public function verificarUsuario($usuario)
    {
        $id = $this->_db->query(
                "select id, codigo from usuarios where usuario = '$usuario'"
                );
        
        return $id->fetch();
    }
    
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
                "select id from usuarios where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    
    public function registrarUsuario($datos){

		$item_id = $this->_item->setDatos($datos);
		
		//CREO EL ITEM Y LUEGO SE LO ASIGNO AL USUARIO
		
    	$random = rand(1782598471, 9999999999);
		
        $this->_db->prepare(
                "insert into usuarios values" .
                "(null, :usuario, :password, :email, :rol , 0, now(), :codigo, :item_id)"
                )
                ->execute(array(
                    ':usuario' => $datos['usuario'],
                    ':password' => Hash::getHash('sha1', $datos['password'], HASH_KEY),
                    ':email' => $datos['email'],
					':rol' => $datos['rol'],
                    ':codigo' => $random,
					':item_id' => $item_id
                ));
    }
    
    public function getUsuario($id, $codigo){
		$usuario = $this->_db->query(
					"select * from usuarios where id = $id and codigo = '$codigo'"
					);
					
		return $usuario->fetch();
	}
	
	public function activarUsuario($id, $codigo)
	{
		$this->_db->query(
					"update usuarios set estado = 1 " .
					"where id = $id and codigo = '$codigo'"
					);
	}
}

?>
