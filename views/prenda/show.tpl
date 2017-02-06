
<div class="row" style="margin-bottom:20px;">
	<div class="col-xs-12 col-sm-6 col-md-6" >
    	<div class="row">
        	<div class="col-md-12" style="height:500px;">
            	<img src="{$_layoutParams.root}public/img/prendas/{$datos.foto_frente}" class="img-responsive fotoMax" id="5000"  style="max-height:500px; "
                title="{$datos.nombre}"/>
            </div>
            <div class="col-md-12">
            	<a onmouseover="cambiarImagen(5000,'{$_layoutParams.root}public/img/prendas/{$datos.foto_frente}')" href="javascript:void(0);">
                	<img src="{$_layoutParams.root}public/img/prendas/{$datos.foto_frente}" class="img-responsive fotoMin" alt="{$datos.nombre} foto frente"/>
                </a>
                <a onmouseover="cambiarImagen(5000,'{$_layoutParams.root}public/img/prendas/{$datos.foto_perfil}')" href="javascript:void(0);">
                	<img src="{$_layoutParams.root}public/img/prendas/{$datos.foto_perfil}" class="img-responsive fotoMin"  alt="{$datos.nombre} foto perfil"/>
                </a>
                <a onmouseover="cambiarImagen(5000,'{$_layoutParams.root}public/img/prendas/{$datos.foto_atras}')" href="javascript:void(0);">
                	<img src="{$_layoutParams.root}public/img/prendas/{$datos.foto_atras}" class="img-responsive fotoMin"  alt="{$datos.nombre} foto atras"/>
                </a>
            </div>
        </div>
	</div>
    <div class="col-xs-12 col-sm-6 col-md-6" style="text-align:left; font-size:18px;">
    	<h1>{$datos.nombre}</h1>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6" style="text-align:left; font-size:18px;">
        <p>{$datos.descripcion}</p>
   	</div>
    <div class="col-xs-12 col-sm-6 col-md-6" style="text-align:left; font-size:18px;">
        <p style="color:#999; font-size:28px; font-family:'Arial Black';">${$datos.precio}</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6" style="text-align:left; font-size:18px;">     
        <img src="{$_layoutParams.img}formasDePago.png" class="img-responsive" style="max-width:60%; margin-top:15px; margin-bottom:20px;" 
        	 alt="Formas de pago" title="Formas de pago"/>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6" style="text-align:left; font-size:18px;">
        <p style="float:left; padding-top:6px; margin-right:10px;">Talles disponibles:</p>
        <div class="cuboTalle" {if {$datos.S} == 0 } style="background-color:#F00;" {/if} >S</div>
        <div class="cuboTalle" {if {$datos.M} == 0 } style="background-color:#F00;" {/if} >M</div>
        <div class="cuboTalle" {if {$datos.L} == 0 } style="background-color:#F00;" {/if} >L</div>
        <div class="cuboTalle" {if {$datos.XL} == 0 } style="background-color:#F00;" {/if} >XL</div>
        
        <a href="{$_layoutParams.root}prenda/tabla_de_talles" class="btn btn-info btn-xs btn-talles" title="Tabla de talles">Ver tabla de talles</a> 
    </div>
    
    {if {$datos.S} > 0 or {$datos.M} > 0 or {$datos.L} > 0 or {$datos.XL} > 0 }
    <div class="col-xs-12 col-sm-6 col-md-3" style="text-align:left; font-size:18px; margin-top:25px;">
    	<form method="post" action="{$_layoutParams.root}compra/user_email/{$datos.id}" enctype="multipart/form-data" style="">  
            <div class="form-group">
            Elegir Talle 
        	<select name="talle" id="talle" style="margin-left:5px;">
            	<option value="" selected="selected">Seleccione</option>
  				{if {$datos.S} > 0 }<option value="S" title="Chico">S</option>{/if}
  				{if {$datos.M} > 0 }<option value="M" title="Mediano">M</option>{/if}
  				{if {$datos.L} > 0 }<option value="L" title="Grande">L</option>{/if}
  				{if {$datos.XL} > 0 }<option value="XL" title="Extra Grande">XL</option>{/if}
			</select>
            <span class="help-block"></span>
            </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3" style="text-align:left; font-size:18px; margin-top:25px;">
            <div class="form-group">
            Cantidad
			<input type="number" name="cantidad" id="cantidad" value="1" min="1" max="5" style="margin-left:5px; height:25px;" title="Cantidad">
            <span class="help-block"></span>
            </div>
	</div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 " style="text-align:left; font-size:18px;">
        	<button class="btn btn-warning btn-comprar" id="btnvalidar" title="Comprar"><i class="icon-ok icon-white"></i>	<h4>COMPRAR</h4></button>
        </form>
    </div>
    {/if}
</div>