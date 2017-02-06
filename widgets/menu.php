<?php

class menuWidget extends Widget
{
    private $modelo;
    
    public function __construct(){
        $this->modelo = $this->loadModel('menu');
    }
    
    public function getMenu()
    {
        $data['menu'] = $this->modelo->getMenu();
        return $this->render('menu-right', $data);
    }
    
    public function getConfig()
    {
        return array(
            'position' => 'sidebar',
            'show' => 'all',
            'hide' => array('inicio')
        );
    }
}

?>