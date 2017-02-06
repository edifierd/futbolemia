<!DOCTYPE html>
<html lang="es">
<head>
        <title>{$titulo|default:"Sin t&iacute;tulo"}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <META name="description" content="{$description}">
    	<META name="keywords" content="{$keywords}">
        <link rel="icon" type="image/png" href="{$_layoutParams.ruta_img}icono.ico" />
        <link href="{$_layoutParams.ruta_css}bootstrap.min.css" rel="stylesheet" type="text/css"> 
        <link href="{$_layoutParams.ruta_css}font-awesome.min.css" rel="stylesheet" type="text/css"> 
        <link href="{$_layoutParams.ruta_css}template.css" rel="stylesheet" type="text/css">   
        
        {if isset($_layoutParams.css) && count($_layoutParams.css)}
			{foreach item=css from=$_layoutParams.css}
                <link href="{$css}" rel="stylesheet" type="text/css">
			{/foreach}
		{/if}
        
        {$marcado}
        
        <style type="text/css">
			html{
  				position:relative; 
  				min-height: 100%;
			}
			
			body{
				background-color: #FFF;
				padding-bottom: 70px;
				color: #000;
				font-weight:bold;
				font-family: Garamond;
				margin: 0;
				padding: 0;
			}
			
			.barra{
				background-color: transparent;
				border: none;
				font-size: 17px;
			}
			
			.footer{
				bottom: 0;
				left: 0;
				right: 0;
				top: 0;
				width: 100%;
				position: absolute;
				margin-top: auto;
				background-color: #DADADA;
				border-top-color: #000;
				border-top-width: 1px;
				height: 60px;
				color: #000;
			}
			
        </style>
        
</head>
    
<body >
	<!-- HEADER -->
	<header>
	<a href="{$_layoutParams.root}">
    	<img src="{$_layoutParams.ruta_img}logo.png" class=" img-responsive" 
        	 style="margin-right:auto; margin-left:auto; margin-top:15px; margin-bottom:10px; max-height:200px;" title="Panana Be Argentina" alt="Panana Be Logo">
    </a>
	<nav class="navbar navbar-default" role="navigation" style="background-color:transparent; border:none;">
    	<div class="container">
  		<div class="navbar-header">
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
        		<span class="sr-only">Menu</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
			<span class="visible-xs navbar-brand" href="#" style=" color:#000;">Panana Be.</span>
            <span class="visible-xs navbar-brand" href="#" style=" color:#000; float:right;">Menú</span>
    	</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse" id="navbar-1">
    		<ul class="nav nav-justified">
				{foreach item=it from=$_layoutParams.menu}
                	{if isset($_layoutParams.item) && $_layoutParams.item == $it.id}
                    	{assign var="_item_style" value='active'}
                    {else}
                    	{assign var="_item_style" value=''}
                    {/if}
                        
                    {if $it.dropdown == '' } 
                        <li class="{$_item_style}"><a  href="{$it.enlace}" class="boton"> {$it.titulo}</a></li>
                    {else}
                        <li class="hidden-xs dropdown {$_item_style}">
          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {$it.titulo} <span class="caret"></span>
                        </a>
         					<ul class="dropdown-menu" style="margin-left:20px;">
            					{foreach item=itd from=$it.dropdown}
                                	{if isset($_layoutParams.item) && $_layoutParams.item == $itd.id}
                        				{assign var="_item_style" value='active'}
                        			{else}
                            			{assign var="_item_style" value=''}
                        			{/if}
                                	<li><a href="{$itd.enlace}" > {$itd.titulo}</a></li>
                           		{/foreach}
          					</ul>
        				</li> 
                        
                        {foreach item=i from=$it.dropdown}
                        	<li class="visible-xs"><a href="{$i.enlace}" >{$i.titulo} </a></li>
                    	{/foreach}      
                    {/if}
   				{/foreach}
	   		</ul>
		</div>
        </div>
	</nav>

</header>

      
    <!-- CONTENIDO -->  
    <div class="container" style=" margin-bottom: 75px;">
    	<div class="span8">
                <noscript>
                	<div class="alert alert-danger" role="alert" style="text-align:center; margin-top: 15px;">
                    	<b><h3>¡ Para el correcto funcionamiento debe tener el soporte para javascript habilitado !</h3></b>
                    </div>
                </noscript>
                    
                {if isset($_error)}
                    <div id="_errl" class="alert alert-danger" style="margin-top:20px;">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_error}
                    </div>
                {/if}

                {if isset($_mensaje)}
                    <div id="_msgl" class="alert alert-success" style="margin-top:20px;">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_mensaje}
                    </div>
                {/if}
				<br><!-- eliminar esto el <br> --> 
                {include file=$_contenido}
        	</div>
    </div>
        
    <!-- Footer  -->

    <div class="footer">
    	<div class="container">
    	<div class="row">
        	<div class="col-sm-4 col-md-4">
            	<a href="{$_layoutParams.root}">
    				<img src="{$_layoutParams.ruta_img}logoMin.png" class="img-responsive" 
        				 style="margin-right:auto; margin-left:auto; margin-top:5px; max-height:50px;" title="Panana Be Argentina" alt="Panana Be Logo">
    			</a>
            </div>
            <div class="col-sm-4 col-md-4" style=" margin-top:10px; font-weight:bold;">
            	<p style="margin-right:auto; margin-left:auto;">
            	Contacto al (221) 15 5980127 de 8:00 a 20:00 Hs <br>
                Brandsen, Buenos Aires, Argentina
                </p>
            </div>
            <div class="col-sm-4 col-md-4" >
            	<table title="Contacto Redes Sociales">
                	<tr>
                    	<td>
                        <a href="{$_layoutParams.root}contacto" class="redes" title="Contacto">
                        	<i class="fa fa-envelope fa-2x" style="margin:1px; font-size: 12px; font-weight:bold;" > Consultas </i>
                        </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <a href="https://www.facebook.com/pananabeok" class="redes" target="_blank" title="Facebook Panana Be">
                        	<i class="fa fa-facebook fa-2x" style="margin:1px; font-size: 12px; font-weight:bold;" > Facebook </i>
                        </a>
                        </td>	
                   	</tr>
                    <tr>
               			<td>
                        <a href="https://www.instagram.com/pananabeok/" class="redes" target="_blank" title="Instagram Panana Be">
                        	<i class="fa fa-instagram fa-2x" style="margin:1px; font-size: 12px; font-weight:bold;" > Instagram </i>
                        </a>
                        </td>
                    </tr>
                </table>
            </div>
    	</div>
        </div>
	</div>

            
       
	<script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.min.js"></script>
    <script type="text/javascript" src="{$_layoutParams.ruta_js}funciones.js"></script>
    <script type="text/javascript">
    	var _root_ = '{$_layoutParams.root}';
    </script>
        
    {if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
    	{foreach item=plg from=$_layoutParams.js_plugin}
        	<script src="{$plg}" type="text/javascript"></script>
        {/foreach}
	{/if}
        
	{if isset($_layoutParams.js) && count($_layoutParams.js)}
		{foreach item=js from=$_layoutParams.js}
			<script src="{$js}" type="text/javascript"></script>
		{/foreach}
	{/if}
</body>
</html>