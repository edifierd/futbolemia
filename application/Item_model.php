<?php

abstract class Item_model extends Model
{
    public function __construct($modelName) {
        parent::__construct($modelName);
    }
    
    abstract public function setDatos($datos);
	
}

?>
