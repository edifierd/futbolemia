<h2>Dar de alta alumno</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        
        <p>
            <label>Grupo: </label>
            <select id="grupo" name="grupo" >
            	<option value="0" >Seleccione...</option>
        		{foreach from=$grupos item=g}
					<option value="{$g.id_grupo}" >{$g.sede} - {$g.tipo} - {$g.dias} - {$g.horario}</option>
				{/foreach}
			</select>
        </p>
        
        <p>
            <label>DNI: </label>
            <input type="text" name="dni" value="{$datos.dni|default:""}" />
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
            <label>Fecha de Nacimiento: </label>
            <input type="date" name="nacimiento" value="{$datos.nacimiento|default:""}" />
        </p>
        
        <p>
            <label>Colegio: </label>
            <input type="text" name="colegio" value="{$datos.colegio|default:""}" />
        </p>

        <p>
            <label>Obra Social: </label>
            <input type="text" name="obra_social" value="{$datos.obra_social|default:""}" />
        </p> 
        
        <p>
            <label>Numero de Afiliado: </label>
            <input type="text" name="numero_afiliado" value="{$datos.numero_afiliado|default:""}" />
        </p>   
        
        <p>
            <label>Observacion Medica: </label>
            <input type="text" name="observacion_medica" value="{$datos.observacion_medica|default:""}" />
        </p> 
        
        <p>
            <label>Notas: </label>
            <input type="text" name="notas" value="{$datos.notas|default:""}"/>
        </p> 

        <p>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </p>
    </form>
</div>