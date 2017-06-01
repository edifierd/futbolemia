<h3>Reportes Detallado para {$sede} / {$anioA}</h3><br>

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
      <ul class="nav navbar-nav">
      	<li style="text-align:center;">
        	<li><a href="{$_layoutParams.root}administrador/reportes/lista/{$anioA}/{$sede}" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<table class="table table-striped" style="text-align:center; font-weight:bold;" >
	<tr>
		<th style="text-align:center;">TIPO GRUPO</th>
    	<th style="text-align:center;">CHICOS</th>
    	<th style="text-align:center;">NUEVOS</th>
    	<th style="text-align:center;">SIGUEN</th>
    	<th style="text-align:center;">DEJARON</th>
        <th style="text-align:center;">VOLVIERON</th>
        <th style="text-align:center;">PAGARON</th>
        <th style="text-align:center;">DEBEN</th>
        <th style="text-align:center;">INSCRIPCIONES</th>
        <th style="text-align:center;">RECAUDADO</th>
    </tr>
    {foreach from=$reportes item=r}
    	<tr>
    		<td>{$r.tipo}</td>
            <td>{$r.chicos}</td>
            <td>{$r.nuevos}</td>
            <td>{$r.siguen}</td>
            <td>{$r.dejaron}</td>
            <td>{$r.volvieron}</td>
            <td>{$r.pagaron}</td>
            <td>{$r.deben}</td>
            <td>${$inscripciones->getMontoInscripcionesGrupo($mes,$anioA,$r.id_grupo)}</td>
            {if $r.recaudado > 0}
            	<td style="color:#3C0;">$ {$r.recaudado}</td>
            {else}
            	<td style="color:#C00;">$ {$r.recaudado}</td>
            {/if}
    	</tr>
   {/foreach}
</table>
