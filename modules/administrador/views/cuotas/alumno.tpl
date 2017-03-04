
<h3>Pagos de {$alumno.apellido} {$alumno.nombre}</h3><br>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav">
        	<li><a href="{$_layoutParams.root}administrador/alumnos/show/{$alumno.id_alumno}" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
   	    </ul>
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
  			<button type="submit" class="btn btn-default">Buscar</button>
		</form>
    </div>
  </div>
</nav>

<table class="table" style="text-align:center;">
	<tr>
		<th style="text-align:center;">MES</th>
    	<th style="text-align:center;">CANTIDAD ASISTENCIAS </th>
    	<th style="text-align:center;">ESTADO</th>
    	<th style="text-align:center;">MONTO</th>
    	<th style="text-align:center;">ACCION</th>
    </tr>
    {for $i=3 to 12}
    	<tr>
    		<td>{$nombreMes[$i]}</td>
        	<td>{$cantAsistencias[$i]} de {count($asistencias[$i])} Clases
        	<td>
        		{if $cuotas[$i] == 'impago'} 
           	 		<span style="color:#C00;">Adeuda</span>
            	{else}
            		<span style="color:#090;">Pagado ({$cuotas[$i].fecha_pago|date_format:"%d-%m-%Y"})</span>
            	{/if}
        	</td>
        	<td>
        	<form name="form1" method="post" action="" class="form">
        		<input type="hidden" value="1" name="pagar" />
                <input type="hidden" value="{$i}" name="mes" />
        		{if $cuotas[$i] == 'impago'} 
				<b>$</b> <input type="number" name="monto{$i}" value="{$datos.monto|default:""}" />
                {else}
                	<b>$ {$cuotas[$i].monto}</b>
            	{/if}
        	</td><td>
        		<button type="submit" class="btn btn-primary" onClick="javascript: return confirm('¿Estas seguro?');">Pagar</button>
    		</form>
        	</td>
    	</tr>
    {/for}
</table>