
<div class="btn-group">
	<a href="javascript:history.back()" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
	<a href="{$_layoutParams.root}administrador/asistencias/tomarAsistencia/{$grupo.id_grupo}" class="btn btn-default">Tomar Asistencia</a>
</div>

<h3>Listado alumnos {$grupo.sede} {$controller->getTipoGrupo($grupo.tipo)} - {$grupo.dias} - {$grupo.horario} </h3><br>


<table class="table table-striped">
	<tr>
    	<th style="text-align:center;">Apellido Nombre </th>
        <th style="text-align:center;">Asistencias Mes Actual</th>
        <th style="text-align:center;">Deudas</th>
        <th colspan="2" style="text-align:center;">Acciones</th>
    </tr>

    {if isset($alumnos) && count($alumnos)}
    	{foreach from=$alumnos item=a}
    		<tr style="text-align:center;">
					<td><a href="{$_layoutParams.root}administrador/alumnos/show/{$a.id_alumno}">{$a.apellido} {$a.nombre}</a></td>

        		<td>
                 <b>{$asistenciasModel->getCantAsistenciasAlumno($a.id_alumno,false,true)}</b> asistencias de
                 <b>{$asistenciasModel->getCantClasesAlumno($a.id_alumno,false,true)}</b> clases.
                </td>
                <td>
										{assign var="cuotas" value=$cuotasModel->getMesesAdeudados($a.id_alumno)}
                		{if ! $cuotas }
                    	<b style="color:#390">Sin Deuda</b>
                    {elseif ($cuotas|@count) > 1}
											<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{$a.id_alumno}">Ver Deuda</button>
											<div id="myModal{$a.id_alumno}" class="modal fade" role="dialog">
												<div class="modal-dialog">

													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title"> Meses adeudados de: {$a.apellido} {$a.nombre} </h4>
														</div>
														<div class="modal-body">
															<ul class="list-group">
																{foreach from=$cuotas item=c}
																	<!-- <li class="list-group-item"><b>{$c.fecha|date_format:"%m"} / {$c.fecha|date_format:"%Y"}</b></li> -->
																	<li class="list-group-item"><b>{$c.fecha}</b></li>
																{/foreach}
															</ul>
														</div>
														<div class="modal-footer">
															<a href="{$_layoutParams.root}administrador/cuotas/alumno/{$a.id_alumno}" class="btn btn-primary">Pagar Deuda</a>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
														</div>
													</div>

												</div>
											</div>
										{else}
											<!-- ({$cuotas[0].fecha|date_format:"%m"}) -->
											<b style="color:#FF0000">Mes Actual</b>
                    {/if}
                </td>
                <td style="text-align:center;"><a href="{$_layoutParams.root}administrador/asistencias/alumno/{$a.id_alumno}" class="btn btn-primary btn-xs">Asistencias Alumno</a></td>
                <td style="text-align:center;">
                	<a href="{$_layoutParams.root}administrador/alumnos/delete/{$a.id_alumno}" class="btn btn-danger btn-xs"
                       onClick="javascript: return confirm('¿Estas seguro?');">
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
