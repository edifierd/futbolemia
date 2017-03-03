<div class="btn-group">
	<a href="{$_layoutParams.root}administrador/grupos/show/{$grupo.id_grupo}" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
</div>

<h3>Tomar asistencia en {$grupo.sede} {$grupo.tipo} - {$grupo.dias} - {$grupo.horario} </h3><br>


        
        
<table class="table table-striped">
	<form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
    <tr>
    	<td colspan="3">
        	<h4>Seleccionar fecha: 
            <input type="date" name="fecha" value="{$smarty.now|date_format:'%Y-%m-%d'}" style="margin-bottom:20px; margin-left:10px;"/></h4>
        </td>
    </tr>
	<tr>
    	<th>ID</th>
    	<th>Apellido Nombre </th>
        <th>Asistencia</th>
    </tr>

    {if isset($alumnos) && count($alumnos)}
    	{foreach from=$alumnos item=a}
    		<tr>
    			<td>{$a.id_alumno}</td>
				<td>{$a.apellido} {$a.nombre} </td>
                <td><input type="checkbox" value="presente" name="{$a.id_alumno}" {if isset($datos[$a.id_alumno])}checked{/if} > Presente</label></td>
            </tr>
		{/foreach}
	{else}
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No hay alumnos en este grupo</h3></td>
        </tr>
	{/if}
    	<tr>
        	<td colspan="3" style="text-align:center;">
            	{if isset($alumnos) && count($alumnos)}
            	<button type="submit" class="btn btn-primary">Enviar</button>
                {/if}
            </td>
        </tr>
    </form>

</table>