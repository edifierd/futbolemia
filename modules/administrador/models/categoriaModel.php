<?php

class categoriaModel extends Model
{
	
    public function __construct() {
        parent::__construct();
    }
	
	public function all($genero = ''){
		if($genero == ''){
			$categorias = $this->_db->query(" 
				SELECT * 
				FROM categoria AND id > 2
			");
		} else {
			$categorias = $this->_db->query("
				SELECT * 
				FROM categoria  
				WHERE genero = '".$genero."' AND id > 2
		 	");

		}
		return $categorias->fetchall();
	
	}
	
}


?>