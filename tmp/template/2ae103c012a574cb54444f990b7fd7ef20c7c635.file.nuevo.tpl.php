<?php /* Smarty version Smarty-3.1.8, created on 2017-06-01 01:00:09
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\grupos\nuevo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2003592f4af9c86b94-57178223%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ae103c012a574cb54444f990b7fd7ef20c7c635' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\grupos\\nuevo.tpl',
      1 => 1494592492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2003592f4af9c86b94-57178223',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_592f4af9e91e44_54017958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592f4af9e91e44_54017958')) {function content_592f4af9e91e44_54017958($_smarty_tpl) {?><h2>Dar de alta grupo</h2>

<div class="well span5">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        
        <p>
            <label>Sede: </label>
            <select id="sede" name="sede" >
            	<option value="null" >Seleccione...</option>
        		<option value="La Cumbre" >La Cumbre</option>
                <option value="Los Hornos" >Los Hornos</option>
                <option value="El Retiro" >El Retiro</option>
			</select>
        </p>

        <p>
            <label>Tipo: </label>
            <select id="tipo" name="tipo" >
            	<option value="null" >Seleccione...</option>
        		<option value="Jardin" >Jardin</option>
                <option value="1y2" >1° y 2° Grado</option>
                <option value="3y4" >3° y 4° Grado</option>
				<option value="5y6" >5° y 6° Grado</option>
			</select>
        </p>

        <p>
            <label>Dias: </label>
            <select id="dias[]" name="dias[]" class="selectpicker" title="Seleccione multiples dias..." multiple>
        		<option value="Lu" >Lunes</option>
                <option value="Ma" >Martes</option>
                <option value="Mi" >Miercoles</option>
                <option value="Ju" >Jueves</option>
                <option value="Vi" >Viernes</option>
                <option value="Sa" >Sabados</option>
			</select>
        </p>

        <p>
            <label>Horario: </label>
            <input type="text" name="horario" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['horario'])===null||$tmp==='' ? "de 17:30 a 19:00" : $tmp);?>
" />
        </p>

        <p>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="javascript:history.back()" class="btn btn-danger" style="margin-left:25px;">Cancelar</a>
        </p>
    </form>
</div><?php }} ?>