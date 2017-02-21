<h2>Modificar responsable</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        <input type="hidden" value="{$datos.parentesco}" name="parentesco" />
        <input type="hidden" value="{$datos.dni}" name="dni" />
        <p>
        	<label>Parentesco: </label>
            <label>{$datos.parentesco} </label>
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
            <label>{$datos.dni} </label>
        </p>
        
        <p>
            <label>Telefono Fijo: </label>
            <input type="text" name="tel_fijo" value="{$datos.tel_fijo|default:""}" />
        </p>
        
        <p>
            <label>Telefono Celular: </label>
            <input type="text" name="tel_celular" value="{$datos.tel_celular|default:""}" />
        </p>
        
        <p>
            <label>Dirección: </label>
            <input type="text" name="direccion" value="{$datos.direccion|default:""}" />
        </p>
        
        <p>
            <label>Correo: </label>
            <input type="email" name="correo" value="{$datos.correo|default:""}" />
        </p>
 

        <p>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </p>
    </form>
</div>