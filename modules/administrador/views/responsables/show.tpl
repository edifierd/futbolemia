
<h3>Perfil de persona autorizada a retirar</h3><br>

<div class="btn-group" style="margin-bottom:20px;">
	<a href="javascript:history.back()" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
	<a href="{$_layoutParams.root}administrador/responsables/edit/{$responsable.id_responsable}" class="btn btn-default"> Modificar</a>
</div>

<div class="row">
	<div class="col-sm-6">
    	<div class="panel panel-default">
  			<div class="panel-heading">
            	Datos Personales
                <a href="{$_layoutParams.root}administrador/responsables/edit/{$responsable.id_responsable}" class="btn btn-primary btn-xs" >Modificar Datos</a>
            </div>
  			<div class="panel-body">
    			<ul class="list-group">
  					<li class="list-group-item">Apellido y Nombre: <b>{$responsable.apellido} {$responsable.nombre}</b></li>
  					<li class="list-group-item">DNI: {$responsable.dni}</li>
  					<li class="list-group-item">Teléfono Fijo:  {$responsable.tel_fijo}</li>
  					<li class="list-group-item">Teléfono celular: {$responsable.tel_celular} </li>
        			<li class="list-group-item">Dirección: {$responsable.direccion} </li>
        			<li class="list-group-item">Correo: {$responsable.correo} </li>
				</ul>
  			</div>
		</div>
    </div>
    
    <div class="col-sm-6">
    	<div class="panel panel-default">
  			<div class="panel-heading">
            	Alumnos a cargo
            </div>
 			<div class="panel-body">
            	<ul class="list-group">
            	{foreach from=$alumnosACargo item=a}
					<li class="list-group-item"> <a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}">{$a.apellido} {$a.nombre} - {$a.dni}</a></li>
				{/foreach}
               	</ul>
  			</div>
		</div>
    </div>
</div>