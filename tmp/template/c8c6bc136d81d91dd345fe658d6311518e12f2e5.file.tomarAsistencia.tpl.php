<?php /* Smarty version Smarty-3.1.8, created on 2017-06-06 18:12:07
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\asistencias\tomarAsistencia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116075936d4579c7758-41887700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8c6bc136d81d91dd345fe658d6311518e12f2e5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\asistencias\\tomarAsistencia.tpl',
      1 => 1496435967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116075936d4579c7758-41887700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'grupo' => 0,
    'alumnos' => 0,
    'a' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5936d457a9c787_01424774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936d457a9c787_01424774')) {function content_5936d457a9c787_01424774($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\futbolemia\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><div class="btn-group">
	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/grupos/show/<?php echo $_smarty_tpl->tpl_vars['grupo']->value['id_grupo'];?>
" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
</div>

<h3>Tomar asistencia en <?php echo $_smarty_tpl->tpl_vars['grupo']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['grupo']->value['tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['dias'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['horario'];?>
 </h3><br>


<table class="table table-striped">
	<form name="form1" method="post" action="" class="form">
		<input type="hidden" value="1" name="guardar" />
		<tr>
			<td colspan="2">
				<h4>Seleccionar fecha:
					<input type="date" name="fecha" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
" style="margin-bottom:20px; margin-left:10px;"/></h4>
				</td>
			</tr>
			<tr>
				<th style="width:20px;">Asistencia</th>
				<th>Apellido Nombre </th>
			</tr>

			<?php if (isset($_smarty_tpl->tpl_vars['alumnos']->value)&&count($_smarty_tpl->tpl_vars['alumnos']->value)){?>
			<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['alumnos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
			<tr id="<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" class="fila" <?php if (isset($_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->tpl_vars['a']->value['id_alumno']])){?>style="background-color:#C0C7FC"<?php }?>>
				<td style="text-align:center;">
					<input type="checkbox" value="presente" id="<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->tpl_vars['a']->value['id_alumno']])){?>checked<?php }?> >
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['a']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['nombre'];?>
 </td>
			</tr>
			<?php } ?>
			<?php }else{ ?>
			<tr>
				<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No hay alumnos en este grupo</h3></td>
			</tr>
			<?php }?>
			<tr>
				<td colspan="2" style="text-align:center;">
					<?php if (isset($_smarty_tpl->tpl_vars['alumnos']->value)&&count($_smarty_tpl->tpl_vars['alumnos']->value)){?>
					<button type="submit" class="btn btn-primary">Enviar</button>
					<?php }?>
				</td>
			</tr>
		</form>

	</table>
<?php }} ?>