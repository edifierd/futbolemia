{if $alumno.estado == 'e' }
<h3>La ultima actualización de este alumno es del {$alumno.ult_actualizacion|date_format:"%d-%m-%Y"}</h3>
{/if}

<nav class="navbar navbar-default" style="margin-bottom:15px;">
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
			<ul class="nav navbar-nav" >
				<li><a href="{$_layoutParams.root}administrador/alumnos" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
				{if $alumno.estado == 'a'}
					<li><a href="{$_layoutParams.root}administrador/alumnos/edit/{$alumno.id_alumno}">Modificar</a></li>
					{if $_acl->permiso('control_pagos')}
					<li><a href="{$_layoutParams.root}administrador/cuotas/alumno/{$alumno.id_alumno}">Pagos</a></li>
					{/if}
					<li><a href="{$_layoutParams.root}administrador/asistencias/alumno/{$alumno.id_alumno}">Asistencias</a></li>
					<li><a href="{$_layoutParams.root}administrador/responsables/listado/{$alumno.id_alumno}">Agregar Responsable</a></li>
					<li>
						{* <a href="{$_layoutParams.root}administrador/alumnos/delete/{$alumno.id_alumno}" style=" color:#C00;" onClick="javascript: return confirm('¿Estas seguro?');">Suspender</a> *}
						<a href="#" idAlumno="{$alumno.id_alumno}" class="suspender">
							<i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i>
							Suspender
						</a>
					</li>
				{/if}
				{if $alumno.estado == 'e'}
				<li><a href="{$_layoutParams.root}administrador/alumnos/reactivar/{$alumno.id_alumno}"><b style="color:red;">Reactivar Usuario</b></a></li>
				{/if}
			</ul>
		</div>
	</div>
</nav>

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
					{if $alumno.estado == 'a'}
					<button type="submit" class="btn btn-primary btn-xs" style="margin-left:10px;" >Guardar</button>
					{/if}
				</div>
				<div class="panel-body">
					<input type="hidden" value="1" name="guardar" />
					<textarea name="notas" style="width:100%; min-height:150px;"/>{$alumno.notas}</textarea>
				</form>
				<!--{$alumno.notas|nl2br} Esto sirve para mostrar los saltos de linea-->
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-10">Certificado de aptitud física</div>
					<div class="col-xs-2">
						{if $alumno.certificado_fisico != ''}
						<form name="form1" method="post" action="" class="form">
							<input type="hidden" value="1" name="eliminar" />
							<button type="submit" class="btn btn-danger btn-xs" style="" ><i class="fa fa-trash fa-2x"></i></button>
						</form>
						{/if}
					</div>
				</div>
			</div>
			<div class="panel-body" style="text-align:center;">
				{if $alumno.certificado_fisico != ''}
				<a href="{$_layoutParams.root}public/img/alumnos/{$alumno.certificado_fisico}" target="_blank" title="Clic para Ampliar imagen">
					<img src="{$_layoutParams.root}public/img/alumnos/{$alumno.certificado_fisico}" style="width:100%; height:auto;"/>
				</a>
				{else}
				<h3 style="color:#C00;">No se guardo ningun certificado.</h3>
				{/if}
			</div>
		</div>
	</div>

	<div class="col-sm-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				Sede
				{if $alumno.estado == 'a'}
				<a href="{$_layoutParams.root}administrador/grupos/show/{$alumno.id_grupo}" class="btn btn-primary btn-xs" style="margin-left:10px;">Ver Grupo</a>
				{/if}
			</div>
			<div class="panel-body">
				{if $alumno.estado == 'a'}
				<ul class="list-group">
					<li class="list-group-item">Nombre Sede: <a href="{$_layoutParams.root}administrador/grupos/show/{$alumno.id_grupo}"> {$alumno.sede}</a></li>
					<li class="list-group-item">Grupo: {$alumno.tipo} Grado</li>
					<li class="list-group-item">Dias: {$alumno.dias}</li>
					<li class="list-group-item">Horario: {$alumno.horario}</li>

				</ul>
				{/if}
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				Responsables
				{if $alumno.estado == 'a'}
				<a href="{$_layoutParams.root}administrador/responsables/listado/{$alumno.id_alumno}" class="btn btn-primary btn-xs" style="margin-left:10px;">Agregar NUEVO</a>
				{/if}
			</div>
			<div class="panel-body">
				<ul class="list-group">

					{foreach from=$responsables item=r}
					<div class="panel panel-default resp" id="{$r.id_responsable}" style="cursor:pointer;">
						<div class="panel-heading">
								{$r.nombre} {$r.apellido} - {$r.parentesco}
						</div>
						<div class="panel-body" >
							<div class="row" >
								<div class="col-xs-10" style="padding:0 6px;">
									Teléfono Fijo: {$r.tel_fijo} <br />
									Teléfono Celular: {$r.tel_celular} <br />
									Dirección: {$r.direccion} <br />
								</div>
								<div class="col-xs-2" style="padding:0;">
									{if $alumno.estado == 'a'}
									<a href="{$_layoutParams.root}administrador/responsables/edit/{$r.id_responsable}/{$alumno.id_alumno}"
									class="btn btn-primary btn-xs" ><i class="fa fa-pencil fa-2x"></i></a>
									<button type="button" name="button" idResponsable="{$r.id_responsable}" idAlumno="{$alumno.id_alumno}" class="btn btn-danger btn-xs delete" style="margin-top: 10px;"><i class="fa fa-trash fa-2x"></i></button>
									{/if}
								</div>
							</div>
						</div>
					</div>
					{* <div class="row" style="margin:2px; margin-bottom:5px; border: solid 1px #CCCCCC;">
						<div class="col-xs-10">
							<h4>
								<a href="{$_layoutParams.root}administrador/responsables/show/{$r.id_responsable}">
									{$r.nombre} {$r.apellido} - {$r.parentesco}
								</a>
							</h4>
							Teléfono Fijo: {$r.tel_fijo} <br />
							Teléfono Celular {$r.tel_celular} <br />
							Dirección: {$r.direccion} <br />
						</div>
						<div class="col-xs-2">
							{if $alumno.estado == 'a'}
							<a href="{$_layoutParams.root}administrador/responsables/edit/{$r.id_responsable}/{$alumno.id_alumno}"
							class="btn btn-primary btn-xs" style="margin-top: 10px;"><i class="fa fa-pencil fa-2x"></i></a>
							<a href="{$_layoutParams.root}administrador/responsables/delete/{$r.id_responsable}/{$alumno.id_alumno}" onClick="javascript: return confirm('¿Estas seguro?');"
							class="btn btn-danger btn-xs" style="margin-top: 10px;" ><i class="fa fa-trash fa-2x"></i></a>
							{/if}
						</div>
					</div> *}
					{/foreach}
				</ul>
			</div>
		</div>
	</div>
</div>
