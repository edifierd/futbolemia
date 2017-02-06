<?PHP

define('APP_NAME', 'Panana Be Argentina');
define('APP_SLOGAN', 'Panana Be Trajes de Baño');
define('URL', 'www.pananabe.com.ar');
define('FACEBOOK', 'https://www.facebook.com/pananabeok');
define('INSTAGRAM', 'https://www.instagram.com/pananabeok/');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./bootstrap.min.css" media="screen" />
<link rel="icon" type="image/png" href="./icono.ico" />
<title><?php echo APP_NAME; ?></title>

<style>

body {
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background: #FFF;
   color: #000;
   font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
   font-size: 15px;
   text-align:center;
}

.barraSuperior{
	position:relative;
	left:0;
	top:0;
	height:55px;
	width:100%;
	background-color: #FFF;
}

.barraNegra{
	position:fixed;
	left:0;
	bottom:0;
	padding: 15px;
	height:auto;
	width:100%;
	background-color: #666;
	color: #FFF;
	border-top: 1px solid #000;
}
</style>

</head>

<body>

	<div class="barraSuperior">
    	<div style="float:right; margin-right: 75px; margin-top: 10px;">
        	<a href="<?php echo INSTAGRAM; ?>" title="Instagram <?php echo APP_NAME; ?>" target="_blank">
            	<img src="instagram.png" style="margin-right:10px; height:40px; width:40px;" />
            </a>
            
        	<a href="<?php echo FACEBOOK; ?>" title="Facebook <?php echo APP_NAME; ?>" target="_blank">
            	<img src="facebook.png" style="margin-right:10px; height:40px; width:40px;" />
            </a>
            
            <a href="mailto:fedproducciones@gmail.com" title="Contacto Administrador">
            	<img src="carta.png" style="margin-right:10px; height:40px; width:40px;" />
            </a>
		</div>
	</div>
    
    <h1><?php echo APP_NAME; ?></h1>
    
  	<img src="enConstruccion.png" style=" margin: 0 auto; margin-top: 3%;" class="img-responsive" 
    	 alt="Nos encontramos en Construccion" 
         title="<?php echo APP_NAME; ?>"
    />
    

	<div class="barraNegra">
        <?php echo APP_SLOGAN; ?> le informa que nos encontramos en mantenimiento, vuelva pronto !
	</div>

</body>
</html>
