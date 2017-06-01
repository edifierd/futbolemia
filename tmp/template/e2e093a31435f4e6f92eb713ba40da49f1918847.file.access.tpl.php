<?php /* Smarty version Smarty-3.1.8, created on 2017-06-01 18:49:28
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\error\access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20187593045982c36b1-44547835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e093a31435f4e6f92eb713ba40da49f1918847' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\error\\access.tpl',
      1 => 1496318228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20187593045982c36b1-44547835',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_593045982f8bc0_76833373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593045982f8bc0_76833373')) {function content_593045982f8bc0_76833373($_smarty_tpl) {?><h1 style="color:#F00;"><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h1>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/usuarios/login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>