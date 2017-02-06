<h2> Cargar Datos de la prenda </h2>

<form enctype="multipart/form-data" method="post" action="{$_layoutParams.root}administrador/prenda/cargarDatos">
	
    Categorias de genero {$genero}:<br />
    <select id="categorias[]" name="categorias[]" class="selectpicker" title="Seleccione multiples categorias..." multiple>
    	{foreach from=$categoria item=curr_c}
        	<option value="{$curr_c.id}" >{$curr_c.nombre}</option>
		{/foreach}
	</select>
    
	<br />Nombre:<br>
	<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el titulo" value="{$campos.nombre|default:""}" style="border-radius: 0px;">
    Descripcion:<br>
    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion" value="{$campos.descripcion|default:""}" style="border-radius: 0px;">
    Temporada:<br>
	<input type="text" class="form-control" name="temporada" id="temporada" placeholder="Ingrese la temporada" value="{$campos.temporada|default:""}" style="border-radius: 0px;">
    Precio:<br>
    <input type="number" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio" value="{$campos.precio|default:""}" style="border-radius: 0px;">
    S:<br>
    <input type="number" class="form-control" name="s" id="s" placeholder="Stock talle S" value="{$campos.s|default:""}" style="border-radius: 0px;">
    M:<br>
    <input type="number" class="form-control" name="m" id="m" placeholder="Stock talle M" value="{$campos.m|default:""}" style="border-radius: 0px;">
    L:<br>
    <input type="number" class="form-control" name="l" id="l" placeholder="Stock talle L" value="{$campos.l|default:""}" style="border-radius: 0px;">
    XL:<br>
    <input type="number" class="form-control" name="xl" id="xl" placeholder="Stock talle XL" value="{$campos.xl|default:""}" style="border-radius: 0px;">

    <br /><br />
    <input type="hidden" name="genero" value="{$genero}">
    <input type="hidden" name="enviado" value="2">
    <button class="btn btn-primary" id="btnvalidar"><i class="icon-ok icon-white"></i>Siguiente</button>
</form>
