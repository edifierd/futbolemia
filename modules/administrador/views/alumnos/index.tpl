<h3>Listado de Alumnos</h3><br>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav">
        	        <li><a href="{$_layoutParams.root}administrador/alumnos/nuevo" > Nuevo Alumno</a></li>
   	    </ul>
        <form class="navbar-form navbar-left" role="search" method="post" action="">
        	<input type="hidden" value="1" name="buscar" />
  			<div class="form-group">
            	<select id="sede" name="sede" style="height:32px;">
                	<option value="todos" >Todos</option>
            		<option value="La Cumbre" >La Cumbre</option>
                    <option value="Los Hornos" >Los Hornos</option>
                    <option value="El Retiro" >El Retiro</option>
				</select>
    			<input type="text" class="form-control" placeholder="Nombre o Apellido o DNI..." name="casillero" id="casillero">
  			</div>
  			<button type="submit" class="btn btn-default">Buscar</button>
		</form>
    </div>
  </div>
</nav>

<table class="table table-striped">
	<tr>
    	<th>ID</th>
    	<th>Apellido Nombre </th>
    	<th>DNI</th>
        <th>Sede y Grupo inscripto</th>
        <th colspan="2" style="text-align:center;">Acciones</th>
    </tr>

    {foreach from=$alumnos item=a}
    <tr>
    	<td>{$a.id_alumno}</td>
		<td><a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}">{$a.apellido} {$a.nombre}</a></td>
        <td>{$a.dni}</td>
        <td>{$a.sede} - {$a.tipo} - {$a.horario} </td>
        <td><a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}" class="btn btn-primary btn-xs">Ver Perfil</a></td>
        <td><a href="{$_layoutParams.root}administrador/alumnos/delete/{$a.id_alumno}" class="btn btn-danger btn-xs">Eliminar</a></td>    </tr>
	{/foreach}

</table>