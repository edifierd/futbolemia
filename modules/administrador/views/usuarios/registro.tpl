<h2>Dar de alta nuevo usuario</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="enviar" />
        
        <p>
            <label>Grupo / Rol: </label>
            <select id="rol" name="rol" >
            	<option value="0" >Seleccione...</option>
        		{foreach from=$roles item=rl }
                	{if $rl.id_role != 1}
						<option value="{$rl.id_role}" >{$rl.role}</option>
                    {/if}
				{/foreach}
			</select> (Estos seran los permisos del usuario en el sistema)
        </p>

        <p>
            <label>Usuario: </label>
            <input type="text" name="usuario" value="{$datos.usuario|default:""}" />
        </p>

        <p>
            <label>Email: </label>
            <input type="text" name="email" value="{$datos.email|default:""}" />
        </p>
        
        <p>
            <label>Nombre: </label>
            <input type="text" name="nombre" value="{$datos.nombre|default:""}" />
        </p>
        
        <p>
            <label>Apellido: </label>
            <input type="text" name="apellido" value="{$datos.apellido|default:""}" />
        </p>
        
        <p>
            <label>DNI: </label>
            <input type="text" name="dni" value="{$datos.dni|default:""}" />
        </p>

        <p>
            <label>Password: </label>
            <input type="password" name="pass" />
        </p>

        <p>
            <label>Confirmar: </label>
            <input type="password" name="confirmar" />
        </p>    

        <p>
            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
            <a href="{$_layoutParams.root}administrador/usuarios/listado" class="btn btn-danger" style="margin-left:25px;">Cancelar</a>
        </p>
    </form>
</div>