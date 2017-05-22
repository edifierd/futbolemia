
<div class="btn-group" style="margin-bottom:20px;">
	<a href="javascript:history.back()" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
    {if $_acl->permiso('nuevo_grupo')}
		<a href="{$_layoutParams.root}administrador/grupos/nuevo" class="btn btn-default"> Nuevo Grupo</a>
    {/if}
</div>


<h3>Listado de Grupos Futbolemia</h3><br>


<table class="table">
	<tr>
		<th>Id</th>
    	<th>Sede</th>
    	<th>Tipo Grupo</th>
    	<th>Dias</th>
    	<th>Horario</th>
        <th colspan="2" style="text-align:center;">Acciones</th>
    </tr>
	
    {if isset($grupos) && count($grupos)}
    	{foreach from=$grupos item=g}
    	<tr>
    		<td>{$g.id_grupo}</td>
        	<td><a href="{$_layoutParams.root}administrador/grupos/show/{$g.id_grupo}">{$g.sede}</a></td>
        	<td>{$controller->getTipoGrupo($g.tipo)}</td>
        	<td>{$g.dias}</td>
       		<td>{$g.horario}</td>
            <td style="text-align:center"><a href="{$_layoutParams.root}administrador/grupos/show/{$g.id_grupo}" class="btn btn-primary btn-xs">Ver Grupo</a></td>
        	<td style="text-align:center">
            	{if $_acl->permiso('super_usuario')}
            		<a href="{$_layoutParams.root}administrador/grupos/delete_grupo/{$g.id_grupo}" class="btn btn-danger btn-xs">Eliminar</a>
                {/if}
            </td>
    	</tr>
		{/foreach}
    {else}
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No se encontraron grupos</h3></td>
        </tr>
	{/if}

</table>


