<?php /* Smarty version Smarty-3.1.8, created on 2017-06-01 14:08:23
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\usuarios\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27973591b4874939365-02909267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bdb1dbbbcd7f698eae150347eccb761bd0b4daf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\usuarios\\index.tpl',
      1 => 1496318229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27973591b4874939365-02909267',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_591b487499eaf0_32214654',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591b487499eaf0_32214654')) {function content_591b487499eaf0_32214654($_smarty_tpl) {?><style type="text/css">
    table.table td { vertical-align: middle; }
    table.table td input { margin: 0; }
</style>

<h2 class="hidden-xs">BIENVENIDO AL PANEL DE ADMINISTRACIÓN</h2>
<h4 class="visible-xs"><b>PANEL DE ADMINISTRACIÓN</b></h4>

<h3 class="hidden-xs">Iniciar Sesi&oacute;n</h3>
<h4 class="visible-xs">Iniciar Sesi&oacute;n</h4>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <div class="row" style="margin-top:20px;">
    	<div class="col-xs-4 col-sm-2 col-md-1">
        	Usuario
        </div>
        <div class="col-xs-8 col-sm-10 col-md-11">
        	<input type="text" name="usuario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </div>
        <div class="col-xs-4 col-sm-2 col-md-1" style="margin-top:15px;">
        	Contraseña:
        </div>
        <div class="col-xs-8 col-sm-10 col-md-11" style="margin-top:15px;">
        	<input type="password" name="pass" />
        </div>
		<div class="col-xs-6 col-sm-6 col-md-6">
    		<p><button type="submit" class="btn btn-primary" style="margin-left:25%; margin-top:25px;"><li class="glyphicon glyphicon-ok" style="margin-right:7px;"> </li> Entrar</button></p>
        </div>
</form><?php }} ?>