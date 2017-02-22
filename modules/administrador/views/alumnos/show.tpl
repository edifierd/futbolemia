

<ul class="nav nav-tabs" style="margin-bottom:15px;">
  <li role="presentation"><a href="{$_layoutParams.root}administrador/alumnos/edit/{$alumno.id_alumno}">Modificar Perfil</a></li>
  <li role="presentation"><a href="{$_layoutParams.root}administrador/responsables/listado/{$alumno.id_alumno}">Agregar Responsable</a></li>
  <li role="presentation"><a href="#">Pagos</a></li>
  <li role="presentation"><a href="#">Asistencias</a></li>
</ul>

<div class="row">
	<div class="col-sm-7">
		<div class="panel panel-default">
  			<div class="panel-heading">Datos Personales</div>
  			<div class="panel-body">
    			<ul class="list-group">
  					<li class="list-group-item">Apellido y Nombre: <b>{$alumno.apellido} {$alumno.nombre}</b></li>
  					<li class="list-group-item">DNI: {$alumno.dni}</li>
  					<li class="list-group-item">Fecha de Nacimiento:  {$alumno.nacimiento|date_format:"%d-%m-%Y"}</li>
  					<li class="list-group-item">Colegio: {$alumno.colegio} </li>
        			<li class="list-group-item">Obra Social: {$alumno.obra_social} </li>
        			<li class="list-group-item">Número Afiliado: {$alumno.num_afiliado} </li>
        			<li class="list-group-item" style="height:auto">Observacion Medica: <br /> {$alumno.observacion_medica|nl2br}</li>
				</ul>
  			</div>
		</div>
            
		<div class="panel panel-default">
  			<div class="panel-heading">
            	<form name="form1" method="post" action="" class="form">
                	NOTAS 
                	<button type="submit" class="btn btn-primary btn-xs" style="margin-left:10px;" >Guardar</button>
            </div>
 		    <div class="panel-body">
        			<input type="hidden" value="1" name="guardar" />
               		<textarea name="notas" style="width:100%; min-height:150px;"/>{$alumno.notas}</textarea>
                </form>
                <!--{$alumno.notas|nl2br} Esto sirve para mostrar los saltos de linea-->
            </div>
		</div>
	</div>
    
    <div class="col-sm-5">
    	<div class="panel panel-default">
  			<div class="panel-heading">Sede </div>
 			<div class="panel-body">
            	<ul class="list-group">
  					<li class="list-group-item">Nombre Sede: {$alumno.sede}</li>
  					<li class="list-group-item">Grupo: {$alumno.tipo}</li>
  					<li class="list-group-item">Dias: {$alumno.dias}</li>
  					<li class="list-group-item">Horario: {$alumno.horario}</li>

				</ul>
  			</div>
		</div>
        
        <div class="panel panel-default">
  			<div class="panel-heading">
            	Responsables <a href="{$_layoutParams.root}administrador/responsables/listado/{$alumno.id_alumno}" class="btn btn-primary btn-xs" style="margin-left:10px;">Agregar NUEVO</a>
            </div>
 			<div class="panel-body">
            	<ul class="list-group">
            	{foreach from=$responsables item=r}
                	<div class="row" style="margin:2px; margin-bottom:5px; border: solid 1px #CCCCCC;">
                    	<div class="col-xs-10">
                    		<h4>{$r.nombre} {$r.apellido} - {$r.parentesco}</h4>
                        	Teléfono Fijo: {$r.tel_fijo} <br />
                        	Teléfono Celular {$r.tel_celular} <br />
                        	Dirección: {$r.direccion} <br />
                        </div>
                        <div class="col-xs-2">
                        	<a href="{$_layoutParams.root}administrador/responsables/edit/{$r.id_responsable}/{$alumno.id_alumno}" 
                               class="btn btn-primary btn-xs" style="margin-top: 10px;"><i class="fa fa-pencil fa-2x"></i></a>
                        	<a href="{$_layoutParams.root}administrador/responsables/delete/{$r.id_responsable}/{$alumno.id_alumno}" onClick="javascript: return confirm('¿Estas seguro?');"
                               class="btn btn-danger btn-xs" style="margin-top: 10px;" ><i class="fa fa-trash fa-2x"></i></a>
                       	</div>
                     </div>
				{/foreach}
               	</ul>
  			</div>
		</div>
    </div>
</div>
