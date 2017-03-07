<style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2 class="hidden-xs">BIENVENIDO AL PANEL DE ADMINISTRACIÓN</h2>
<h4 class="visible-xs"><b>PANEL DE ADMINISTRACIÓN</b></h4>

<h3 class="hidden-xs">Iniciar Sesi&oacute;n</h3>
<h4 class="visible-xs">Iniciar Sesi&oacute;n</h4>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <div class="row" style="margin-top:20px;">
    	<div class="col-xs-4 col-sm-2 col-md-1">
        	Usuario
        </div>
        <div class="col-xs-8 col-sm-10 col-md-11">
        	<input type="text" name="usuario" value="{$datos.usuario|default:""}" />
        </div>
        <div class="col-xs-4 col-sm-2 col-md-1" style="margin-top:15px;">
        	Contraseña:
        </div>
        <div class="col-xs-8 col-sm-10 col-md-11" style="margin-top:15px;">
        	<input type="password" name="pass" />
        </div>
		<div class="col-xs-6 col-sm-6 col-md-6">
    		<p><button type="submit" class="btn btn-primary" style="margin-left:25%; margin-top:25px;"><li class="glyphicon glyphicon-ok" style="margin-right:7px;"> </li> Entrar</button></p>
        </div>
</form>