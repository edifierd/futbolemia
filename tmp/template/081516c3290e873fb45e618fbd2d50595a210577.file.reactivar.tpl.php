<?php /* Smarty version Smarty-3.1.8, created on 2017-06-06 18:11:58
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\alumnos\reactivar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109935936d44e27d5b7-13882451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '081516c3290e873fb45e618fbd2d50595a210577' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\alumnos\\reactivar.tpl',
      1 => 1496318228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109935936d44e27d5b7-13882451',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'alumno' => 0,
    'grupo' => 0,
    'grupos' => 0,
    'g' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5936d44e31e627_42396485',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936d44e31e627_42396485')) {function content_5936d44e31e627_42396485($_smarty_tpl) {?><h2>Seleccionar grupo para reactivar al alumno</h2>

<div class="well span5">
	<form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        
        <p>
            <label>Nombre Completo: </label>
            <label><?php echo $_smarty_tpl->tpl_vars['alumno']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['nombre'];?>
 </label>
        </p>
        
        <p>
            <label>DNI: </label>
            <label><?php echo $_smarty_tpl->tpl_vars['alumno']->value['dni'];?>
</label>
        </p>
        
        <p>
            <label>Grupo Actual: </label>
            <select id="grupo" name="grupo" >
            	<option value="0" ><?php echo $_smarty_tpl->tpl_vars['grupo']->value['sede'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['dias'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['horario'];?>
</option>
        		<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grupos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['g']->value['id_grupo'];?>
" ><?php echo $_smarty_tpl->tpl_vars['g']->value['sede'];?>
 - <?php echo $_smarty_tpl->tpl_vars['g']->value['tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['g']->value['dias'];?>
 - <?php echo $_smarty_tpl->tpl_vars['g']->value['horario'];?>
</option>
				<?php } ?>
			</select>
        </p>
        
        <p>
            <button type="submit" class="btn btn-primary">Confirmar</button>
            <a href="javascript:history.back()" class="btn btn-danger" style="margin-left:25px;">Cancelar</a>
        </p>
	</form>
</div><?php }} ?>