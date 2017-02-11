<!DOCTYPE html>
<html lang="es">
<head>
        <title>{$titulo|default:"Sin t&iacute;tulo"}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimu-scale=1.0">
        <link rel="icon" type="image/png" href="{$_layoutParams.ruta_img}icono.ico" />
        <link href="{$_layoutParams.ruta_css}bootstrap.min.css" rel="stylesheet" type="text/css"> 
        <link href="{$_layoutParams.ruta_css}template.css" rel="stylesheet" type="text/css">   
        
        {if isset($_layoutParams.css) && count($_layoutParams.css)}
			{foreach item=css from=$_layoutParams.css}
                <link href="{$css}" rel="stylesheet" type="text/css">
			{/foreach}
		{/if}
        
        <style type="text/css">
			
			.piePagina{
				background-color: #333;
				border-top-color: #000;
				border-top-width: 2px;
				height: 180px;
				color: #FFF;
				left:0;
				bottom:0;
				width:100%;
				position: relative;
			}
			
			body{
				background-color:#FFF;
				margin-bottom: 0px;
			}

			
        </style>
</head>
    
<body>
	<!-- HEADER -->
	<header>
    	<div class="cabecera">
        	<div class="container" style="margin-top:15px;">
            	<div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-3">
                		<a href="http://www.lezindumentaria.com/"><img src="{$_layoutParams.ruta_img}logo.jpg" style="width:250px; height:auto; margin-right:auto; margin-left:auto;" class="img-responsive"></a>
                    </div>
                    <div class="hidden-xs  hidden-sm col-md-9" style="padding-top:60px; color:#000; font-size:55px; "> 
                    	<p>Indumentaria Masculina</p>
                    </div>
            </div>
    	</div>
    </header>

      
    <!-- CONTENIDO -->  
    <div class="container">
    	<div class="span8">
                <noscript><p>Para el correcto funcionamiento debe tener el soporte para javascript habilitado</p></noscript>
                    
                {if isset($_error)}
                    <div id="_errl" class="alert alert-error">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_error}
                    </div>
                {/if}

                {if isset($_mensaje)}
                    <div id="_msgl" class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_mensaje}
                    </div>
                {/if}
				<br><!-- eliminar esto --> 
                {include file=$_contenido}
        	</div>
    </div>
        
    <!-- Footer -->
    <div class=" piePagina">
        	<div class="container"  >
                <div class="row">
                <div class="col-sm-12 col-sm-8 col-md-8">
                <h3><u>Contacto:</u></h3>
       			 <ul>
  			<li>Cel.: (0221) 15 668-3522 </li>
            <li>Cel.: (0221) 15 561-0069 </li><br />
            <li><a href="https://www.facebook.com/lezindumentaria" target="_blank"><img src="{$_layoutParams.ruta_img}facebook.png" /></a> <a href="https://www.instagram.com/lez.indumentaria/" target="_blank"><img src="{$_layoutParams.ruta_img}instagram.png" /></a> <a href="#"><img src="{$_layoutParams.ruta_img}carta.png" /></a></li><br /><br />
            	</ul>
                </div>
                
            	<div class="hidden-xs col-sm-4 col-md-4">
            	<div class="fb-like" data-href="https://www.facebook.com/lezindumentaria" data-width="150" 
                data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true" 
                style="float:left; margin-top:40px; margin-right:auto; margin-left:auto;"></div>
                </div>
		
			</div>
	</div>            
       
	<script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.js"></script>
    <script type="text/javascript">
    	var _root_ = '{$_layoutParams.root}';
    </script>
        
    <!--{if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
    	{foreach item=plg from=$_layoutParams.js_plugin}
        	<script src="{$plg}" type="text/javascript"></script>
        {/foreach}
	{/if}-->
        
	{if isset($_layoutParams.js) && count($_layoutParams.js)}
		{foreach item=js from=$_layoutParams.js}
			<script src="{$js}" type="text/javascript"></script>
		{/foreach}
	{/if}
</body>
</html>