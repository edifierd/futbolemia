<?php

class ventaModel extends Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	
	public function all(){
		$venta = $this->_db->query("SELECT * FROM venta");	
		
		return $venta->fetchall();
	}
	
	public function find($id){
		$id = (int) $id;
        $venta = $this->_db->query("select * from venta where venta.id_venta = $id");
        return $venta->fetch();
	}
	
	public function last(){
		$venta = $this->_db->query("SELECT * FROM venta ORDER BY venta.id_venta DESC LIMIT 1");	
		
		return $venta->fetch();
	}
	
	public function insertarVenta($fecha, $cant, $talle, $precio, $id_user, $id_prenda){
		
        $this->_db->prepare("INSERT INTO venta VALUES (null, :id_user, :fecha, :cant, :talle, :precio, :id_prenda)")
                ->execute(
                        array(
                           ':id_user' => $id_user,
                           ':fecha' => $fecha,
                           ':cant' => $cant,
						   ':talle' => $talle,
						   ':precio' => (int) $precio,
						   ':id_prenda' => $id_prenda
                        ));
    }
}