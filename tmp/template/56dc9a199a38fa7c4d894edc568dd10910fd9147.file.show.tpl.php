<?php /* Smarty version Smarty-3.1.8, created on 2017-06-16 21:06:59
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\grupos\show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175315936d449632a77-24940920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56dc9a199a38fa7c4d894edc568dd10910fd9147' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\grupos\\show.tpl',
      1 => 1497640010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175315936d449632a77-24940920',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5936d4497b3189_22808653',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'grupo' => 0,
    'alumnos' => 0,
    'a' => 0,
    'asistenciasModel' => 0,
    'cuotasModel' => 0,
    'cuotas' => 0,
    'cuota' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936d4497b3189_22808653')) {function content_5936d4497b3189_22808653($_smarty_tpl) {?><div class="btn-group">
	<a href="javascript:history.back()" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/asistencias/tomarAsistencia/<?php echo $_smarty_tpl->tpl_vars['grupo']->value['id_grupo'];?>
" class="btn btn-default">Tomar Asistencia</a>
</div>

<h3>Listado alumnos <?php echo $_smarty_tpl->tpl_vars['grupo']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['grupo']->value['tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['dias'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['horario'];?>
 </h3><br>


<table class="table table-striped">
	<tr>
    	<th style="text-align:center;">Apellido Nombre </th>
        <th style="text-align:center;">Asistencias Mes Actual</th>
        <th style="text-align:center;">Cuotas</th>
        <th colspan="2" style="text-align:center;">Acciones</th>
    </tr>

    <?php if (isset($_smarty_tpl->tpl_vars['alumnos']->value)&&count($_smarty_tpl->tpl_vars['alumnos']->value)){?>
    	<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['alumnos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
    		<tr style="text-align:center;" id="fila<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
">
					<td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/show/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['nombre'];?>
</a></td>

        		<td>
                 <b><?php echo $_smarty_tpl->tpl_vars['asistenciasModel']->value->getCantAsistenciasAlumno($_smarty_tpl->tpl_vars['a']->value['id_alumno'],false,true);?>
</b> asistencias de
                 <b><?php echo $_smarty_tpl->tpl_vars['asistenciasModel']->value->getCantClasesAlumno($_smarty_tpl->tpl_vars['a']->value['id_alumno'],false,true);?>
</b> clases.
                </td>
                <td>
										<?php $_smarty_tpl->tpl_vars["cuotas"] = new Smarty_variable($_smarty_tpl->tpl_vars['cuotasModel']->value->getMesesAdeudados($_smarty_tpl->tpl_vars['a']->value['id_alumno']), null, 0);?>
										<?php if ((count($_smarty_tpl->tpl_vars['cuotas']->value))>0){?>
											<!-- Modal -->
											<div id="myModal<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" class="modal fade" role="dialog">
											  <div class="modal-dialog">
											    <!-- Modal content-->
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">Cuotas adeudadas de <?php echo $_smarty_tpl->tpl_vars['a']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['nombre'];?>
</h4>
											      </div>
											      <div class="modal-body">
															<ul class="list-group">
																<?php  $_smarty_tpl->tpl_vars['cuota'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cuota']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cuotas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cuota']->key => $_smarty_tpl->tpl_vars['cuota']->value){
$_smarty_tpl->tpl_vars['cuota']->_loop = true;
?>
																	<li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['cuota']->value['fecha'];?>
</li>
																<?php } ?>
															</ul>
											      </div>
											      <div class="modal-footer">
															<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/cuotas/alumno/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" class="btn btn-success btn-sm">Abonar</a>
															<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cerrar</button>
											      </div>
											    </div>
											  </div>
											</div>

											<?php if ((count($_smarty_tpl->tpl_vars['cuotas']->value))>1){?>
												<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" style="width: 100%; margin: 0 3px;">Con Deudas</button>
											<?php }else{ ?>
												<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" style="width: 100%; margin: 0 3px;">Con Deudas</button>
											<?php }?>
										<?php }else{ ?>
											<!-- <p style="color:green;"><b>Sin Deuda</b></p> -->
											<span class="btn btn-success btn-xs" style="width: 100%; margin: 0 3px; pointer-events: none;">Sin Deudas</span>
										<?php }?>
                </td>
                <td style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/asistencias/alumno/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" class="btn btn-info btn-xs">Asistencias Alumno</a></td>
                <td style="text-align:center;">
									<a href="#" idAlumno="<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" idGrupoo="<?php echo $_smarty_tpl->tpl_vars['grupo']->value['id_grupo'];?>
" class="btn btn-danger btn-xs suspender">
							      <i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i>
							      Suspender
							    </a>
                </td>
            </tr>
		<?php } ?>
	<?php }else{ ?>
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No hay alumnos en este grupo</h3></td>
        </tr>
	<?php }?>

</table>
<?php }} ?>