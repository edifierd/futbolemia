<?php /* Smarty version Smarty-3.1.8, created on 2017-06-01 18:49:37
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4801593045a18e4777-89928244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8dadf77a7554f61fbbbdb7b6e680069472bcd4a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\index\\index.tpl',
      1 => 1496318228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4801593045a18e4777-89928244',
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
  'unifunc' => 'content_593045a1928786_00039729',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593045a1928786_00039729')) {function content_593045a1928786_00039729($_smarty_tpl) {?>

<h3>¡ Hola ! <?php echo $_smarty_tpl->tpl_vars['current_user']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['current_user']->value['nombre'];?>
. Bienvenido al panel de Administración</h3>



<div class="row" style=" background-color: #E5E5E5; text-align:center; margin-top: 25px; border-radius:15px;">
	<div class="col-md-12">
    	<h3><u>BUSCADOR DE ALUMNOS</u></h3>
    	<form class="navbar-form navbar-left" role="search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/index" >
        	<input type="hidden" value="1" name="buscar" />
  			<div class="form-group">
            	<span>Sede:</span> 
            	<select id="sede" name="sede" style="height:32px;">
                	<option value="todos" >Todos</option>
            		<option value="La Cumbre" >La Cumbre</option>
                    <option value="Los Hornos" >Los Hornos</option>
                    <option value="El Retiro" >El Retiro</option>
				</select>
                <span>Nombre:</span>
    			<input type="text" class="form-control" placeholder="Nombre o Apellido o DNI..." name="casillero" id="casillero">
  			</div>
  			<button type="submit" class="btn btn-default">Buscar</button>
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
</div><?php }} ?>