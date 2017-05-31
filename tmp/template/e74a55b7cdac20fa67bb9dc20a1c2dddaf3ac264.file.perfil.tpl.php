<?php /* Smarty version Smarty-3.1.8, created on 2017-05-16 20:44:15
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\usuarios\perfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9055591b487fd15c35-70536234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e74a55b7cdac20fa67bb9dc20a1c2dddaf3ac264' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\usuarios\\perfil.tpl',
      1 => 1494592492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9055591b487fd15c35-70536234',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_591b487fd921e4_18576999',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591b487fd921e4_18576999')) {function content_591b487fd921e4_18576999($_smarty_tpl) {?>
<h3>Mi Perfil</h3>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
  			<div class="panel-heading">Datos Personales</div>
  			<div class="panel-body">
    			<ul class="list-group">
  					<li class="list-group-item">Apellido y Nombre: <b><?php echo $_smarty_tpl->tpl_vars['usuario']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombre'];?>
</b></li>
  					<li class="list-group-item">DNI: <?php echo $_smarty_tpl->tpl_vars['usuario']->value['dni'];?>
</li>
                    <form name="form1" method="post" action="" class="form">
        				<input type="hidden" value="1" name="guardar" />
  						<li class="list-group-item">
                            <p>
            				Email: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['usuario']->value['email'])===null||$tmp==='' ? '' : $tmp);?>

        					</p>
                         </li>
                         <li class="list-group-item">
                         	<label>CAMBIO DE CONTRASEÑA: </label>
                         	<p>
            				<label>Contraseña Actual: </label>
            				<input type="password" name="passActual" />
        					</p>
                            
                         	<p>
            				<label>Nueva Contraseña: </label>
            				<input type="password" name="passNueva" />
        					</p>

        					<p>
            				<label>Confirmar Contraseña: </label>
            				<input type="password" name="passConfirmar" />
       						</p>
                         </li>
                         <li class="list-group-item" style="text-align:center;">
                         	<button type="submit" class="btn btn-primary">Modificar Perfil</button>
                         </li>
                    </form>      
				</ul>
  			</div>
		</div>
	</div>
</div><?php }} ?>