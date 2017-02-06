
<h2>Indicar el Genero de la prenda a cargar</h2>

<form enctype="multipart/form-data" method="post" action="{$_layoutParams.root}administrador/prenda/cargarDatos">

	<select id="genero" name="genero" class="selectpicker" title="Seleccione el genero" >
		<option value="hombre" >Hombre</option>
    	<option value="mujer" >Mujer</option>
	</select>
	
    <input type="hidden" name="enviado" value="1">
    <button class="btn btn-primary" id="btnvalidar"><i class="icon-ok icon-white"></i>Siguiente</button>
    
</form>