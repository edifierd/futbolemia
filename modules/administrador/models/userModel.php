<?php

class userModel extends Model{
	
	private $_item;
	
    public function __construct(){
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
    
    public function getUsuarios()
    {
        $usuarios = $this->_db->query(
                "select u.*,r.role from usuarios u, roles r ".
                "where u.role = r.id_role"
                );
        return $usuarios->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUsuario($usuarioID){
         $usuarios = $this->_db->query(
                "select * from usuarios u, roles r ".
                "where u.role = r.id_role and u.id = $usuarioID"
                );
		 $usuario = $usuarios->fetch();
         return array_merge($usuario,$this->_item->getItem($usuario['item_id']));
    }
    
    public function getPermisosUsuario($usuarioID)
    {
        $acl = new ACL($usuarioID);
        return $acl->getPermisos();
    }
    
    public function getPermisosRole($usuarioID)
    {
        $acl = new ACL($usuarioID);
        return $acl->getPermisosRole();
    }
    
    public function eliminarPermiso($usuarioID, $permisoID)
    {
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
		$datos = $this->_db->query("SELECT * FROM usuarios WHERE id = ".$id);
		$usuario = $datos->fetch();
		$user = $this->_db->query("DELETE FROM usuarios WHERE id = ".$id);
		$item = $this->_item->eliminar($usuario['item_id']);
		if(($user != false) and $item){
			return true;
		} else{
			return false;
		}
	}
	
	public function getItem($usuarioID){
		return $this->_item;
	}
}

?>
