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
        <link href="{$_layoutParams.ruta_css}bootstrap-select.min.css" rel="stylesheet" type="text/css"> 
        <link href="{$_layoutParams.ruta_css}template.css" rel="stylesheet" type="text/css">   
        
        {if isset($_layoutParams.css) && count($_layoutParams.css)}
			{foreach item=css from=$_layoutParams.css}
                <link href="{$css}" rel="stylesheet" type="text/css">
			{/foreach}
		{/if}
        
        {$marcado}
        
</head>
    
<body>

	<div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        {if $_acl->permiso('admin_access')}
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{$_layoutParams.root}administrador" style="color:#FFF;">
                       Admin Panel
                    </a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Prendas<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Administracion de prendas</li>
                    <li><a href="{$_layoutParams.root}administrador/prenda/cargarGenero">Cargar</a></li>
                    <li><a href="#">Modificar</a></li>
                    <li><a href="#">Eliminar</a></li>
                  </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">Team</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Manejo de usuarios</li>
                    <li><a href="{$_layoutParams.root}administrador/usuarios/registro">Nuevo Usuario</a></li>
                    <li><a href="{$_layoutParams.root}administrador/usuarios/listado">Listado Usuarios</a></li>
                  </ul>
                </li>
                <li>
                    <a href="{$_layoutParams.root}administrador/usuarios/cerrar">Cerrar Sesión</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->
        {/if}

        <!-- CONTENIDO DE LA PAGINA -->
        <div id="page-content-wrapper">
        	
            {if $_acl->permiso('admin_access')}
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
                <span style=" margin-left:35px;"><b>MENÚ</b></span>
            </button>
            {/if}
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                    	<div class="col-md-11" >
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
        					</div>
                            
                            {include file=$_contenido}
						</div>               
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


	<script type="text/javascript" src="{$_layoutParams.root}public/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.min.js"></script>
    <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{$_layoutParams.ruta_js}menu.js"></script>
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