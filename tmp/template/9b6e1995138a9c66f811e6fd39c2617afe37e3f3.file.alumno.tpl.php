<?php /* Smarty version Smarty-3.1.8, created on 2017-05-16 20:45:25
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\cuotas\alumno.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24790591b48c58eae97-93715746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b6e1995138a9c66f811e6fd39c2617afe37e3f3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\cuotas\\alumno.tpl',
      1 => 1494592492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24790591b48c58eae97-93715746',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'alumno' => 0,
    '_layoutParams' => 0,
    'listaAnios' => 0,
    'anio' => 0,
    'i' => 0,
    'nombreMes' => 0,
    'cantAsistencias' => 0,
    'asistencias' => 0,
    'cuotas' => 0,
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_591b48c59d86b7_10830649',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591b48c59d86b7_10830649')) {function content_591b48c59d86b7_10830649($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\futbolemia\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?>
<h3>Pagos de <?php echo $_smarty_tpl->tpl_vars['alumno']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['nombre'];?>
</h3><br>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    
  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav">
        	<li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/show/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
   	    </ul>
        <form class="navbar-form navbar-left" role="search" method="post" action="">
        	<input type="hidden" value="1" name="buscar" />
            <label style="margin-right:15px;">Seleccione un año: </label>
  			<div class="form-group">
            	<select id="anio" name="anio" style="height:32px; margin-right:15px;">
                <?php  $_smarty_tpl->tpl_vars['anio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['anio']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listaAnios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['anio']->key => $_smarty_tpl->tpl_vars['anio']->value){
$_smarty_tpl->tpl_vars['anio']->_loop = true;
?> 
        			<option value="<?php echo $_smarty_tpl->tpl_vars['anio']->value[1];?>
" ><?php echo $_smarty_tpl->tpl_vars['anio']->value[1];?>
</option>
        		<?php } ?>
				</select>
                <button type="submit" class="btn btn-default">Buscar</button>
  			</div>
  			
		</form>
    </div>
  </div>
</nav>

<table class="table" style="text-align:center;">
	<tr>
		<th style="text-align:center;">MES</th>
    	<th style="text-align:center;">CANTIDAD ASISTENCIAS </th>
    	<th style="text-align:center;">ESTADO</th>
    	<th style="text-align:center;">MONTO</th>
    	<th style="text-align:center;">ACCION</th>
    </tr>
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 12+1 - (3) : 3-(12)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 3, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
    	<tr>
    		<td><?php echo $_smarty_tpl->tpl_vars['nombreMes']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</td>
        	<td><?php echo $_smarty_tpl->tpl_vars['cantAsistencias']->value[$_smarty_tpl->tpl_vars['i']->value];?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[$_smarty_tpl->tpl_vars['i']->value]);?>
 Clases
        	<td>
        		<?php if ($_smarty_tpl->tpl_vars['cuotas']->value[$_smarty_tpl->tpl_vars['i']->value]=='impago'){?> 
           	 		<span style="color:#C00;">Adeuda</span>
            	<?php }else{ ?>
            		<span style="color:#090;">Pagado (<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cuotas']->value[$_smarty_tpl->tpl_vars['i']->value]['fecha_pago'],"%d-%m-%Y");?>
)</span>
            	<?php }?>
        	</td>
        	<td>
        	<form name="form1" method="post" action="" class="form">
        		<input type="hidden" value="1" name="pagar" />
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" name="mes" />
        		<?php if ($_smarty_tpl->tpl_vars['cuotas']->value[$_smarty_tpl->tpl_vars['i']->value]=='impago'){?> 
				<b>$</b> <input type="number" name="monto<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['monto'])===null||$tmp==='' ? '' : $tmp);?>
" />
                <?php }else{ ?>
                	<b>$ <?php echo $_smarty_tpl->tpl_vars['cuotas']->value[$_smarty_tpl->tpl_vars['i']->value]['monto'];?>
</b>
            	<?php }?>
        	</td><td>
        		<button type="submit" class="btn btn-primary" onClick="javascript: return confirm('¿Estas seguro?');">Pagar</button>
    		</form>
        	</td>
    	</tr>
    <?php }} ?>
</table><?php }} ?>