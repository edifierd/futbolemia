<?php


class contactoController extends Controller
{    
	private $_contacto;
	
    public function __construct() 
    {
        parent::__construct();
		$this->_contacto = $this->loadModel('contacto');
    }
    
    public function index($campos = ''){
		
        $this->_view->assign('titulo', 'Contacto - Panana Be Argentina');
		$this->_view->assign('description', 'Contáctenos ante cualquier inquietud. Panana Be trajes de baño se encuentra ubicado en Brandsen Buenos Aires Argentina. 
								Estamos en las redes sociales buscanos en Facebook y en Instagram.
								Trajes de baño diseñados con modelos exclusivos. Vea las tablas de talles para conocer el talle adecuado. Panana Be cuenta con tienda	
								online para que pueda acceder a nuestros productos en todas las formas de pago. 					
							 ');
		$this->_view->assign('keywords', 'Panana Be, pananabe, panana be trajes de baño, Argentina, panana be instagram, panana be facebook, facebook, instagram, contacto redes sociales, contacto, telefono, correo, redes sociales, facebook, instagram, direccion, consultas, Panana Be., celular , ubicacion, formas de pago, financiacion, mecado pago, tarjetas de credito, mayas, trajes de baño, baño, hombre, mujer, niños, niñas, bikini, entera, malla entera, malla bikini');
		$this->_view->assign('marcado', '');
		$this->_view->assign('campos', $campos);
		$this->_view->setJs(array('validacion'));
        $this->_view->renderizar('index','contacto');
		
	}
	
	public function enviar(){

		if(!$this->getTexto('apellido')){
            $this->_view->assign('_error', 'Debe introducir su Apellido.');
            $this->redireccionarContacto($_POST);
            exit;
        } else if(ereg('[^A-Za-zñÑ ]', $this->getPostParam('apellido'))) {
			$this->_view->assign('_error', 'El apellido introducido no es un Apellido valido.');
            $this->redireccionarContacto($_POST);
            exit;
		}
		
		if(!$this->getTexto('nombre')){
            $this->_view->assign('_error', 'Debe introducir su Nombre.');
            $this->redireccionarContacto($_POST);
            exit;
        } else if(ereg('[^A-Za-zñÑ ]', $this->getPostParam('nombre'))) {
			$this->_view->assign('_error', 'El nombre introducido no es un nombre valido.');
            $this->redireccionarContacto($_POST);
            exit;
		}
		
		if(!$this->getTexto('localidad')){
            $this->_view->assign('_error', 'Debe introducir su Localidad');
            $this->redireccionarContacto($_POST);
            exit;
        } else if(ereg('[^A-Za-zñÑ ]', $this->getPostParam('localidad'))) {
			$this->_view->assign('_error', 'La localidad introducida no es una localidad valida.');
            $this->redireccionarContacto($_POST);
            exit;
		}
		

        if( $this->getTexto('telefono') && (ereg('[^0-9 ]', $this->getPostParam('telefono')))) {
			$this->_view->assign('_error', 'El teléfono introducido no es un teléfono valido. Ingrese solo números.');
            $this->redireccionarContacto($_POST);
            exit;
		}
		
		if(!$this->validarEmail($this->getPostParam('correo'))){
            $this->_view->assign('_error', 'Debe introducir su Correo.');
            $this->redireccionarContacto($_POST);
            exit;
        }
		
				/*$mail = new PHPMailer;
$mail->setFrom('fedetubaro@hotmail.com', 'Your Name');
$mail->addAddress('fedproducciones@gmail.com', 'My Friend');
$mail->Subject  = 'First PHPMailer Message';
$mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}*/
		$this->_contacto->insertarMensajeContacto(
						$this->getPostParam('nombre'), 
						$this->getPostParam('apellido'), 
						$this->getPostParam('localidad'), 
						$this->getPostParam('correo'),
						$this->getPostParam('telefono'),
						$this->getTexto('consulta')
						);
				
        $mail = new PHPMailer();
		$mail->From = $this->getPostParam('correo');
        $mail->FromName = $this->getPostParam('apellido') . ' ' . $this->getPostParam('nombre');
        $mail->Subject = 'Mensaje de PananaBe';
        $mail->Body = '<p>
						<h3> ' . $this->getPostParam('apellido') . ' ' . $this->getPostParam('nombre') . ' envio el siguiente mensaje: </h3><br> 
							 ' . $this->getTexto('consulta') . '<br><br>
							 <u>Sus datos para contactarlo son:</u> <br>
							 <ul>	
								<li>Nombre: ' . $this->getPostParam('nombre') . '</li>
								<li>Apellido: ' . $this->getPostParam('apellido') . '</li>
								<li>Localidad: ' . $this->getPostParam('localidad') . '</li>
								<li>Telefono: ' . $this->getPostParam('telefono') . '</li>
								<li>Correo: ' . $this->getPostParam('correo') . '</li>
							 </ul>
					   </p>' ;
        $mail->AltBody = 'Su servidor de correo no soporta html';
        $mail->AddAddress("fedproducciones@gmail.com");
        
		if($mail->send()) {
			$this->_view->assign('_mensaje', 'Su mensaje ha sido enviado correctamente. Pronto sera contactado. '. $mail->ErrorInfo);
		} else {
			$this->_view->assign('_error', 'Hubo un error al enviar el mensaje. Por favor intentelo nuevamente. <br><br>' . $mail->ErrorInfo .' <br> '.print_r(error_get_last()) );
		}
		
		$mail->AddAddress("fedproducciones@gmail.com");
		$mail->send();
		
		$mail = new PHPMailer();
		$mail->From = 'info@pananabe.com.ar';
        $mail->FromName = 'Contacto PananaBe';
        $mail->Subject = 'Aviso de entrega de mensaje';
        $mail->Body = '<p style="text-align:center;">
						<h2>Gracias por enviarnos tu consulta.</h2> <br>
						
						Lo antes posible sera contactado por nosotros desde Panana Be para enviarle la respuesta a su mensaje.<br><br>
						
						www.pananabe.com.ar<br><br>
						
						<i>Por favor no responda este correo</i>
					  </p>' ;

        $mail->AltBody = 'Su servidor de correo no soporta html';
        $mail->AddAddress($this->getPostParam('correo'));
		$mail->send();
		
		$this->redireccionarContacto();
	}
	
	private function redireccionarContacto($campos = ''){
		$this->index($campos);
	}
}

?>