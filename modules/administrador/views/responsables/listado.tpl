<h3>Listado de Personas Responsables</h3><br>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav">
        	<li><a href="{$_layoutParams.root}administrador/alumnos/show/{$alumno.id_alumno}" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
        	{if isset($alumno.id_alumno)}
        		<li><a href="{$_layoutParams.root}administrador/responsables/nuevo/{$alumno.id_alumno}" > Nuevo Responsable</a></li>
            {/if}
   	    </ul>
        <form class="navbar-form navbar-left" role="search" method="post" action="">
        	<input type="hidden" value="1" name="buscar" />
  			<div class="form-group">
    			<input type="text" class="form-control" placeholder="Nombre o Apellido o DNI..." name="casillero" id="casillero" value="{$datos.casillero|default:""}">
  			</div>
  			<button type="submit" class="btn btn-default">Buscar</button>
		</form>
    </div>
  </div>
</nav>

<table class="table table-striped">
	<tr>
    	<th>Apellido Nombre </th>
    	<th>DNI</th>
        <th>Correo</th>
        <th>Teléfono Celular</th>
        <th>Agregar como responsable del alumno:</th>
    </tr>

    {if isset($responsables) && count($responsables)}
    	{foreach from=$responsables item=r}
    		<tr>
				<td>{$r.apellido} {$r.nombre}</td>
        		<td>{$r.dni}</td>
                <td>{$r.correo}</td>
                <td>{$r.tel_celular}</td>
        		<td><a href="{$_layoutParams.root}administrador/responsables/asignar_alumno/{$r.id_responsable}/{$alumno.id_alumno}" class="btn btn-danger btn-xs">{$alumno.apellido} {$alumno.nombre}</a></td>    </tr>
		{/foreach}
	{else}
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No se encontraron personas responsables para este alumno. <br /> O no existe nadie con los datos ingresados.</h3></td>
        </tr>
	{/if}

</table>
