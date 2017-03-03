<h3>Reportes Detallado para {$sede} / {$anioA}</h3><br>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav">
        	<li><a href="{$_layoutParams.root}administrador/reportes/lista/{$anioA}/{$sede}" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
   	    </ul>
    </div>
  </div>
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
    	</tr>
   {/foreach}
</table>
