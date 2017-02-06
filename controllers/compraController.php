<?PHP

//?collection_id=1867040&collection_status=pending&preference_id=232116276-d185f7cf-36e7-4c48-9e62-e5750f9ea99b&external_reference=null&payment_type=ticket&merchant_order_id=null

//http://localhost/pananabe/pananabe/compra/rta/?collection_id=1867040&collection_status=pending&preference_id=232116276-d185f7cf-36e7-4c48-9e62-e5750f9ea99b&external_reference=null&payment_type=ticket&merchant_order_id=null

class compraController extends Controller
{
    private $_prenda;
	private $_user;
	private $_venta;

    public function __construct() 
    {
        parent::__construct();
        $this->_prenda = $this->loadModel('prenda');
		$this->_user = $this->loadModel('user');
		$this->_venta = $this->loadModel('venta');
    }
	
	public function index(){}
	
	public function mercadoPago($producto,$cantidad,$talle,$user){
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', '');
		$this->_view->assign('keywords', '');
        $this->_view->assign('titulo', 'MercadoPago - Panana Be Argentina');
		$this->_view->setJs(array('refrescarPagina'));
		$this->getLibrary('mercadoPago/class.mercadopago');
		
		if($this->_prenda->decrementarStock($producto['id'],$talle,$cantidad)){
			
			$fecha = date(DATE_ATOM);
			
			$mp = new MP ("6022230882957804","7LRdLDvcyApShD2yUHNnPeXCxcSssaiv");
			$mp->sandbox_mode(FALSE);
		
		
			$preference_data = array(
    			"items" => array(
        			array(
						"id" => "item-ID-".$producto['id'],
						"title" => $producto['nombre'].", talle ".$talle,
						"currency_id"=> "ARS",
						"picture_url" => "https://static.e-junkie.com/sslpic/169186.2c4152d386db0187b6bb0084b1597b41.gif", 
						"description" => $producto['descripcion'],
						"category_id" => "fashion", // Available categories at https://api.mercadopago.com/item_categories
						"quantity" => (int) $cantidad,
						"unit_price" => (int) $producto['precio']
        			)
				),	
				"payer" => array(
					"name" => $user['name'],
					"surname" => $user['surname'],
					"email" => $user['email'],
					"date_created" => $fecha,
					"phone" => array(
						"area_code" => $user['area_phone_code'],
						"number" => $user['phone_number']
					),
					"identification" => array(
						"type" => "DNI",
						"number" => $user['document_number']
					)
				)
			);
		
			$this->_venta->insertarVenta($fecha, $cantidad, $talle, $producto['precio'], $user['id'], $producto['id']);
			$venta = $this->_venta->last();
			$this->_view->assign('id_venta', $venta['id_venta']);
			$this->_view->assign('datos', $producto);
			$this->_view->assign('talle', $talle);
			$this->_view->assign('cantidad', $cantidad);
			$this->_view->assign('total',$cantidad * $producto['precio']);
			$this->_view->assign('preference',$mp->create_preference($preference_data));
			$this->_view->renderizar('mercadoPago', '');
		} else {
			$this->_view->assign('datos', $producto);
			$this->_view->assign('talle', $talle);
			$this->_view->assign('_error', 'No se cuenta con suficiente stock en talle '.$talle.'. Ingrese una nueva cantidad.');
			$this->_view->renderizar('error', '');
		}
	}
	
	
	public function user_email($pruductId){
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', '');
		$this->_view->assign('keywords', '');
        $this->_view->assign('titulo', 'Verificación de usuario - PananaBe Argentina');
		
		if(!$this->validarEmail($this->getPostParam('correo'))){
			
			if(!$this->getTexto('talle') or ($this->getTexto('talle') == "null")){
            	$this->redireccionar("prenda/show/".$pruductId);
            	exit;
        	} else if(!$this->getInt('cantidad')) {
            	$this->redireccionar("prenda/show/".$pruductId);
           		exit;
			}
		
			$prenda = $this->getPrenda($pruductId);
			$this->_view->assign('datos', $prenda);
			$this->_view->assign('campos', $_POST);
			$this->_view->assign('total',$this->getInt('cantidad') * $prenda['precio']);
			$this->_view->setJs(array('validarCorreo'));
			$this->_view->renderizar('user_email', '');
		} else if($this->_user->findByEmail($this->getPostParam('correo'))){

			$this->mercadoPago(
				$this->getPrenda($pruductId),$this->getInt('cantidad'),$this->getTexto('talle'),$this->_user->findByEmail($this->getPostParam('correo'))
			);
			
		} else {
			$prenda = $this->getPrenda($pruductId);
			$this->_view->assign('datos', $prenda);
			$this->_view->assign('talle', $this->getTexto('talle'));
			$this->_view->assign('cantidad', $this->getInt('cantidad'));
			$this->_view->assign('total',$this->getInt('cantidad') * $prenda['precio']);
			$this->_view->assign('email',$this->getPostParam('correo')); 
			$this->_view->setJs(array('validarDatosUser'));
			$this->_view->renderizar('user_info', '');
		}
	}
	
	public function registrarUsuario(){
		
		if( $this->_user->add(
			$this->getTexto('name'),$this->getTexto('surname'),
			$this->getPostParam('email'),$this->getTexto('area_phone_code'),
			$this->getTexto('phone_number'),$this->getTexto('document_number') )
		){
			$this->mercadoPago(
			$this->getPrenda($this->getInt('idProducto')),$this->getInt('cantidad'),$this->getTexto('talle'),$this->_user->findByEmail($this->getPostParam('email'))
			);
		} else {
			$this->_view->assign('marcado', '');
			$this->_view->assign('description', '');
			$this->_view->assign('keywords', '');
        	$this->_view->assign('titulo', 'Registrate - PananaBe Argentina');
			
			$prenda = $this->getPrenda($this->getTexto('idProducto'));
			$this->_view->assign('datos', $prenda);
			$this->_view->assign('talle', $this->getTexto('talle'));
			$this->_view->assign('cantidad', $this->getInt('cantidad'));
			$this->_view->assign('total',$this->getInt('cantidad') * $prenda['precio']);
			$this->_view->assign('email',$this->getPostParam('email'));
			$this->_view->assign('campos',$_POST);
			$this->_view->assign('_error', 'Se ha producido un error. Por Favor inente nuevamente. <br> 
									<i>Si usted ya compro antes ingrese el correo con el que realizo la compra</i>');
			$this->_view->renderizar('user_info', '');
		}
	}
		
	public function exito($id_venta){
		
		if(!$this->filtrarInt($id_venta)){
            $this->redireccionar();
        }
		
		if(!$this->_venta->find($this->filtrarInt($id_venta))){
            $this->redireccionar();
        }
		$venta = $this->_venta->find($this->filtrarInt($id_venta));
		
		$this->_view->assign('venta', $venta);
		$this->_view->assign('prenda', $this->getPrenda($venta['id_prenda']));
		$this->_view->assign('user', $this->_user->find($venta['id_user']));
		$this->_view->assign('total', $venta['cant'] * $venta['precio']);
		
		$this->_view->assign('marcado', '');
		$this->_view->assign('description', '');
		$this->_view->assign('keywords', '');
        $this->_view->assign('titulo', 'Compra Exitosa - PananaBe Argentina');
		$this->_view->renderizar('exito', '');
	}
	
	
	private function getPrenda($id){
		if(!$this->filtrarInt($id)){
            $this->redireccionar('prenda');
        }
        
        if(!$this->_prenda->find($this->filtrarInt($id))){
            $this->redireccionar('prenda');
        }
		
		return $this->_prenda->find($this->filtrarInt($id));
	}
	
	private function redireccionarCompra($campos = ''){
		$this->index($campos);
	}

}

?>