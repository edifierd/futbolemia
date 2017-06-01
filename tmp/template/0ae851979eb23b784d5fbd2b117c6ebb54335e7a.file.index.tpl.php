<?php /* Smarty version Smarty-3.1.8, created on 2017-06-01 01:20:45
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\grupos\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5755591b489db538d6-52629217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ae851979eb23b784d5fbd2b117c6ebb54335e7a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\grupos\\index.tpl',
      1 => 1496272621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5755591b489db538d6-52629217',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_591b489dc8a484_37394361',
  'variables' => 
  array (
    '_acl' => 0,
    '_layoutParams' => 0,
    'grupos' => 0,
    'g' => 0,
    'controller' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591b489dc8a484_37394361')) {function content_591b489dc8a484_37394361($_smarty_tpl) {?>
<div class="btn-group" style="margin-bottom:20px;">
	<a href="javascript:history.back()" class="btn btn-default"> <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
    <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('nuevo_grupo')){?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/grupos/nuevo" class="btn btn-default"> Nuevo Grupo</a>
    <?php }?>
</div>


<h3>Listado de Grupos Futbolemia</h3><br>


<table class="table">
	<tr>
		<th>Id</th>
    	<th>Sede</th>
    	<th>Tipo Grupo</th>
    	<th>Dias</th>
    	<th>Horario</th>
        <th colspan="2" style="text-align:center;">Acciones</th>
    </tr>
	
    <?php if (isset($_smarty_tpl->tpl_vars['grupos']->value)&&count($_smarty_tpl->tpl_vars['grupos']->value)){?>
    	<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grupos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
    	<tr>
    		<td><?php echo $_smarty_tpl->tpl_vars['g']->value['id_grupo'];?>
</td>
        	<td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/grupos/show/<?php echo $_smarty_tpl->tpl_vars['g']->value['id_grupo'];?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value['sede'];?>
</a></td>
        	<td><?php echo $_smarty_tpl->tpl_vars['controller']->value->getTipoGrupo($_smarty_tpl->tpl_vars['g']->value['tipo']);?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['g']->value['dias'];?>
</td>
       		<td><?php echo $_smarty_tpl->tpl_vars['g']->value['horario'];?>
</td>
            <td style="text-align:center"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/grupos/show/<?php echo $_smarty_tpl->tpl_vars['g']->value['id_grupo'];?>
" class="btn btn-primary btn-xs">Ver Grupo</a></td>
        	<td style="text-align:center">
            	<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('super_usuario')){?>
            		<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/grupos/delete_grupo/<?php echo $_smarty_tpl->tpl_vars['g']->value['id_grupo'];?>
" class="btn btn-danger btn-xs">Eliminar</a>
                <?php }?>
            </td>
    	</tr>
		<?php } ?>
    <?php }else{ ?>
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No se encontraron grupos</h3></td>
        </tr>
	<?php }?>

</table>


<?php }} ?>