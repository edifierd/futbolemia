

<h1>Estas por comprar: </h1>

<div class="row" style="border: double #000000; margin:15px; padding:10px; font-size:18px;">
	<div class=" col-sm-12 col-md-2">
    	<img src="{$_layoutParams.root}public/img/prendas/thumb/thumb_{$datos.foto_frente}" class="img-responsive"
        		style="max-height:150px; margin-right:auto; margin-left:auto;">
    </div>
    <div class="col-sm-12 col-md-10">
    	<h2>{$datos.nombre}, talle {$talle}</h2>
        <p>{$datos.descripcion}</p><br />
        <p style="font-family:Arial"><b>{$cantidad} x ${$datos.precio} = ${$total}</b></p>
    </div>
</div>

<h3>Tus datos han sido ingresados correctamente, haga click en finalizar para proceder con el pago.</h3>

<p style=" text-align:center;">
<a href="{$preference.response.init_point}" name="MP-Checkout" class="btn btn-primary" style="color:#FFF; width:25%;" id="btnvalidar" onclick="window.open(this.href,'_blank');return false;">
	<b>Finalizar</b>
</a>
<!--<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>-->
</p>

<script type="text/javascript">
    	var _ventaId_ = '{$id_venta}';
</script>