

<ul class="nav nav-tabs" style="margin-bottom:15px;">
  <li role="presentation" class="active"><a href="#">Modificar Perfil</a></li>
  <li role="presentation"><a href="#">Agregar Responsable</a></li>
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
  					<li class="list-group-item">Fecha de Nacimiento: {$alumno.nacimiento}</li>
  					<li class="list-group-item">Colegio: {$alumno.colegio}</li>
        			<li class="list-group-item">Obra Social: {$alumno.obra_social} </li>
        			<li class="list-group-item">Número Afiliado: {$alumno.num_afiliado} </li>
        			<li class="list-group-item">Observacion Medica: {$alumno.observacion_medica|nl2br}</li>
				</ul>
  			</div>
		</div>
            
		<div class="panel panel-default">
  			<div class="panel-heading">NOTAS</div>
 			<div class="panel-body">
				{$alumno.notas|nl2br}
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
  			<div class="panel-heading">Responsables</div>
 			<div class="panel-body">
  			</div>
		</div>
    </div>
</div>
