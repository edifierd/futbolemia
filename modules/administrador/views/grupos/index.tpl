
<div class="btn-group">
	<a href="{$_layoutParams.root}administrador/grupos/nuevo" class="btn btn-default"> Nuevo Grupo</a>
</div>

<h3>Listado de Grupos Futbolemia</h3><br>


<table class="table">
	<tr>
		<th>Id</th>
    	<th>Sede</th>
    	<th>Tipo Grupo</th>
    	<th>Dias</th>
    	<th>Horario</th>
        <th>Acciones</th>
    </tr>
	
    {if isset($grupos) && count($grupos)}
    	{foreach from=$grupos item=g}
    	<tr>
    		<td>{$g.id_grupo}</td>
        	<td>{$g.sede}</td>
        	<td>{$g.tipo}</td>
        	<td>{$g.dias}</td>
       		<td>{$g.horario}</td>
        	<td><a href="{$_layoutParams.root}administrador/grupos/delete_grupo/{$g.id_grupo}" class="btn btn-danger btn-xs">Eliminar</a></td>
    	</tr>
		{/foreach}
    {else}
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No se encontraron grupos</h3></td>
        </tr>
	{/if}

</table>


