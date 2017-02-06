<?php

class prendaController extends Controller
{
    private $_prenda;

    public function __construct() 
    {
        parent::__construct();
        $this->_prenda = $this->loadModel('prenda');
    }
	
	public function index(){	
		$this->todo();
    }
	
	public function todo(){	
		//echo "Session Index= ".Session::get("rubro");
		Session::set("rubro",0);
    	$paginador = new Paginador();
        $this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(),false,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
				
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', 'Trajes de baño Panana Be.Vea mallas para Hombre, Mujer, Niños y Niñas. Todos los talles y modelos disponibles como Bikini o mallas enteras. Contamos con todas las formas de pago. Tarjeta de credito. ');
		$this->_view->assign('keywords', 'panana, panana be, pananabe, panana be argentina, argentina, traje de baño panana be, traje de baño argentina, malla, traje, traje de baño, hombre, mujer, niño, niña, malla hombre, malla mujer, bikini, bikini mujer, entera, malla entera, malla entera mujer, formas de pago, talles, tarjeta, cuotas, modelo, modelos, short, short hombre, temporada, año');
        $this->_view->assign('titulo', 'Todos los modelos - Panana Be Argentina');
		$this->_view->assign('tituloAuxiliar','');
		$this->_view->setJs(array('paginadorIndex'));
        $this->_view->renderizar('index', 'todo');
    }
	
	public function hombre(){
		Session::set("rubro",1);
		//echo "Session  hombre = ".$_SESSION["rubro"];
    	$paginador = new Paginador();
        $this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(1),false,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
				
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', 'Trajes de baño Panana Be.Vea mallas para Hombre todos los talles y modelos disponibles. Contamos con todas las formas de pago. Tarjeta de credito. Todos los talles. ');
		$this->_view->assign('keywords', 'panana, panana be, pananabe, panana be argentina, argentina, traje de baño panana be, traje de baño argentina, malla, traje, traje de baño, hombre, mujer, niño, niña, malla hombre, malla mujer, bikini, bikini mujer, entera, malla entera, malla entera mujer, formas de pago, talles, tarjeta, cuotas, modelo, modelos, short, short hombre, temporada, año');
        $this->_view->assign('titulo', 'Hombre trajes de baño - Panana Be Argentina');
		$this->_view->assign('tituloAuxiliar','para Hombre');
		$this->_view->setJs(array('paginadorIndex'));
        $this->_view->renderizar('index', 'hombre');
    }
	
	public function mujer(){	
		Session::set("rubro",2);
		//echo "Session  hombre = ".Session::get("rubro");
    	$paginador = new Paginador();
        $this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(2),false,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
				
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', 'Trajes de baño Panana Be.Vea mallas para Mujer todos los talles y modelos disponibles como bikini o malla enteras. Contamos con todas las formas de pago. Tarjeta de credito. Todos los talles. ');
		$this->_view->assign('keywords', 'panana, panana be, pananabe, panana be argentina, argentina, traje de baño panana be, traje de baño argentina, malla, traje, traje de baño, hombre, mujer, niño, niña, malla hombre, malla mujer, bikini, bikini mujer, entera, malla entera, malla entera mujer, formas de pago, talles, tarjeta, cuotas, modelo, modelos, short, short hombre, temporada, año');
        $this->_view->assign('titulo', 'Mujer trajes de baño - Panana Be Argentina');
		$this->_view->assign('tituloAuxiliar','para Mujer');
		$this->_view->setJs(array('paginadorIndex'));
        $this->_view->renderizar('index', 'mujer');
    }

	public function bikini(){	
		Session::set("rubro",3);
    	$paginador = new Paginador();
        $this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(3),false,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
				
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', 'Trajes de baño Panana Be.Vea mallas para Mujer todos los modelos disponibles en Bikinis. Contamos con todas las formas de pago. Tarjeta de credito. Todos los talles. ');
		$this->_view->assign('keywords', 'panana, panana be, pananabe, panana be argentina, argentina, traje de baño panana be, traje de baño argentina, malla, traje, traje de baño, hombre, mujer, niño, niña, malla hombre, malla mujer, bikini, bikini mujer, entera, malla entera, malla entera mujer, formas de pago, talles, tarjeta, cuotas, modelo, modelos, short, short hombre, temporada, año');
        $this->_view->assign('titulo', 'Bikini Mujer trajes de baño - Panana Be Argentina');
		$this->_view->assign('tituloAuxiliar',' bikinis para Mujer');
		$this->_view->setJs(array('paginadorIndex'));
        $this->_view->renderizar('index', 'mujer');
    }
	
	public function entera(){	
		Session::set("rubro",4);
    	$paginador = new Paginador();
        $this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(4),false,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
				
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', 'Trajes de baño Panana Be.Vea mallas para Mujer todos los modelos disponibles en Bikinis. Contamos con todas las formas de pago. Tarjeta de credito. Todos los talles.');
		$this->_view->assign('keywords', 'panana, panana be, pananabe, panana be argentina, argentina, traje de baño panana be, traje de baño argentina, malla, traje, traje de baño, hombre, mujer, niño, niña, malla hombre, malla mujer, bikini, bikini mujer, entera, malla entera, malla entera mujer, formas de pago, talles, tarjeta, cuotas, modelo, modelos, short, short hombre, temporada, año');
        $this->_view->assign('titulo', 'entera Mujer trajes de baño - Panana Be Argentina');
		$this->_view->assign('tituloAuxiliar',' enteras para Mujer');
		$this->_view->setJs(array('paginadorIndex'));
        $this->_view->renderizar('index', 'mujer');
    }
	
	public function paginador(){
		$rubro = Session::get("rubro");
		//echo "Session Paginador = ".$_SESSION["rubro"];
		
		$pagina = $this->getInt('pagina'); //Recibe el numero de la pagina por POST
		
		$paginador = new Paginador();
		$this->_view->assign('prendas', $paginador->paginar($this->_prenda->all($rubro), $pagina,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
		
		$_params = array(
			'root' => BASE_URL,
		);
		
		$this->_view->assign('_layoutParams', $_params);	
		$this->_view->renderizar('ajax/listaPrendas', false, true);
	}
	
	public function show($id)
    {
        if(!$this->filtrarInt($id)){
            $this->redireccionar('prenda');
        }
        
        if(!$this->_prenda->find($this->filtrarInt($id))){
            $this->redireccionar('prenda');
        }
		
		$prenda =  $this->_prenda->find($this->filtrarInt($id));
		
        $this->_view->assign('marcado', '
		<script type="application/ld+json">
			{
  			"@context": "http://schema.org",
  			"@type": "Product",
  			"description": "'.$prenda['descripcion'].'",
  			"name": "'.$prenda['nombre'].'",
  			"image": "'.BASE_URL.'public/img/prendas/'.$prenda['foto_frente'].'",
  			"offers": {
    			"@type": "Offer",
    			"availability": "'.BASE_URL.'prenda/show/'.$prenda['id'].'",
    			"price": "'.$prenda['precio'].'",
    			"priceCurrency": "Peso ARG"
  			},
  			"url": "'.BASE_URL.'prenda/show/'.$prenda['id'].'"
			}
		</script>
		');
		$this->_view->assign('description', 'Traje de baño modelo '.$prenda['nombre'].' Panana Be Argentina para '.$prenda['genero'].'. Temporada '.$prenda['temporada'].' '.$prenda['descripcion']);
		$this->_view->assign('keywords', $prenda['nombre'].','.$prenda['nombre'].' Panana Be,'.$prenda['nombre'].' temporada '.$prenda['temporada'].', panana, panana be, pananabe, panana be argentina, argentina, traje de baño panana be, traje de baño argentina, malla, traje, traje de baño, hombre, mujer, niño, niña, malla hombre, malla mujer, bikini, bikini mujer, entera, malla entera, malla entera mujer, formas de pago, talles, tarjeta, cuotas, modelo, modelos, short, short hombre, temporada, año');
        $this->_view->assign('titulo', $prenda['nombre']."- Panana Be Argentina");
        $this->_view->setCss(array('estilos'));
		$this->_view->setJs(array('validacionTalleCantidad'));
		$this->_view->assign('datos',$prenda);
        $this->_view->renderizar('show', '');
    }
	
	public function tabla_de_talles(){
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', 'Tabla de talles Panana Be Argentina. Encuentre todos nuestros modelos en el listada de hombre y mujer. ');
		$this->_view->assign('keywords', 'panana, panana be, pananabe, panana be argentina, argentina, traje de baño panana be, traje de baño argentina, malla, traje, traje de baño, hombre, mujer, niño, niña, malla hombre, malla mujer, bikini, bikini mujer, entera, malla entera, malla entera mujer, formas de pago, talles, tarjeta, cuotas, modelo, modelos, short, short hombre, temporada, año');
        $this->_view->assign('titulo', "Tabla de Talles - Panana Be Argentina");
        $this->_view->renderizar('tablaTalles', '');
	}
   
   /*
   public function prueba($pagina = false){
		
	$paginador = new Paginador();
		
        //$ajaxModel = $this->loadModel('ajax');
        $this->_view->setJs(array('prueba'));
        $this->_view->assign('posts', $paginador->paginar($this->_prenda->getPrendas()),false,9,false);
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
		
        $this->_view->assign('marcado', '');
		$this->_view->assign('description', '');
		$this->_view->assign('keywords', '');
        $this->_view->assign('titulo', 'Ver Todo');
        $this->_view->renderizar('prueba', 'prueba');
   }
   
   
   public function index($pagina = false)
    {
        if(!$this->filtrarInt($pagina)){
           $pagina = false;
        }
        else{
           $pagina = (int) $pagina;
        }
		
    	$this->getLibrary('class.paginador');
		$paginador = new Paginador();
		
		
		$this->_view->setJs(array('prueba'));
        $this->_view->assign('posts', $paginador->paginar($this->_post->getPrendas(), $pagina));
		$this->_view->assign('paginacion', $paginador->getView('prueba','prenda/index'));
		
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', '');
		$this->_view->assign('keywords', '');
        $this->_view->assign('titulo', 'Ver Todo');
		
        $this->_view->renderizar('index', 'todo');
    }*/
	
		/*public function paginadorEntera(){
		$pagina = $this->getInt('pagina'); //Recibe el numero de la pagina por POST
		
		$paginador = new Paginador();
		
		$this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(3), $pagina,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
		
		$_params = array(
			'root' => BASE_URL,
		);
		
		$this->_view->assign('_layoutParams', $_params);
		
		$this->_view->renderizar('ajax/listaPrendas', false, true);
	}*/
	
	
	/*public function paginadorBikini(){
		$pagina = $this->getInt('pagina'); //Recibe el numero de la pagina por POST
		
		$paginador = new Paginador();
		
		$this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(2), $pagina,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
		
		$_params = array(
			'root' => BASE_URL,
		);
		
		$this->_view->assign('_layoutParams', $_params);
		
		$this->_view->renderizar('ajax/listaPrendas', false, true);
	}*/
	
	
	/*public function paginadorMujer(){
		$pagina = $this->getInt('pagina'); //Recibe el numero de la pagina por POST
		
		$paginador = new Paginador();
		
		$this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(4), $pagina,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
		
		$_params = array(
			'root' => BASE_URL,
		);
		
		$this->_view->assign('_layoutParams', $_params);
		
		$this->_view->renderizar('ajax/listaPrendas', false, true);
	}*/
	
	/*public function paginadorHombre(){
		$pagina = $this->getInt('pagina'); //Recibe el numero de la pagina por POST
		
		$paginador = new Paginador();
		
		$this->_view->assign('prendas', $paginador->paginar($this->_prenda->all(1), $pagina,8));
		$this->_view->assign('paginacion', $paginador->getView('paginacion_ajax'));
		
		$_params = array(
			'root' => BASE_URL,
		);
		
		$this->_view->assign('_layoutParams', $_params);
		
		$this->_view->renderizar('ajax/listaPrendas', false, true);
	}*/
}

?>
