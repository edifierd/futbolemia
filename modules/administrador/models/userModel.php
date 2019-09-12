<?php
class userModel extends Model{
	
	private $_item;
	
    public function __construct(){
        parent::__construct('usuarios');
		
		if(USER_TYPE != ''){ //AGREGO EL ITEM AL USUARIO
			$user_type_model = USER_TYPE . 'Model';
			$ruta_user_type_model = ROOT . 'modules' . DS . 'administrador' . DS . 'models' . DS . $user_type_model . '.php';
        	if(is_readable($ruta_user_type_model)){
            	require_once $ruta_user_type_model;
            	$this->_item = new $user_type_model;
        	} else {
            	throw new Exception('Error en USUARIO TYPE --> '.USER_TYPE);
        	}
		}
		
    }
    
    public function getUsuarios(){
        $usuarios = $this->_db->query(
                "select u.*,r.role from usuarios u, roles r ".
                "where u.role = r.id_role"
                );
        return $usuarios->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUsuario($usuarioID){
    	$datos = $this->_db->query(
                "select * from usuarios u, roles r ".
                "where u.role = r.id_role and u.id = $usuarioID"
                );
		$usuario = $datos->fetch();
		$item = array();
		if(isset($this->_item)){
			$item = $this->_item->getItem($usuario['item_id']);
		}
		return array_merge($usuario,$item);
    }
    
    public function getPermisosUsuario($usuarioID){
        $acl = new ACL($usuarioID);
        return $acl->getPermisos();
    }
    
    public function getPermisosRole($usuarioID){
        $acl = new ACL($usuarioID);
        return $acl->getPermisosRole();
    }
    
    public function eliminarPermiso($usuarioID, $permisoID){
        $this->_db->query(
                "delete from permisos_usuario where ".
                "usuario = $usuarioID and permiso = $permisoID"
                );
    }
    
    public function editarPermiso($usuarioID, $permisoID, $valor){
        $this->_db->query(
                "replace into permisos_usuario set ".
                "usuario = $usuarioID , permiso = $permisoID, valor ='$valor'"
                );
    }
	
	public function editarUser($id,$datos){
		//$this->item->editarItem($datos); //POR EL MOMENTO NO LO ESTOY USANDO PARA EDITAR DATOS DEL ITEM
		$this->_db->query("UPDATE usuarios SET `pass` = '".Hash::getHash('sha1', $datos['password'], HASH_KEY)."' WHERE `id` = ".$id);
	}
	
	public function eliminar($id){
		// ELIMINO EL ITEM
		if(isset($this->_item)){
			$datos = $this->_db->query("SELECT * FROM usuarios WHERE id = ".$id);
			$usuario = $datos->fetch();
			$item = $this->_item->eliminar($usuario['item_id']);
		} else {
			$item = true;
		}
		// ELIMINO AL USUARIO
		$user = $this->_db->query("DELETE FROM usuarios WHERE id = ".$id);
		if(($user != false) and $item){
			return true;
		} else{
			return false;
		}
	}
	
	public function getItem($usuarioID){
		return $this->_item;
	}
	
	
// ------------------------------ INICIO DE SESION  ------------------------------ //
	
	public function getUsuarioLogin($usuario, $password){
        $datos = $this->_db->query(
                "select * from usuarios " .
                "where usuario = '$usuario' " .
                "and pass = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'"
                );
        
		if ($datos->rowCount() > 0){
        	$usuario = $datos->fetch();
			$item = array();
			if(isset($this->_item)){
				$item = $this->_item->getItem($usuario['item_id']);
			}
			return array_merge($usuario,$item);
		}
		return false;
    }
	
	
// ------------------------------ REGISTRO ------------------------------ //
	
	public function verificarUsuario($usuario){
        $id = $this->_db->query(
                "select id, codigo from usuarios where usuario = '$usuario'"
                );
        
        return $id->fetch();
    }
	
	public function verificarEmail($email){
        $id = $this->_db->query(
                "select id from usuarios where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
	
	public function registrarUsuario($datos){
		
		//CREO EL ITEM Y LUEGO SE LO ASIGNO AL USUARIO
		if(isset($this->_item)){
			$item_id = $this->_item->setDatos($datos);
		} else {
			$item_id = null;
		}
		
    	$random = rand(1782598471, 2147483647);
		
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
	
	public function getUsuarioByCodigo($id, $codigo){
		$usuario = $this->_db->query(
					"select * from usuarios where id = $id and codigo = '$codigo'"
					);
					
		return $usuario->fetch();
	}
	
	public function activarUsuario($id, $codigo){
		$this->_db->query(
					"update usuarios set estado = 1 " .
					"where id = $id and codigo = '$codigo'"
					);
	}	
	
}

?>
