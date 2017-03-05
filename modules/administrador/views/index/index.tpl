

<h3>¡ Hola ! {$current_user.apellido} {$current_user.nombre}. Bienvenido al panel de Administración</h3>



<div class="row" style=" background-color: #E5E5E5; text-align:center; margin-top: 25px; border-radius:15px;">
	<div class="col-md-12">
    	<h3><u>BUSCADOR DE ALUMNOS</u></h3>
    	<form class="navbar-form navbar-left" role="search" method="post" action="{$_layoutParams.root}administrador/alumnos/index" >
        	<input type="hidden" value="1" name="buscar" />
  			<div class="form-group">
            	<span>Sede:</span> 
            	<select id="sede" name="sede" style="height:32px;">
                	<option value="todos" >Todos</option>
            		<option value="La Cumbre" >La Cumbre</option>
                    <option value="Los Hornos" >Los Hornos</option>
                    <option value="El Retiro" >El Retiro</option>
				</select>
                <span>Nombre:</span>
    			<input type="text" class="form-control" placeholder="Nombre o Apellido o DNI..." name="casillero" id="casillero">
  			</div>
  			<button type="submit" class="btn btn-default">Buscar</button>
		</form>
    </div>
</div>

<h3>Mis Grupos:</h3>

<div class="row" style="margin-top:30px;">
{if isset($grupos) && count($grupos)}
{foreach from=$grupos item=g}
	<div class="col-xs-12 col-sm-6 col-md-4">
    	<a href="{$_layoutParams.root}administrador/grupos/show/{$g.id_grupo}">
    	<div class="panel panel-success">
  			<div class="panel-heading"><h3>{$g.sede}</h3></div>
  			<div class="panel-body">
    			<ul class="list-group">
  					<li class="list-group-item">{$g.tipo}</li>
  					<li class="list-group-item">{$g.dias}</li>
  					<li class="list-group-item">{$g.horario}</li>
				</ul>
  			</div>
		</div>
        </a>
    </div>
{/foreach}
{else}
	<div class="col-xs-12 col-sm-6 col-md-4" style="text-align:center;">
		<h3>Aún no se ha creado un grupo. O no perteneces a ninguno.</h3>
    </div>
{/if}
</div>