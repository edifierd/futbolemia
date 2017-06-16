<?php /* Smarty version Smarty-3.1.8, created on 2017-06-16 18:22:30
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\usuarios\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265405936d418c71d33-36828130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bdb1dbbbcd7f698eae150347eccb761bd0b4daf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\usuarios\\index.tpl',
      1 => 1497630147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265405936d418c71d33-36828130',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5936d418d0cd07_43141104',
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5936d418d0cd07_43141104')) {function content_5936d418d0cd07_43141104($_smarty_tpl) {?><div class="row" style="margin-top:20px">
  <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form name="form1" method="post" action="" role="form">
      <input type="hidden" value="1" name="enviar" />
      <fieldset>
        <p class="h2">Administración Futbolemia</p>
        <hr class="colorgraph">
        <div class="form-group">
          <input type="text" name="usuario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['usuario'])===null||$tmp==='' ? '' : $tmp);?>
" id="email" class="form-control input-lg" placeholder="Usuario" />
        </div>
        <div class="form-group">
          <input type="password" name="pass" id="password" class="form-control input-lg" placeholder="Contraseña"/>
        </div>
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Iniciar Sesión">
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>
<?php }} ?>