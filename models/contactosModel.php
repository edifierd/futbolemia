<?php

class contactosModel extends Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function insertarMensajeContacto($nombre, $apellido, $localidad, $correo, $telefono, $mensaje){
        $this->_db->prepare("INSERT INTO contactos VALUES (null, :apellido, :nombre, :localidad, :correo, :telefono, :mensaje)") ->execute(
                        array(
						   ':apellido' => $apellido,
						   ':nombre' => $nombre,
						   ':localidad' => $localidad,
						   ':correo' => $correo,
						   ':telefono' => $telefono,
						   ':mensaje' => $mensaje
                        ));
		$this->error(); exit;
    }
	
}

?>