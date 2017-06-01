<?php /* Smarty version Smarty-3.1.8, created on 2017-06-01 19:10:07
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\alumnos\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3212059304a6f07ed74-01639657%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8e2a0accc2d718e5bbaa525e8270c3e9ab81332' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\alumnos\\index.tpl',
      1 => 1496318228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3212059304a6f07ed74-01639657',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'alumnos' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_59304a6f0e1d89_68327469',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59304a6f0e1d89_68327469')) {function content_59304a6f0e1d89_68327469($_smarty_tpl) {?><h3>Listado de Alumnos</h3><br>

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
        	<li><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/nuevo" > Nuevo Alumno</a></li>
   	    </ul>
        <form class="navbar-form navbar-left" role="search" method="post" action="">
        	<input type="hidden" value="1" name="buscar" />
  			<div class="form-group">
            	<select id="sede" name="sede" style="height:32px;">
                	<option value="todos" >Todos</option>
            		<option value="La Cumbre" >La Cumbre</option>
                    <option value="Los Hornos" >Los Hornos</option>
                    <option value="El Retiro" >El Retiro</option>
				</select>
    			<input type="text" class="form-control" placeholder="Nombre o Apellido o DNI..." name="casillero" id="casillero">
  			</div>
  			<button type="submit" class="btn btn-default">Buscar</button>
		</form>
    </div>
  </div>
</nav>

<table class="table table-striped">
	<tr>
    	<th>Apellido Nombre </th>
    	<th>DNI</th>
        <th>Sede y Grupo inscripto</th>
        <th colspan="2" style="text-align:center;">Acciones</th>
    </tr>
	
    <?php if (isset($_smarty_tpl->tpl_vars['alumnos']->value)&&count($_smarty_tpl->tpl_vars['alumnos']->value)){?>
    	<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['alumnos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
        	<?php if ($_smarty_tpl->tpl_vars['a']->value['estado']=='a'){?>
    		<tr>
				<td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/show/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['nombre'];?>
</a></td>
        		<td><?php echo $_smarty_tpl->tpl_vars['a']->value['dni'];?>
</td>
        		<td><?php echo $_smarty_tpl->tpl_vars['a']->value['sede'];?>
 - <?php echo $_smarty_tpl->tpl_vars['a']->value['tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['a']->value['horario'];?>
 </td>
        		<td style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/show/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" class="btn btn-primary btn-xs" >Ver Perfil</a></td>
        		<td style="text-align:center;">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/delete/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" class="btn btn-danger btn-xs" onClick="javascript: return confirm('¿Estas seguro?');" >
                		Suspender
                    </a>
                </td>
            </tr>
            <?php }else{ ?>
			<tr style="text-decoration:line-through;">
				<td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/show/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['nombre'];?>
</a></td>
        		<td><?php echo $_smarty_tpl->tpl_vars['a']->value['dni'];?>
</td>
        		<td><?php echo $_smarty_tpl->tpl_vars['a']->value['sede'];?>
 - <?php echo $_smarty_tpl->tpl_vars['a']->value['tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['a']->value['horario'];?>
 </td>
        		<td colspan="2" style="text-align:center;">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/reactivar/<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" class="btn btn-success btn-xs">Reactivar</a>
                </td>
            </tr>
           	<?php }?>
		<?php } ?>
	<?php }else{ ?>
    	<tr>
        	<td colspan="6" style="text-align:center; padding-top: 22px;"><h3>No se encontraron alumnos</h3></td>
        </tr>
	<?php }?>

</table>
<?php }} ?>