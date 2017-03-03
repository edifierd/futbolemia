<h3>Reportes Futbolemia para {$sede} / {$anioA}</h3><br>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left" role="search" method="post" action="">
        	<input type="hidden" value="1" name="buscar" />
            <label style="margin-right:15px;">Seleccione un año: </label>
  			<div class="form-group">
            	<select id="anio" name="anio" style="height:32px; margin-right:15px;">
                {foreach from=$listaAnios item=anio} 
        			<option value="{$anio[1]}" >{$anio[1]}</option>
        		{/foreach}
				</select>
  			</div>
            
            <label style="margin-right:15px;">Sede: </label>
            <div class="form-group">
            	<select id="sede" name="sede" style="height:32px;">
                	<option value="Los_Hornos" >Los Hornos</option>
            		<option value="La_Cumbre" >La Cumbre</option>
                    <option value="El_Retiro" >El Retiro</option>
				</select>
  			</div>
  			<button type="submit" class="btn btn-default" style="margin-left:20px;">Buscar</button>
            
            <a href="{$_layoutParams.root}administrador/reportes/generar/{$anioA}/{$sede}" class="btn btn-success" style="margin-left:30px;"> Actualizar Reportes</a>
		</form>
    </div>
  </div>
</nav>


{if $reportes == false}
<div class="alert alert-warning" role="alert" style="text-align:center; margin-top:100px;">
	<h3>Debe seleccionar para buscar un reporte.</h3>
</div>
{else}
<table class="table table-striped" style="text-align:center; font-weight:bold;" >
	<tr>
		<th style="text-align:center;">MES</th>
    	<th style="text-align:center;">CHICOS </th>
    	<th style="text-align:center;">DIFERENCIA MES</th>
    	<th style="text-align:center;">DIFERENCIA ANUAL</th>
    	<th style="text-align:center;">NUEVOS</th>
        <th style="text-align:center;">SIGUEN</th>
        <th style="text-align:center;">DEJARON</th>
        <th style="text-align:center;">VOLVIERON</th>
        <th style="text-align:center;">PAGARON</th>
        <th style="text-align:center;">DEBEN</th>
    </tr>
    {for $i=1 to 12}
    	<tr>
    		<td><a href="{$_layoutParams.root}administrador/reportes/listaSede/{$sede}/{$anioA}/{$i}">{$nombreMes[$i]}</a></td>
            <td>{$reportes[$i].chicos}</td>
            <td>{$reportes[$i].dif_mes}</td>
            <td>{$reportes[$i].dif_anual}</td>
            <td>{$reportes[$i].nuevos}</td>
            <td>{$reportes[$i].siguen}</td>
            <td>{$reportes[$i].dejaron}</td>
            <td>{$reportes[$i].volvieron}</td>
            <td>{$reportes[$i].pagaron}</td>
            <td>{$reportes[$i].deben}</td>
    	</tr>
    {/for}
</table>
{/if}