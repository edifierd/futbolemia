<?php /* Smarty version Smarty-3.1.8, created on 2017-06-01 00:58:56
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\alumnos\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11454592f4ab020d812-05076739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a20c4046d398b26c5667c1b3136098c5e9ec0776' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\alumnos\\edit.tpl',
      1 => 1494592492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11454592f4ab020d812-05076739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'apellido' => 0,
    'nombre' => 0,
    'datos' => 0,
    'grupo' => 0,
    'grupos' => 0,
    'g' => 0,
    'id_alumno' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_592f4ab0ae5700_09585732',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592f4ab0ae5700_09585732')) {function content_592f4ab0ae5700_09585732($_smarty_tpl) {?><h2>Modificar datos alumno</h2>

<div class="well span5">
	<div class="row">
    <div class="col-md-6">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        
        <p>
            <label>Nombre Completo: </label>
            <label><?php echo $_smarty_tpl->tpl_vars['apellido']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 </label>
        </p>
        
        <p>
            <label>DNI: </label>
            <input type="text" name="dni" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['dni'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>
        
        <p>
            <label>Grupo Actual: </label>
            <select id="grupo" name="grupo" >
            	<option value="<?php echo $_smarty_tpl->tpl_vars['grupo']->value['id_grupo'];?>
" ><?php echo $_smarty_tpl->tpl_vars['grupo']->value['sede'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['dias'];?>
 - <?php echo $_smarty_tpl->tpl_vars['grupo']->value['horario'];?>
</option>
        		<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grupos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['g']->value['id_grupo'];?>
" ><?php echo $_smarty_tpl->tpl_vars['g']->value['sede'];?>
 - <?php echo $_smarty_tpl->tpl_vars['g']->value['tipo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['g']->value['dias'];?>
 - <?php echo $_smarty_tpl->tpl_vars['g']->value['horario'];?>
</option>
				<?php } ?>
			</select>
        </p>

        <p>
            <label>Fecha de Nacimiento: </label>
            <input type="date" name="nacimiento" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['nacimiento'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>
        
        <p>
            <label>Colegio: </label>
            <input type="text" name="colegio" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['colegio'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>

        <p>
            <label>Obra Social: </label>
            <input type="text" name="obra_social" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['obra_social'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p> 
        
        <p>
            <label>Numero de Afiliado: </label>
            <input type="text" name="num_afiliado" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['num_afiliado'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </p>   
        
     </div>
     <div class="col-md-6">
     	<div class="row">
        	<div class="col-md-12">
            	<label>Certificado de aptitud física: (SOLO IMAGENES .jpg .png)</label>
                <input id="imagen1" type="file" accept="image/*" 
                onchange="mostrarFoto(enviar('imagen1','alumnos',new Array(<?php echo $_smarty_tpl->tpl_vars['id_alumno']->value;?>
,'borrar')),1,'alumnos'); "/>
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['datos']->value['certificado_fisico'];?>
" name="certificado_fisico" />
            </div>
            <div class="col-md-12">
            	<?php if ($_smarty_tpl->tpl_vars['datos']->value['certificado_fisico']!=''){?>
            		<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/alumnos/<?php echo $_smarty_tpl->tpl_vars['datos']->value['certificado_fisico'];?>
" id="imagen1Foto" style="width:50%; height:auto; margin-top:15px;"/>
                <?php }else{ ?>
                	<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/sin_imagen.png" id="imagen1Foto" style="width:50%; height:auto; margin-top:15px;"/>
                <?php }?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/carga.gif" id="imagen1Carga" style="width:50%; height:auto; margin-top:15px;"/>
            </div>
         </div>
     </div>
     
     <div class="col-md-12">
        
        <p>
            <label>Observacion Medica: </label>
            <textarea name="observacion_medica" style="width:100%; min-height:150px;"/><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['observacion_medica'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
        </p> 

        <p>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a href="javascript:history.back()" class="btn btn-danger" style="margin-left:25px;">Cancelar</a>
        </p>
    </p>
    </form>
    </div>
</div><?php }} ?>