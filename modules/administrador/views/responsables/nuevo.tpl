<h2>Dar de alta Responsable</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        
         <p>
            <label>* DNI: </label>
            <input type="text" name="dni" value="{$datos.dni|default:""}" />
         </p>
        
         <p>
            <label>* Parentesco: </label>
            <select id="parentesco" name="parentesco" >
            	<option value="null" >Seleccione...</option>
        		<option value="padre" >Padre</option>
                <option value="madre" >Madre</option>
                <option value="hermano" >Hermano</option>
                <option value="abuelo" >Abuelo</option>
                <option value="tio" >Tío</option>
                <option value="otro" >Otro (aclarar)</option>
			</select>
        </p>
        
        <p>
            <label>En caso de seleccionar 'Otros' como parentesco: </label>
            <input type="text" name="otroParentesco" value="{$datos.otroParentesco|default:""}" />
        </p>
        
        <p>
            <label>* Nombre: </label>
            <input type="text" name="nombre" value="{$datos.nombre|default:""}" />
        </p>

        <p>
            <label>* Apellido: </label>
            <input type="text" name="apellido" value="{$datos.apellido|default:""}" />
        </p>
        
        <p>
            <label>* Teléfono Fijo: </label>
            <input type="text" name="tel_fijo" value="{$datos.tel_fijo|default:""}" />
        </p>
        
        <p>
            <label>* Teléfono Celular: </label>
            <input type="text" name="tel_celular" value="{$datos.tel_celular|default:""}" />
        </p>
        
        <p>
            <label>* Dirección: </label>
            <input type="text" name="direccion" value="{$datos.direccion|default:""}" />
        </p>
        
        <p>
            <label>* Correo: </label>
            <input type="email" name="email" value="{$datos.email|default:""}" />
        </p>
 

        <p>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="javascript:history.back()" class="btn btn-danger" style="margin-left:25px;">Cancelar</a>
        </p>
        
        <p>
        	* Todos los campos son necesarios.
        </p>
    </form>
</div>