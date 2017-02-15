<div class="btn-group">
	<a href="{$_layoutParams.root}administrador/alumnos/nuevo" class="btn btn-default"> Nuevo Alumno</a>
</div>

<h3>Listado de Alumnos</h3><br>

<table class="table table-striped">
	<tr>
		<th>Id</th>
    	<th>Nombre</th>
    	<th>Apellido</th>
    	<th>DNI</th>
    	<th>Nacimiento</th>
        <th>Colegio</th>
        <th>Observacion Medica</th>
        <th>Obra Social</th>
        <th>Número Afiliado</th>
        <th>Notas</th>
        <th>Sede y Grupo inscripto</th>
        <th>Acciones</th>
    </tr>

    {foreach from=$alumnos item=a}
    <tr>
    	<td>{$a.id_alumno}</td>
		<td>{$a.nombre}</td>
        <td>{$a.apellido}</td>
        <td>{$a.dni}</td>
        <td>{$a.nacimiento}</td>
        <td>{$a.colegio}</td>
        <td>{$a.observacion_medica}</td>
        <td>{$a.obra_social}</td>
        <td>{$a.num_afiliado}</td>
        <td>{$a.notas}</td>
        <td>{$a.id_grupo}</td>
        <td><a href="#" class="btn btn-danger btn-xs">Eliminar</a></td>
    </tr>
	{/foreach}

</table>
