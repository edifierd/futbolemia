<h2>Usuarios</h2>

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