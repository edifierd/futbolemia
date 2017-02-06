
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

<h3>Es su primera vez por aqui. Complete el resto de sus datos:</h3> <br />


<form method="post" action="{$_layoutParams.root}compra/registrarUsuario" enctype="multipart/form-data">  
	<input type="hidden" name="idProducto" value="{$datos.id}">
    <input type="hidden" name="talle" value="{$talle}">
    <input type="hidden" name="cantidad" value="{$cantidad}">
    <input type="hidden" name="email" value="{$email}">
    
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7">
    		<div class="form-group">
			<label class="control-label" for="nombre" >Correo</label><br />
			<input type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese su correo" value="{$email}" disabled="disabled"
    		style="border-radius: 0px;" >
    		</div>
   		</div>
    </div>
    
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7">
    		<div class="form-group ">
    		<label class="control-label" for="nombre" >*Nombre</label><br />
    		<input type="text" class="form-control" name="name" id="name" placeholder="Ingrese su nombre" value="{$campos.name|default:""}" 
    		style="border-radius: 0px;">
    		<span class="help-block"></span>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7">
    		<div class="form-group">
    		<label class="control-label" for="nombre" >*Apellido</label><br />
    		<input type="text" class="form-control" name="surname" id="surname" placeholder="Ingrese su apellido" value="{$campos.surname|default:""}" 
   			style="border-radius: 0px;">
    		<span class="help-block"></span>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-xs-12 col-sm-12 col-md-7">
    		<div class="form-group">
    		<label class="control-label" for="nombre" >*Documento</label><br />
    		<input type="text" class="form-control" name="document_number" id="document_number" placeholder="Ingrese su documento" 
    		value="{$campos.document_number|default:""}" style="border-radius: 0px;">
    		<span class="help-block"></span>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-xs-5 col-sm-5 col-md-2">
    		<div class="form-group">
    		<label class="control-label" for="nombre" >*Codigo de Área</label><br />
    		<input type="text" class="form-control" name="area_phone_code" id="area_phone_code" placeholder="Cód. Área" 
    		value="{$campos.area_phone_code|default:""}" style="border-radius: 0px;">
    		<span class="help-block"></span>
    		</div>
    	</div>
        <div class="col-xs-7 col-sm-7 col-md-5">
    		<div class="form-group">
    		<label class="control-label" for="nombre" >*Teléfono</label><br />
    		<input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Ingrese su teléfono" 
            value="{$campos.phone_number|default:""}" style="border-radius: 0px;">
    		<span class="help-block"></span>
    		</div>
    	</div>
    </div>
        
    <div class="row">
    	
    </div>
            
    <div class="col-xs-12 col-sm-12 col-md-12" style="text-align:center; margin-top:17px; margin-bottom:35px;">
    	<button class="btn btn-primary" id="btnvalidar" style="color:#FFF; width:25%; padding:10px;"><b>Siguiente</b></button>
    </div>
</form>
