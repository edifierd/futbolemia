<?php /* Smarty version Smarty-3.1.8, created on 2017-05-17 14:53:20
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\error\access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17276591c47c04f24d3-44006382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e093a31435f4e6f92eb713ba40da49f1918847' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\error\\access.tpl',
      1 => 1494592492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17276591c47c04f24d3-44006382',
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
  'unifunc' => 'content_591c47c052a534_56080970',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591c47c052a534_56080970')) {function content_591c47c052a534_56080970($_smarty_tpl) {?><h1 style="color:#F00;"><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h1>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/usuarios/login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>