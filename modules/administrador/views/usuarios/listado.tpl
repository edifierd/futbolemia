<h2>Listado de Usuarios</h2>

<div class="btn-group" style="margin-bottom:20px;">
	<a href="javascript:history.back()" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
	<a href="{$_layoutParams.root}administrador/usuarios/registro" class="btn btn-default"> Nuevo Usuario</a>
</div>

{if isset($usuarios) && count($usuarios)}
    <table class="table table-bordered table-striped table-condensed">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Role</th>
            <th></th>
        </tr>
        
        {foreach from=$usuarios item=us}
        <tr>
            <td>{$us.id}</td>
            <td>{$us.usuario}</td>
            <td>{$us.role}</td>
            <td>
            	{if $_acl->permiso('super_usuario')}
                <a href="{$_layoutParams.root}administrador/usuarios/permisos/{$us.id}">
                   Permisos
                </a>
                {/if}
                <a href="{$_layoutParams.root}administrador/usuarios/eliminar/{$us.id}" style="color:#F00;" onClick="javascript: return confirm('¿Estas seguro?');">
                   Eliminar
                </a>
            </td>
        </tr>
            
        {/foreach}
    </table>
{/if}