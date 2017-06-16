<?php /* Smarty version Smarty-3.1.8, created on 2017-06-16 21:31:16
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\alumnos\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211445936d44c654130-31696712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8e2a0accc2d718e5bbaa525e8270c3e9ab81332' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\alumnos\\index.tpl',
      1 => 1497641439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211445936d44c654130-31696712',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5936d44c713684_56960651',
  'variables' => 
  array (
    '_layoutParams' => 0,
    'alumnos' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936d44c713684_56960651')) {function content_5936d44c713684_56960651($_smarty_tpl) {?><h3>Listado de Alumnos</h3><br>

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
      <form role="search" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/index" class="navbar-form navbar-left">
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
  <tr id="fila<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
">
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
      
    <a href="#" idAlumno="<?php echo $_smarty_tpl->tpl_vars['a']->value['id_alumno'];?>
" class="btn btn-danger btn-xs suspender">
      <i class="fa fa-minus-circle fa-lg" aria-hidden="true"></i>
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