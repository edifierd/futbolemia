<?php

class aclModel extends Model
{
    public function __construct(){
        parent::__construct('acl');
    }
	
// ---------- PERMISOS ---------- //

	public function getPermisosAll(){
        $permisos = $this->_db->query(
                "SELECT * FROM permisos"
                );
                
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        
        for($i = 0; $i < count($permisos); $i++){
            $data[$permisos[$i]['key']] = array(
                'key' => $permisos[$i]['key'],
                'valor' => 'x',
                'nombre' => $permisos[$i]['permiso'],
                'id' => $permisos[$i]['id_permiso']
            );
        }
        return $data;
    }

	public function getPermisos(){
        $permisos = $this->_db->query("SELECT * FROM permisos");
        
        return $permisos->fetchAll(PDO::FETCH_ASSOC);
    }

	public function getPermiso($permisoID){
		$permisos = $this->_db->query(
                "SELECT * FROM permisos WHERE id_permiso = ".$permisoID
                );
		return $permisos->fetch();
	}
	
	public function getPermisoNombre($permisoID){
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "SELECT permiso FROM permisos WHERE id_permiso = $permisoID"
                );
        
        $key = $key->fetch();
        return $key['permiso'];
    }
	
	public function getPermisoKey($permisoID){
        $permisoID = (int) $permisoID;
        
        $key = $this->_db->query(
                "SELECT `key` FROM permisos WHERE id_permiso = $permisoID"
                );
        
        $key = $key->fetch();
        return $key['key'];
    }

    public function insertarPermiso($permiso, $llave){
        $this->_db->query(
                "INSERT INTO permisos VALUES" .
                "(null, '{$permiso}', '{$llave}')"
                );
    }
	
	public function deletePermiso($id){
        $id = (int) $id;
		if($this->_db->query("DELETE FROM permisos_role WHERE permiso = $id")){
			return $this->_db->query("DELETE FROM permisos WHERE id_permiso = $id");
		}
        return false;
    }
	
	public function editPermiso($id,$nombre, $key){
		$id = (int) $id;
        
        return $this->_db->prepare("UPDATE permisos SET `permiso` = :nombre, `key` = :key WHERE `id_permiso` = :id")
                ->execute(
                        array(
						   ':nombre' => $nombre,
						   ':key' => $key,
                           ':id' => $id
                        ));	
	}
	

// ---------- ROL ---------- //

    public function getRoles(){
        $roles = $this->_db->query("SELECT * FROM roles");
        
        return $roles->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public function getRole($roleID){
        $roleID = (int) $roleID;
        
        $role = $this->_db->query("SELECT * FROM roles WHERE id_role = {$roleID}");
        return $role->fetch();
    }

    public function insertarRole($role){
        $this->_db->query("INSERT INTO roles VALUES(null, '{$role}')");
    }
	
	public function deleteRole($id){
        $id = (int) $id;
		if($this->_db->query("DELETE FROM permisos_role WHERE role = $id")){
			return $this->_db->query("DELETE FROM roles WHERE id_role = $id");
		}
        return false;
    }
	
	public function editRole($id,$role){
		$id = (int) $id;
        
        return $this->_db->prepare("UPDATE roles SET role = :nombreRole WHERE id_role = :id")
                ->execute(
                        array(
						   ':nombreRole' => $role,
                           ':id' => $id
                        ));	
	}

// ---------- PERMISO ROL ---------- //
    
    public function getPermisosRole($roleID){
        $data = array();
        
        $permisos = $this->_db->query(
                "SELECT * FROM permisos_role WHERE role = {$roleID}"
                );
                
        $permisos = $permisos->fetchAll(PDO::FETCH_ASSOC);
        
        for($i = 0; $i < count($permisos); $i++){
            $key = $this->getPermisoKey($permisos[$i]['permiso']);
            
            if($key == ''){continue;}
            if($permisos[$i]['valor'] == 1){
                $v = true;
            }
            else{
                $v = false;
            }
            
            $data[$key] = array(
                'key' => $key,
                'valor' => $v,
                'nombre' => $this->getPermisoNombre($permisos[$i]['permiso']),
                'id' => $permisos[$i]['permiso']
            );
        }
        
        $todos = $this->getPermisosAll();
        $data = array_merge($todos, $data);
        
        return $data;
    }
	
    public function eliminarPermisoRole($roleID, $permisoID){
        $this->_db->query(
                "DELETE FROM permisos_role " . 
                "WHERE permiso = {$permisoID} " .
                "AND role = {$roleID}"
                );
    }

    public function editarPermisoRole($roleID, $permisoID, $valor){
        $this->_db->query(
                "replace into permisos_role set role = {$roleID}, permiso = {$permisoID}, valor = '{$valor}'"
                );
    }

}

?>
