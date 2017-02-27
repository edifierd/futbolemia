
<div class="btn-group">
	<a href="javascript:history.back()" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
	<a href="{$_layoutParams.root}administrador/asistencias/tomarAsistencia/{$grupo.id_grupo}" class="btn btn-default">Tomar Asistencia</a>
</div>

<h3>Listado alumnos {$grupo.sede} {$grupo.tipo} - {$grupo.dias} - {$grupo.horario} </h3><br>


<table class="table table-striped">
	<tr>
    	<th>ID</th>
    	<th>Apellido Nombre </th>
        <th>DNI</th>
        <th style="text-align:center;">Acciones</th>
    </tr>
	
    {if isset($alumnos) && count($alumnos)}
    	{foreach from=$alumnos item=a}
    		<tr>
    			<td>{$a.id_alumno}</td>
				<td><a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}">{$a.apellido} {$a.nombre}</a></td>
        		<td>{$a.dni}</td>
                <td style="text-align:center;"><a href="{$_layoutParams.root}administrador/asistencias/alumno/{$a.id_alumno}" class="btn btn-primary btn-xs">Asistencias Alumno</a></td>
            </tr>
		{/foreach}
	{else}
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No hay alumnos en este grupo</h3></td>
        </tr>
	{/if}

</table>


