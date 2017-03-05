<?php

class indexController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){

        $this->_view->assign('titulo', 'Futbolemia Ecuelita no competitiva');
		$this->_view->assign('marcado', '
								<script type="application/ld+json">
								{
								"@context" : "http://schema.org",
								"@type" : "LocalBusiness",
								"name" : "Futbolemia. Escuela de fútbol no competitiva",
								"image" : "http://www.futbolemia.com.ar/public/img/logo.png",
								"telephone" : "",
								"email" : "contacto@futbolemia.com.ar",
								"address" : {
								"@type" : "PostalAddress",
								"addressLocality" : "La Plata",
								"addressRegion" : "Buenos Aires",
								"addressCountry" : "Argentina",
								"postalCode" : "1900"
								},
								"url" : "http://www.futbolemia.com.ar/"
								}
								</script>
							');
		$this->_view->assign('description', 'Futbolemia escuelita de fútbol no competitiva para nenes y nenas de 3 a 14 años. Nos encontramos ubicados en la ciudad de La Plata en nuestras tres sedes Los Hornos, El Retiro y La cumbre. Somos la Epidemia de fútbol mas grande de la ciudad. Veni a conocernos.  ');
		$this->_view->assign('keywords', 'Futbolemia, Futbolemia La Plata, Futbolemia Argentina, Futbolemia Futbol, Futbolemia nenas, Futbolemia nenes, Futbolemia escuela, Futbolemia escuelita, esculita Futbolemia, futbol nenas, futbol, nenes, de 3 a 14 años, La Plata, Argentina, Buenos Ares, Sedes La Cumbre, sede Los Hornos, sede El Retiro, El Retiro escuelita, Los Hornos escuelita, La Cumbre escuelita, niños y niñas, futbol no competitivo, profesores UNLP ');
		
        $this->_view->renderizar('index', 'inicio');
    }
	
	public function getModel($nombre){}
	
}

?>