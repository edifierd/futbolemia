<h2>Dar de alta grupo</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        
        <p>
            <label>Sede: </label>
            <select id="sede" name="sede" >
            	<option value="null" >Seleccione...</option>
        		<option value="La Cumbre" >La Cumbre</option>
                <option value="Los Hornos" >Los Hornos</option>
                <option value="El Retiro" >El Retiro</option>
			</select>
        </p>

        <p>
            <label>Tipo: </label>
            <select id="tipo" name="tipo" >
            	<option value="null" >Seleccione...</option>
        		<option value="Jardin" >Jardin</option>
                <option value="1y2" >1° y 2° Grado</option>
                <option value="3y4" >3° y 4° Grado</option>
				<option value="5y6" >5° y 6° Grado</option>
			</select>
        </p>

        <p>
            <label>Dias: </label>
            <select id="dias[]" name="dias[]" class="selectpicker" title="Seleccione multiples dias..." multiple>
        		<option value="Lu" >Lunes</option>
                <option value="Ma" >Martes</option>
                <option value="Mi" >Miercoles</option>
                <option value="Ju" >Jueves</option>
                <option value="Vi" >Viernes</option>
                <option value="Sa" >Sabados</option>
			</select>
        </p>

        <p>
            <label>Horario: </label>
            <input type="text" name="horario" value="{$datos.horario|default:""}" />
        </p>

        <p>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </p>
    </form>
</div>