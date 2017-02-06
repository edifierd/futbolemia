
<h1>Gracias {$user.name} {$user.surname} por tu compra: </h1>

<div class="row" style="border: double #000000; margin:15px; padding:10px; font-size:18px;">
	<div class=" col-sm-12 col-md-2">
    	<img src="{$_layoutParams.root}public/img/prendas/thumb/thumb_{$prenda.foto_frente}" class="img-responsive"
        		style="max-height:150px; margin-right:auto; margin-left:auto;">
    </div>
    <div class="col-sm-12 col-md-10">
    	<h2>{$prenda.nombre}, talle {$venta.talle}</h2>
        <p>{$prenda.descripcion}</p><br />
        <p style="font-family:Arial"><b>{$venta.cant} x ${$prenda.precio} = ${$total}</b></p>
    </div>
</div>

<div style="text-align:center">
<h3>Al recibir el pago nos pondremos en contacto contigo por medio de correo o por telefono para concretar la entrega</h3>

<h3>Cualquier duda podes comunicarte con nosotros haciendo <a href="{$_layoutParams.root}contacto">click aqui</a>.</h3>

</div>