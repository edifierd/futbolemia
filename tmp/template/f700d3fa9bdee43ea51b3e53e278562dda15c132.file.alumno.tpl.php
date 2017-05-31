<?php /* Smarty version Smarty-3.1.8, created on 2017-05-17 14:53:19
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\asistencias\alumno.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6767591c47bf70c5a9-68057944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f700d3fa9bdee43ea51b3e53e278562dda15c132' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\asistencias\\alumno.tpl',
      1 => 1494592492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6767591c47bf70c5a9-68057944',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listaAnios' => 0,
    'anio' => 0,
    'alumno' => 0,
    'anioActual' => 0,
    'asistencias' => 0,
    'dia' => 0,
    'cant' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_591c47bfec5a04_45722103',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591c47bfec5a04_45722103')) {function content_591c47bfec5a04_45722103($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\futbolemia\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><style>

.bloqueMes{
	margin: 10px;
	background-color: #EAEAEA;
	border: 1px solid #000;
	min-height: 170px;
}

.bloqueDiaP{
	padding: 4px;
	float:left;
	background-color: #0C0;
	margin:3px;
	border: solid 1px #000000;
}

.bloqueDiaA{
	padding: 4px;
	float:left;
	background-color: #F00;
	margin:3px;
	border: solid 1px #000000;
}

.descMes{
	margin-top: 5px;
	text-align:center;
}

</style>

<h2 style="margin-bottom:30px;">Calendario de asistencias</h2>

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
        	<li><a href="javascript:history.back()" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
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
  			</div>
  			<button type="submit" class="btn btn-default">Buscar</button>
		</form>
    </div>
  </div>
</nav>

<h3>Alumno <?php echo $_smarty_tpl->tpl_vars['alumno']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['nombre'];?>
 en el año <?php echo $_smarty_tpl->tpl_vars['anioActual']->value;?>
</h3>

<div class="row" style="margin-top:20px; margin-bottom:20px;">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>ENERO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[1]);?>
 asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
   		<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>FEBRERO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[2]);?>
 asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>MARZO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[3]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[3]);?>
 asistencias.
        	</div>
    	</div>
    </div>
</div>


<!------- SEGUNDO BLOQUE ------->

<div class="row" style="margin-top:20px; margin-bottom:20px;">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>ABRIL</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[4]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[4]);?>
 asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
   		<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>MAYO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[5]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[5]);?>
 asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>JUNIO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[6]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[6]);?>
 asistencias.
        	</div>
    	</div>
    </div>
</div>


<!------- TERCER BLOQUE ----->

<div class="row" style="margin-top:20px; margin-bottom:20px;">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>JULIO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[7]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[7]);?>
 asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
   		<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>AGOSTO</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[8]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[8]);?>
 asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>SEPTIEMBRE</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[9]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[9]);?>
 asistencias.
        	</div>
    	</div>
    </div>
</div>


<!--- CUARTO BLOQUE ---->

<div class="row" style="margin-top:20px; margin-bottom:20px;">
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>OCTUBRE</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[10]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[10]);?>
 asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
   		<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>NOVIEMBRE</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[11]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[11]);?>
 asistencias.
        	</div>
    	</div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
    	<div class="row bloqueMes">
        	<div class="col-xs-12" style="text-align:center;">
    			<h3>DICIEMBRE</h3>
            </div>
        	<div class="col-xs-12" style="min-height: 80px;">
            	<?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable(0, null, 0);?>
        		<?php  $_smarty_tpl->tpl_vars['dia'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dia']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['asistencias']->value[12]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dia']->key => $_smarty_tpl->tpl_vars['dia']->value){
$_smarty_tpl->tpl_vars['dia']->_loop = true;
?> 
        			<?php if ($_smarty_tpl->tpl_vars['dia']->value['valor']=='presente'){?> <div class="bloqueDiaP"> <?php $_smarty_tpl->tpl_vars['cant'] = new Smarty_variable($_smarty_tpl->tpl_vars['cant']->value+1, null, 0);?> <?php }else{ ?> <div class="bloqueDiaA"> <?php }?>
                		<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dia']->value['fecha'],"%d");?>
 <br>
                	</div>
        		<?php } ?>
        	</div> 
        	<div class="col-xs-12 descMes">
        		Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
 | <?php echo $_smarty_tpl->tpl_vars['cant']->value;?>
 de <?php echo count($_smarty_tpl->tpl_vars['asistencias']->value[12]);?>
 asistencias.
        	</div>
    	</div>
    </div>
</div><?php }} ?>