<?php /* Smarty version Smarty-3.1.8, created on 2017-06-06 18:11:35
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301365936d4373c7684-57974116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8dadf77a7554f61fbbbdb7b6e680069472bcd4a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\index\\index.tpl',
      1 => 1496428959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301365936d4373c7684-57974116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_user' => 0,
    '_layoutParams' => 0,
    'grupos' => 0,
    'g' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5936d4374582d5_84093387',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936d4374582d5_84093387')) {function content_5936d4374582d5_84093387($_smarty_tpl) {?><div class="panel panel-primary">
	<div class="panel-heading">
		<b class="panel-title">¡Hola !<?php echo $_smarty_tpl->tpl_vars['current_user']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['current_user']->value['nombre'];?>
<span class="hidden-xs">, bienvenido al panel.</span></b>
	</div>
	<div class="panel-body">
		<form role="search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/index" >
			<input type="hidden" value="1" name="buscar" />
			<div class="input-group">
				<div class="input-group-btn search-panel">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<span id="search_concept">Todas las sedes</span> <span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#todos">Todas las sedes</a></li>
						<li><a href="#La Cumbre">La Cumbre</a></li>
						<li><a href="#Los Hornos">Los Hornos</a></li>
						<li><a href="#El Retiro">El Retiro</a></li>
					</ul>
				</div>
				<input type="hidden" name="sede" value="todos" id="sede">
				<input type="text" class="form-control" placeholder="Nombre, Apellido o DNI de un alumno" name="casillero" id="casillero">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				</span>
			</div>
		</form>
	</div>
</div>



<h3>Mis Grupos:</h3>

<div class="row" style="margin-top:30px;">
<?php if (isset($_smarty_tpl->tpl_vars['grupos']->value)&&count($_smarty_tpl->tpl_vars['grupos']->value)){?>
<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grupos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
	<div class="col-xs-12 col-sm-6 col-md-4">
    	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/grupos/show/<?php echo $_smarty_tpl->tpl_vars['g']->value['id_grupo'];?>
">
    	<div class="panel panel-success">
  			<div class="panel-heading"><h3><?php echo $_smarty_tpl->tpl_vars['g']->value['sede'];?>
</h3></div>
  			<div class="panel-body">
    			<ul class="list-group">
  					<li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['g']->value['tipo'];?>
</li>
  					<li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['g']->value['dias'];?>
</li>
  					<li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['g']->value['horario'];?>
</li>
				</ul>
  			</div>
		</div>
        </a>
    </div>
<?php } ?>
<?php }else{ ?>
	<div class="col-xs-12 col-sm-6 col-md-4" style="text-align:center;">
		<h3>Aún no se ha creado un grupo. O no perteneces a ninguno.</h3>
    </div>
<?php }?>
</div>


<?php }} ?>