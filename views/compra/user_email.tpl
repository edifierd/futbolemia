
<h1>Estas por comprar: </h1>

<div class="row" style="border: double #000000; margin:15px; padding:10px; font-size:18px;">
	<div class=" col-sm-12 col-md-2">
    	<img src="{$_layoutParams.root}public/img/prendas/thumb/thumb_{$datos.foto_frente}" class="img-responsive"
        		style="max-height:200px; margin-right:auto; margin-left:auto;">
    </div>
    <div class="col-sm-12 col-md-10">
    	<h2>{$datos.nombre}, talle {$campos.talle}</h2>
        <p>{$datos.descripcion}</p><br />
        <p style="font-family:Arial"><b>{$campos.cantidad} x ${$datos.precio} = ${$total}</b></p>
    </div>
</div>

<h2>Ingrese su correo para continuar: </h2>

<form method="post" action="{$_layoutParams.root}compra/user_email/{$datos.id}" enctype="multipart/form-data">  
	<input type="hidden" name="idProducto" value="{$datos.id}">
    <input type="hidden" name="talle" value="{$campos.talle}">
    <input type="hidden" name="cantidad" value="{$campos.cantidad}">
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
		<input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese su correo" value="{$campos.correo|default:""}" >
        <span class="help-block"></span>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="text-align:center; margin-top:17px;">
    		<button class="btn btn-primary" id="btnvalidar" style="color:#FFF; width:25%;"><b>Siguiente</b></button>
        </div>
    </div>
</form>