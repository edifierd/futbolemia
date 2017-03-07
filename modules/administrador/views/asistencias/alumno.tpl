<style>

.bloqueMes{
	margin: 10px;
	background-color: #EAEAEA;
	border: 1px solid #000;
	min-height: 170px;
}

.bloqueDiaP{
	padding: 4px;
	float:left;
	background-color: #0C0;
	margin:3px;
	border: solid 1px #000000;
}

.bloqueDiaA{
	padding: 4px;
	float:left;
	background-color: #F00;
	margin:3px;
	border: solid 1px #000000;
}

.descMes{
	margin-top: 5px;
	text-align:center;
}

</style>

<h2 style="margin-bottom:30px;">Calendario de asistencias</h2>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  
  	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    
  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	
    	<ul class="nav navbar-nav">
        	<li><a href="javascript:history.back()" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
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

<h3>Alumno {$alumno.apellido} {$alumno.nombre} en el año {$anioActual}</h3>

<div class="row" style="margin-top:20px; margin-bottom:20px;">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>ENERO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[1] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[1])} asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
   		<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>FEBRERO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[2] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[2])} asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>MARZO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[3] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[3])} asistencias.
        	</div>
    	</div>
    </div>
</div>


<!------- SEGUNDO BLOQUE ------->

<div class="row" style="margin-top:20px; margin-bottom:20px;">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>ABRIL</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[4] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[4])} asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
   		<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>MAYO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[5] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[5])} asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>JUNIO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[6] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[6])} asistencias.
        	</div>
    	</div>
    </div>
</div>


<!------- TERCER BLOQUE ----->

<div class="row" style="margin-top:20px; margin-bottom:20px;">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>JULIO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[7] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[7])} asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
   		<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>AGOSTO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[8] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[8])} asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>SEPTIEMBRE</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[9] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[9])} asistencias.
        	</div>
    	</div>
    </div>
</div>


<!--- CUARTO BLOQUE ---->

<div class="row" style="margin-top:20px; margin-bottom:20px;">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>OCTUBRE</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[10] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[10])} asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
   		<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>NOVIEMBRE</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[11] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[11])} asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>DICIEMBRE</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	{$cant = 0}
        		{foreach from=$asistencias[12] item=dia} 
        			{if $dia.valor == 'presente'} <div class="bloqueDiaP"> {$cant = $cant + 1} {else} <div class="bloqueDiaA"> {/if}
                		{$dia.fecha|date_format:"%d"} <br>
                	</div>
        		{/foreach}
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: {$alumno.sede} {$alumno.tipo} | {$cant} de {count($asistencias[12])} asistencias.
        	</div>
    	</div>
    </div>
</div>