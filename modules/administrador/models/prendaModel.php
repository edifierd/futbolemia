<?php

class prendaModel extends Model
{
	private $rubro;
	
    public function __construct() {
        parent::__construct();
    }
	
	
	public function all($rubro=false){
		
		if(!$rubro){
			//$prenda = $this->_db->query("SELECT * FROM prenda ORDER BY prenda.id DESC");	
			$prenda = $this->_db->query("
				SELECT p.id, p.nombre, p.descripcion,p.temporada, p.precio, p.S, p.M ,p. L ,p.XL, p.foto_frente, p.foto_atras, p.foto_perfil, c.nombre AS categoria, c.genero
				FROM prenda p INNER JOIN prenda_a_categoria pc ON pc.id_prenda = p.id
						      INNER JOIN categoria c ON pc.id_categoria = c.id
				ORDER BY P.id DESC
		 	");
		} else {
			$rubro = (int) $rubro;
			$prenda = $this->_db->query("
				SELECT p.id, p.nombre, p.descripcion, p.precio, p.foto_frente, c.nombre AS categoria, c.genero
				FROM prenda p INNER JOIN prenda_a_categoria pc ON pc.id_prenda = p.id
						      INNER JOIN categoria c ON pc.id_categoria = c.id
				WHERE pc.id_categoria = ".$rubro."
				ORDER BY p.id DESC
		 	");

		}
		return $prenda->fetchall();
	}

	public function find($id){
		$id = (int) $id;
        //$prenda = $this->_db->query("select * from prenda where id = $id");
		$prenda = $this->_db->query("
				SELECT p.id, p.nombre, p.descripcion,p.temporada, p.precio, p.S, p.M ,p. L ,p.XL, p.foto_frente, p.foto_atras, p.foto_perfil, c.nombre AS categoria, c.genero
				FROM prenda p INNER JOIN prenda_a_categoria pc ON pc.id_prenda = p.id
						      INNER JOIN categoria c ON pc.id_categoria = c.id
				WHERE p.id = ".$id."
		 	");
        return $prenda->fetch();
	}
	
	public function decrementarStock($id, $talle, $cantidad)
    {
        $id = (int) $id;
		
		$prenda = $this->find($id);
		
		if($prenda[$talle] >= $cantidad){
			$nuevoStock = (int) $prenda[$talle] - (int) $cantidad;
			$this->_db->prepare("UPDATE prenda SET ".$talle." = :cantidad WHERE id = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':cantidad' => $nuevoStock
                        ));
						
			return true;
		} 
		return false;
    }
	

    public function insertarPrenda($nombre, $descripcion, $temporada, $precio, $s, $m, $l, $xl, $categorias, $foto_frente = '', $foto_atras = '', $foto_perfil = '')
    {
        if ($this->insertarPrendaModelo($nombre, $descripcion, $temporada, $precio, $s, $m, $l, $xl, $foto_frente, $foto_atras, $foto_perfil)){
			$prenda = $this->last();
			foreach ($categorias as &$id_categoria){
				$this->insertarCategoria($prenda['id'],$id_categoria);
			}
			return true;
		} 
		return false;
    }
	
	private function insertarPrendaModelo($nombre, $descripcion, $temporada, $precio, $s, $m, $l, $xl, $foto_frente, $foto_atras, $foto_perfil){
		return $this->_db->prepare("INSERT INTO prenda (nombre, descripcion, temporada, precio, S, M, L, XL, foto_frente, foto_atras, foto_perfil)
									VALUES (:nombre, :descripcion, :temporada , :precio, :S, :M, :L, :XL , :foto_frente, :foto_atras, :foto_perfil)"
		)->execute(
        	array(
            	':nombre' => $nombre,
            	':descripcion' => $descripcion,
				':temporada' => $temporada,
				':precio' => $precio,
				':S' => $s,
				':M' => $m,
				':L' => $l,
				':XL' => $xl,
				':foto_frente' => $foto_frente,
				':foto_atras' => $foto_atras,
				':foto_perfil' => $foto_perfil
			));
	}
	
	private function insertarCategoria($id_prenda,$id_categoria){
		return $this->_db->prepare("INSERT INTO prenda_a_categoria VALUES (null, :id_prenda, :id_categoria )")->execute(
            	array(
                	 ':id_prenda' => $id_prenda,
					 ':id_categoria' => $id_categoria
                ));
	}
	
	public function last(){
		$venta = $this->_db->query("SELECT * FROM prenda ORDER BY prenda.id DESC LIMIT 1");	
		
		return $venta->fetch();
	}
	
	public function modificarFoto($id, $tipoFoto, $nombreFoto){
        $id = (int) $id;
		        
        $this->_db->prepare("UPDATE prenda SET ".$tipoFoto." = :nombre WHERE id = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':nombre' => $nombreFoto
                        ));
    }
	
	public function modificarEstado($id, $nuevoEstado){
        $id = (int) $id;
		        
        $this->_db->prepare("UPDATE prenda SET estado = :estado WHERE id = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':estado' => $nuevoEstado
                        ));
    }
    
}

?>
