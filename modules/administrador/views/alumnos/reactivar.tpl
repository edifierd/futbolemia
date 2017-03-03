<h2>Seleccionar grupo para reactivar al alumno</h2>

<div class="well span5">
	<form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        
        <p>
            <label>Nombre Completo: </label>
            <label>{$alumno.apellido} {$alumno.nombre} </label>
        </p>
        
        <p>
            <label>DNI: </label>
            <label>{$alumno.dni}</label>
        </p>
        
        <p>
            <label>Grupo Actual: </label>
            <select id="grupo" name="grupo" >
            	<option value="0" >{$grupo.sede} - {$grupo.tipo} - {$grupo.dias} - {$grupo.horario}</option>
        		{foreach from=$grupos item=g}
					<option value="{$g.id_grupo}" >{$g.sede} - {$g.tipo} - {$g.dias} - {$g.horario}</option>
				{/foreach}
			</select>
        </p>
        
        <p>
            <button type="submit" class="btn btn-primary">Confirmar</button>
            <a href="javascript:history.back()" class="btn btn-danger" style="margin-left:25px;">Cancelar</a>
        </p>
	</form>
</div>