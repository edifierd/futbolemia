<h2>Administración de permisos</h2>

{if isset($permisos) && count($permisos)}
<table class="table table-bordered table-condensed table-striped" style="width:500px;">
    <tr>
        <th>ID</th>
        <th>Permiso</th>
        <th>Llave</th>
        <th></th>
        <th></th>
    </tr>
    
    {foreach item=rl from=$permisos}
    
        <tr>
            <td>{$rl.id_permiso}</td>
            <td>{$rl.permiso}</td>
            <td>{$rl.key}</td>
            <td>
            	<a href="{$_layoutParams.root}administrador/acl/edit_permiso/{$rl.id_permiso}" style="color:#090;">Editar</a>
            </td>
            <td>
            	<a href="{$_layoutParams.root}administrador/acl/delete_permiso/{$rl.id_permiso}" style=" color:#C00">Eliminar</a>
            </td>
        </tr>
        
    {/foreach}
    
</table>
{/if}

<p><a href="{$_layoutParams.root}administrador/acl/nuevo_permiso" class="btn btn-primary"><i class="icon-plus-sign icon-white"> </i> Agregar Permiso</a></p>