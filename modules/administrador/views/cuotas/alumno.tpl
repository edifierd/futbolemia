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
                <button type="submit" class="btn btn-default">Buscar</button>
  			</div>

		</form>
    </div>
  </div>
</nav>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h4>Pagos de {$alumno.apellido} {$alumno.nombre}:</h4>
  </div>

  {if ! $inscripcion}
  <div class="panel-body" style="padding: 2% 5% ;">
    <div class="alert alert-danger row" role="alert" style="color:black;">
      <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="inscripcion" />
        <div class="col-md-5" style="text-align:center;">
          <p style="margin: 5% 0;"><b>La incripción se encuentra impaga</b></p>
        </div>
        <div class="col-md-4" style="text-align:center;">
          <input type="number" name="montoInsc" value="" style="margin: 3% 0; " class="form-control" placeholder="$"/>
        </div>
        <div class="col-md-3" style="text-align:center;">
          <button type="submit" class="btn btn-primary" onClick="javascript: return confirm('¿Estas seguro?');" style="margin: 3% 0;">Pagar</button>
        </div>
      </form>
    </div>
  </div>
  {/if}

  <!-- Table -->
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
  				        <input type="number" name="monto{$i}" value="{$datos.monto|default:""}" class="form-control" placeholder="$" />
                  {else}
                  	<b>$ {$cuotas[$i].monto}</b>
              	{/if}
          	</td><td>
              {if $cuotas[$i] == 'impago'}
          		  <button type="submit" class="btn btn-primary" onClick="javascript: return confirm('¿Estas seguro?');">Pagar</button>
              {/if}
      		</form>
          	</td>
      	</tr>
      {/for}
  </table>

  {if $inscripcion}
    <div class="panel-body">
      <div class="alert alert-info" role="alert" style="text-align:center;"><b>La inscripción se encuentra paga. Fecha: {$inscripcion['fecha']|date_format:"%d-%m-%Y"}.</b></div>
    </div>
  {/if}
</div>
