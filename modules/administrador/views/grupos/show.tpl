<div class="btn-group">
	<a href="javascript:history.back()" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
	<a href="{$_layoutParams.root}administrador/asistencias/tomarAsistencia/{$grupo.id_grupo}" class="btn btn-default">Tomar Asistencia</a>
</div>

<h3>Listado alumnos {$grupo.sede} {$grupo.tipo} - {$grupo.dias} - {$grupo.horario} </h3><br>


<table class="table table-striped">
	<tr>
    	<th style="text-align:center;">Apellido Nombre </th>
        <th style="text-align:center;">Asistencias Mes Actual</th>
        <th style="text-align:center;">Cuotas</th>
        <th colspan="2" style="text-align:center;">Acciones</th>
    </tr>

    {if isset($alumnos) && count($alumnos)}
    	{foreach from=$alumnos item=a}
    		<tr style="text-align:center;" id="fila{$a.id_alumno}">
					<td><a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}">{$a.apellido} {$a.nombre}</a></td>

        		<td>
                 <b>{$asistenciasModel->getCantAsistenciasAlumno($a.id_alumno,false,true)}</b> asistencias de
                 <b>{$asistenciasModel->getCantClasesAlumno($a.id_alumno,false,true)}</b> clases.
                </td>
                <td>
										{assign var="cuotas" value=$cuotasModel->getMesesAdeudados($a.id_alumno)}
										{if ($cuotas|@count) > 0 }
											<!-- Modal -->
											<div id="myModal{$a.id_alumno}" class="modal fade" role="dialog">
											  <div class="modal-dialog">
											    <!-- Modal content-->
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">Cuotas adeudadas de {$a.apellido} {$a.nombre}</h4>
											      </div>
											      <div class="modal-body">
															<ul class="list-group">
																{foreach from=$cuotas item=cuota}
																	<li class="list-group-item">{$cuota['fecha']}</li>
																{/foreach}
															</ul>
											      </div>
											      <div class="modal-footer">
															<a href="{$_layoutParams.root}administrador/cuotas/alumno/{$a.id_alumno}" class="btn btn-success btn-sm">Abonar</a>
															<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
											      </div>
											    </div>
											  </div>
											</div>

											{if ($cuotas|@count) > 1 }
												<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{$a.id_alumno}" style="width: 100%; margin: 0 3px;">Con Deudas</button>
											{else}
												<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal{$a.id_alumno}" style="width: 100%; margin: 0 3px;">Con Deudas</button>
											{/if}
										{else}
											<!-- <p style="color:green;"><b>Sin Deuda</b></p> -->
											<span class="btn btn-success btn-xs" style="width: 100%; margin: 0 3px; pointer-events: none;">Sin Deudas</span>
										{/if}
                </td>
                <td style="text-align:center;"><a href="{$_layoutParams.root}administrador/asistencias/alumno/{$a.id_alumno}" class="btn btn-info btn-xs">Asistencias Alumno</a></td>
                <td style="text-align:center;">
									<a href="#" idAlumno="{$a.id_alumno}" idGrupoo="{$grupo.id_grupo}" class="btn btn-danger btn-xs suspender">
							      <i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i>
							      Suspender
							    </a>
                </td>
            </tr>
		{/foreach}
	{else}
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No hay alumnos en este grupo</h3></td>
        </tr>
	{/if}

</table>
