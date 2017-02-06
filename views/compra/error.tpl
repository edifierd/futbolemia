
<h3>Haga click en el articulo para regresar</h3>

<a href="{$_layoutParams.root}prenda/show/{$datos.id}">
<div class="row" style="border: double #000000; margin:15px; padding:10px; font-size:18px;">
	<div class=" col-sm-12 col-md-2">
    	<img src="{$_layoutParams.root}public/img/prendas/{$datos.foto_frente}" class="img-responsive"
        		style="max-height:150px; margin-right:auto; margin-left:auto;">
    </div>
    <div class="col-sm-12 col-md-10">
    	<h2>{$datos.nombre}, talle {$talle}</h2>
        <p>{$datos.descripcion}</p><br />
    </div>
</div>
</a>