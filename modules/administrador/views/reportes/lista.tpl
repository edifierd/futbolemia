<h3>Reportes Futbolemia para {$sede} / {$anioA}</h3><br>

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

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      {if $reportes != false}
      <ul class="nav navbar-nav">
      	<li style="text-align:center;">
        	<a href="{$_layoutParams.root}administrador/reportes/generar/{$anioA}/{$sede}" style="color:#F00;"> Actualizar Reportes </a>
        </li>
      </ul>
      {/if}
      <form class="navbar-form navbar-left" role="search" method="post" action="" >
        	<input type="hidden" value="1" name="buscar" />
  			<div class="form-group">
            	<label style="margin-right:15px; width:40px;">Año: </label>
            	<select id="anio" name="anio" style="height:32px; margin-right:15px; width:120px;">
                {foreach from=$listaAnios item=anio}
        			<option value="{$anio[1]}" >{$anio[1]}</option>
        		{/foreach}
				</select>
            </div>

            <div class="form-group">
            	<label style="margin-right:15px; width:40px;">Sede: </label>
            	<select id="sede" name="sede" style="height:32px; width:120px;">
                	<option value="Los_Hornos" >Los Hornos</option>
            		<option value="La_Cumbre" >La Cumbre</option>
                    <option value="El_Retiro" >El Retiro</option>
				</select>
            </div>
            <button type="submit" class="btn btn-default" >Buscar</button>
	  </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


{if $reportes == false}
<div class="alert alert-warning" role="alert" style="text-align:center; margin-top:100px;">
	<h3>Debe seleccionar para buscar un reporte.</h3>
</div>
{else}
<div class="row">
	{for $i=3 to 12}
	<div class="col-xs-12 col-sm-6 col-md-4">
    	<div class="panel panel-primary">
  			<div class="panel-heading"><a href="{$_layoutParams.root}administrador/reportes/listaSede/{$sede}/{$anioA}/{$i}" style="color:#FFF;"><h4>{$nombreMes[$i]}</h4></a></div>
  			<div class="panel-body">
    			<table class="table table-striped">
                    <tr><th>CHICOS</th><td style="text-align:center;">{$reportes[$i].chicos}</td></tr>
                    <tr><th>DIFERENCIA MES</th><td style="text-align:center;">{$reportes[$i].dif_mes}</td></tr>
                    <tr><th>DIFERENCIA ANUAL</th><td style="text-align:center;">{$reportes[$i].dif_anual}</td></tr>
                    <tr><th>NUEVOS</th><td style="text-align:center;">{$reportes[$i].nuevos}</td></tr>
                    <tr><th>SIGUEN</th><td style="text-align:center;">{$reportes[$i].siguen}</td></tr>
                    <tr><th>DEJARON</th><td style="text-align:center;">{$reportes[$i].dejaron}</td></tr>
                    <tr><th>VOLVIERON</th><td style="text-align:center;">{$reportes[$i].volvieron}</td></tr>
                    <tr><th>PAGARON</th><td style="text-align:center;">{$reportes[$i].pagaron}</td></tr>
                    <tr><th>DEBEN</th><td style="text-align:center;">{$reportes[$i].deben}</td></tr>
                    <form name="form1" method="post" action="{$_layoutParams.root}administrador/reportes/guardarFinanzas/{$anioA}/{$sede}" class="form">
        				<input type="hidden" value="1" name="guardar" />
                        <input type="hidden" value="{$finanzas[$i].id_finanza}" name="id_finanza" />
                        <tr><th>RECAUDADO</th>
                        	<td style="text-align:center;">${$reportes[$i].recaudado}</td>
                        </tr>
                        <tr><th colspan="2">GASTO COMPLEJO</th></tr>
                        <tr>
                        	<td colspan="2" style="text-align:center;">
                            <input type="number" name="complejo" value="{$finanzas[$i].complejo|default:"0"}" style="text-align:right; width:100%;" /></td>
                        </tr>
                        <tr><th colspan="2">GASTO PROFESORES</th></tr>
                        <tr>
                        	<td colspan="2" style="text-align:center;">
                            <input type="number" name="profesores" value="{$finanzas[$i].profesores|default:"0"}" style="text-align:right; width:100%;" /></td>
                        </tr>
                        <tr><th colspan="2">CAMISETAS</th></tr>
                        <tr>
                        	<td colspan="2" style="text-align:center;">
                            <input type="number" name="camisetas" value="{$finanzas[$i].camisetas|default:"0"}" style="text-align:right; width:100%;" /></td>
                        </tr>
                        <tr style="padding:0;">
                          <th style="margin: 0 3px;">GANANCIAS</th>
                        	{$total = $reportes[$i].recaudado - $finanzas[$i].complejo - $finanzas[$i].profesores}
                          {if $total > 0}
                      		  <td style="text-align:center; color:#090;"><b>${$total}</b></td>
                          {else}
                          	<td style="text-align:center; color:#C00"><b>${$total}</b></td>
                          {/if}
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:center;">
                            	<button type="submit" class="btn btn-warning">Guardar</button>
                            </td>
                        </tr>
    				</form>
                </table>
  			</div>
		</div>
    </div>
    {/for}
</div>
{/if}
