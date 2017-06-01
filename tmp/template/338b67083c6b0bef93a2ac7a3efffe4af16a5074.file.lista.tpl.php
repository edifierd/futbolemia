<?php /* Smarty version Smarty-3.1.8, created on 2017-06-01 19:04:29
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\reportes\lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25194593045981be1e8-58349691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '338b67083c6b0bef93a2ac7a3efffe4af16a5074' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\reportes\\lista.tpl',
      1 => 1496336660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25194593045981be1e8-58349691',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_593045982305f7_79492633',
  'variables' => 
  array (
    'sede' => 0,
    'anioA' => 0,
    'reportes' => 0,
    '_layoutParams' => 0,
    'listaAnios' => 0,
    'anio' => 0,
    'i' => 0,
    'nombreMes' => 0,
    'finanzas' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593045982305f7_79492633')) {function content_593045982305f7_79492633($_smarty_tpl) {?><h3>Reportes Futbolemia para <?php echo $_smarty_tpl->tpl_vars['sede']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['anioA']->value;?>
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

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php if ($_smarty_tpl->tpl_vars['reportes']->value!=false){?>
      <ul class="nav navbar-nav">
      	<li style="text-align:center;">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/reportes/generar/<?php echo $_smarty_tpl->tpl_vars['anioA']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sede']->value;?>
" style="color:#F00;"> Actualizar Reportes </a>
        </li>
      </ul>
      <?php }?>
      <form class="navbar-form navbar-left" role="search" method="post" action="" >
        	<input type="hidden" value="1" name="buscar" />
  			<div class="form-group">
            	<label style="margin-right:15px; width:40px;">Año: </label>
            	<select id="anio" name="anio" style="height:32px; margin-right:15px; width:120px;">
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
            </div>

            <div class="form-group">
            	<label style="margin-right:15px; width:40px;">Sede: </label>
            	<select id="sede" name="sede" style="height:32px; width:120px;">
                	<option value="Los_Hornos" >Los Hornos</option>
            		<option value="La_Cumbre" >La Cumbre</option>
                    <option value="El_Retiro" >El Retiro</option>
				</select>
            </div>
            <button type="submit" class="btn btn-default" >Buscar</button>
	  </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<?php if ($_smarty_tpl->tpl_vars['reportes']->value==false){?>
<div class="alert alert-warning" role="alert" style="text-align:center; margin-top:100px;">
	<h3>Debe seleccionar para buscar un reporte.</h3>
</div>
<?php }else{ ?>
<div class="row">
	<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 12+1 - (3) : 3-(12)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 3, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
	<div class="col-xs-12 col-sm-6 col-md-4">
    	<div class="panel panel-primary">
  			<div class="panel-heading"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/reportes/listaSede/<?php echo $_smarty_tpl->tpl_vars['sede']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['anioA']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="color:#FFF;"><h4><?php echo $_smarty_tpl->tpl_vars['nombreMes']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</h4></a></div>
  			<div class="panel-body">
    			<table class="table table-striped">
                    <tr><th>CHICOS</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['chicos'];?>
</td></tr>
                    <tr><th>DIFERENCIA MES</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['dif_mes'];?>
</td></tr>
                    <tr><th>DIFERENCIA ANUAL</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['dif_anual'];?>
</td></tr>
                    <tr><th>NUEVOS</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['nuevos'];?>
</td></tr>
                    <tr><th>SIGUEN</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['siguen'];?>
</td></tr>
                    <tr><th>DEJARON</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['dejaron'];?>
</td></tr>
                    <tr><th>VOLVIERON</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['volvieron'];?>
</td></tr>
                    <tr><th>PAGARON</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['pagaron'];?>
</td></tr>
                    <tr><th>DEBEN</th><td style="text-align:center;"><?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['deben'];?>
</td></tr>
                    <form name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/reportes/guardarFinanzas/<?php echo $_smarty_tpl->tpl_vars['anioA']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['sede']->value;?>
" class="form">
        				<input type="hidden" value="1" name="guardar" />
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['finanzas']->value[$_smarty_tpl->tpl_vars['i']->value]['id_finanza'];?>
" name="id_finanza" />
                        <tr><th>RECAUDADO</th>
                        	<td style="text-align:center;">$<?php echo $_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['recaudado'];?>
</td>
                        </tr>
                        <tr><th colspan="2">GASTO COMPLEJO</th></tr>
                        <tr>
                        	<td colspan="2" style="text-align:center;">
                            <input type="number" name="complejo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['finanzas']->value[$_smarty_tpl->tpl_vars['i']->value]['complejo'])===null||$tmp==='' ? "0" : $tmp);?>
" style="text-align:right; width:100%;" /></td>
                        </tr>
                        <tr><th colspan="2">GASTO PROFESORES</th></tr>
                        <tr>
                        	<td colspan="2" style="text-align:center;">
                            <input type="number" name="profesores" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['finanzas']->value[$_smarty_tpl->tpl_vars['i']->value]['profesores'])===null||$tmp==='' ? "0" : $tmp);?>
" style="text-align:right; width:100%;" /></td>
                        </tr>
                        <tr><th colspan="2">CAMISETAS</th></tr>
                        <tr>
                        	<td colspan="2" style="text-align:center;">
                            <input type="number" name="camisetas" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['finanzas']->value[$_smarty_tpl->tpl_vars['i']->value]['camisetas'])===null||$tmp==='' ? "0" : $tmp);?>
" style="text-align:right; width:100%;" /></td>
                        </tr>
                        <tr style="padding:0;">
                          <th style="margin: 0 3px;">GANANCIAS</th>
                        	<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['reportes']->value[$_smarty_tpl->tpl_vars['i']->value]['recaudado']-$_smarty_tpl->tpl_vars['finanzas']->value[$_smarty_tpl->tpl_vars['i']->value]['complejo']-$_smarty_tpl->tpl_vars['finanzas']->value[$_smarty_tpl->tpl_vars['i']->value]['profesores'], null, 0);?>
                          <?php if ($_smarty_tpl->tpl_vars['total']->value>0){?>
                      		  <td style="text-align:center; color:#090;"><b>$<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</b></td>
                          <?php }else{ ?>
                          	<td style="text-align:center; color:#C00"><b>$<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</b></td>
                          <?php }?>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:center;">
                            	<button type="submit" class="btn btn-warning">Guardar</button>
                            </td>
                        </tr>
    				</form>
                </table>
  			</div>
		</div>
    </div>
    <?php }} ?>
</div>
<?php }?>
<?php }} ?>