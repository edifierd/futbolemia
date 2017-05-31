<?php /* Smarty version Smarty-3.1.8, created on 2017-05-17 14:53:43
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\asistencias\tomarAsistencia.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23642591c47d74f6eb0-25461215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8c6bc136d81d91dd345fe658d6311518e12f2e5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\asistencias\\tomarAsistencia.tpl',
      1 => 1494592492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23642591c47d74f6eb0-25461215',
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
  'unifunc' => 'content_591c47d7647d02_93220312',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591c47d7647d02_93220312')) {function content_591c47d7647d02_93220312($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\futbolemia\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
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
    	<td colspan="3">
        	<h4>Seleccionar fecha: 
            <input type="date" name="fecha" value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
" style="margin-bottom:20px; margin-left:10px;"/></h4>
        </td>
    </tr>
	<tr>
    	<th>ID</th>
    	<th>Apellido Nombre </th>
        <th>Asistencia</th>
    </tr>

    <?php if (isset($_smarty_tpl->tpl_vars['alumnos']->value)&&count($_smarty_tpl->tpl_vars['alumnos']->value)){?>
    	<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['alumnos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
    		<tr>
    			<td><?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['a']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['nombre'];?>
 </td>
                <td><input type="checkbox" value="presente" name="<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['datos']->value[$_smarty_tpl->tpl_vars['a']->value['id_alumno']])){?>checked<?php }?> > Presente</label></td>
            </tr>
		<?php } ?>
	<?php }else{ ?>
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No hay alumnos en este grupo</h3></td>
        </tr>
	<?php }?>
    	<tr>
        	<td colspan="3" style="text-align:center;">
            	<?php if (isset($_smarty_tpl->tpl_vars['alumnos']->value)&&count($_smarty_tpl->tpl_vars['alumnos']->value)){?>
            	<button type="submit" class="btn btn-primary">Enviar</button>
                <?php }?>
            </td>
        </tr>
    </form>

</table><?php }} ?>