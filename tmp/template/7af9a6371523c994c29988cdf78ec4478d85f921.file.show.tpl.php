<?php /* Smarty version Smarty-3.1.8, created on 2017-05-16 20:45:21
         compiled from "C:\xampp\htdocs\futbolemia\modules\administrador\views\alumnos\show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19697591b48c1097348-25864932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7af9a6371523c994c29988cdf78ec4478d85f921' => 
    array (
      0 => 'C:\\xampp\\htdocs\\futbolemia\\modules\\administrador\\views\\alumnos\\show.tpl',
      1 => 1494592492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19697591b48c1097348-25864932',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'alumno' => 0,
    '_layoutParams' => 0,
    '_acl' => 0,
    'responsables' => 0,
    'r' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_591b48c130e741_67078490',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_591b48c130e741_67078490')) {function content_591b48c130e741_67078490($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\futbolemia\\libs\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['alumno']->value['estado']=='e'){?>
	<h3>La ultima actualización de este alumno es del <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['alumno']->value['ult_actualizacion'],"%d-%m-%Y");?>
</h3>
<?php }?>

<nav class="navbar navbar-default" style="margin-bottom:15px;">
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
    	<ul class="nav navbar-nav" >
  			<li style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos" > <i class="fa fa-arrow-left fa-lg"></i> Atras</a></li>
  			<?php if ($_smarty_tpl->tpl_vars['alumno']->value['estado']=='a'){?>
  				<li style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/edit/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
">Modificar Perfil</a></li>
  				<li style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/responsables/listado/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
">Agregar Responsable</a></li>
  				<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('control_pagos')){?>
  					<li style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/cuotas/alumno/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
">Pagos</a></li>
  				<?php }?>
  				<li style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/asistencias/alumno/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
">Asistencias</a></li>
  				<li style="text-align:center;">
  				<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/delete/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
" style=" color:#C00;" onClick="javascript: return confirm('¿Estas seguro?');">Suspender</a>
  				</li>
  			<?php }?>
  			<?php if ($_smarty_tpl->tpl_vars['alumno']->value['estado']=='e'){?>
  				<li style="text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/alumnos/reactivar/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
"><h3>Reactivar Usuario</h3></a></li>
  			<?php }?>
		</ul>
    </div>
  </div>
</nav>

<div class="row">
	<div class="col-sm-7">
		<div class="panel panel-default">
  			<div class="panel-heading">Datos Personales</div>
  			<div class="panel-body">
    			<ul class="list-group">
  					<li class="list-group-item">Apellido y Nombre: <b><?php echo $_smarty_tpl->tpl_vars['alumno']->value['apellido'];?>
 <?php echo $_smarty_tpl->tpl_vars['alumno']->value['nombre'];?>
</b></li>
  					<li class="list-group-item">DNI: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['dni'];?>
</li>
  					<li class="list-group-item">Fecha de Nacimiento:  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['alumno']->value['nacimiento'],"%d-%m-%Y");?>
</li>
  					<li class="list-group-item">Colegio: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['colegio'];?>
 </li>
        			<li class="list-group-item">Obra Social: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['obra_social'];?>
 </li>
        			<li class="list-group-item">Número Afiliado: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['num_afiliado'];?>
 </li>
        			<li class="list-group-item" style="height:auto">Observacion Medica: <br /> <?php echo nl2br($_smarty_tpl->tpl_vars['alumno']->value['observacion_medica']);?>
</li>
				</ul>
  			</div>
		</div>
            
		<div class="panel panel-default">
  			<div class="panel-heading">
            	<form name="form1" method="post" action="" class="form">
                	NOTAS 
                    <?php if ($_smarty_tpl->tpl_vars['alumno']->value['estado']=='a'){?>
                	<button type="submit" class="btn btn-primary btn-xs" style="margin-left:10px;" >Guardar</button>
                    <?php }?>
            </div>
 		    <div class="panel-body">
        			<input type="hidden" value="1" name="guardar" />
               		<textarea name="notas" style="width:100%; min-height:150px;"/><?php echo $_smarty_tpl->tpl_vars['alumno']->value['notas'];?>
</textarea>
                </form>
                <!--<?php echo nl2br($_smarty_tpl->tpl_vars['alumno']->value['notas']);?>
 Esto sirve para mostrar los saltos de linea-->
            </div>
		</div>
        
        <div class="panel panel-default">
  			<div class="panel-heading">
            	<div class="row">
                	<div class="col-xs-10">Certificado de aptitud física</div>
                    <div class="col-xs-2">
                    	<?php if ($_smarty_tpl->tpl_vars['alumno']->value['certificado_fisico']!=''){?>
                		<form name="form1" method="post" action="" class="form">
                			<input type="hidden" value="1" name="eliminar" />
                    		<button type="submit" class="btn btn-danger btn-xs" style="" ><i class="fa fa-trash fa-2x"></i></button>
               			</form>
                        <?php }?>
                    </div>
                </div>
            </div>
 		    <div class="panel-body" style="text-align:center;">
        		<?php if ($_smarty_tpl->tpl_vars['alumno']->value['certificado_fisico']!=''){?>
                	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/alumnos/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['certificado_fisico'];?>
" target="_blank" title="Clic para Ampliar imagen">
                    	<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/alumnos/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['certificado_fisico'];?>
" style="width:100%; height:auto;"/>
                    </a>
                <?php }else{ ?>
                	<h3 style="color:#C00;">No se guardo ningun certificado.</h3>
                <?php }?>
            </div>
		</div>
	</div>
    
    <div class="col-sm-5">
    	<div class="panel panel-default">
  			<div class="panel-heading">
            	Sede
                <?php if ($_smarty_tpl->tpl_vars['alumno']->value['estado']=='a'){?>
                	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/grupos/show/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_grupo'];?>
" class="btn btn-primary btn-xs" style="margin-left:10px;">Ver Grupo</a>
                <?php }?>
            </div>
 			<div class="panel-body">
            	<?php if ($_smarty_tpl->tpl_vars['alumno']->value['estado']=='a'){?>
            	<ul class="list-group">
  					<li class="list-group-item">Nombre Sede: <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/grupos/show/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_grupo'];?>
"> <?php echo $_smarty_tpl->tpl_vars['alumno']->value['sede'];?>
</a></li>
  					<li class="list-group-item">Grupo: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['tipo'];?>
</li>
  					<li class="list-group-item">Dias: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['dias'];?>
</li>
  					<li class="list-group-item">Horario: <?php echo $_smarty_tpl->tpl_vars['alumno']->value['horario'];?>
</li>

				</ul>
                <?php }?>
  			</div>
		</div>
        
        <div class="panel panel-default">
  			<div class="panel-heading">
            	Responsables 
                <?php if ($_smarty_tpl->tpl_vars['alumno']->value['estado']=='a'){?>
                	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/responsables/listado/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
" class="btn btn-primary btn-xs" style="margin-left:10px;">Agregar NUEVO</a>
                <?php }?>
            </div>
 			<div class="panel-body">
            	<ul class="list-group">
                
            	<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['responsables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                	<div class="row" style="margin:2px; margin-bottom:5px; border: solid 1px #CCCCCC;">
                    	<div class="col-xs-10">
                    		<h4>
                            	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/responsables/show/<?php echo $_smarty_tpl->tpl_vars['r']->value['id_responsable'];?>
">
                                	<?php echo $_smarty_tpl->tpl_vars['r']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['r']->value['apellido'];?>
 - <?php echo $_smarty_tpl->tpl_vars['r']->value['parentesco'];?>

                                </a>
                            </h4>
                        	Teléfono Fijo: <?php echo $_smarty_tpl->tpl_vars['r']->value['tel_fijo'];?>
 <br />
                        	Teléfono Celular <?php echo $_smarty_tpl->tpl_vars['r']->value['tel_celular'];?>
 <br />
                        	Dirección: <?php echo $_smarty_tpl->tpl_vars['r']->value['direccion'];?>
 <br />
                        </div>
                        <div class="col-xs-2">
                        	<?php if ($_smarty_tpl->tpl_vars['alumno']->value['estado']=='a'){?>
                        	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/responsables/edit/<?php echo $_smarty_tpl->tpl_vars['r']->value['id_responsable'];?>
/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
" 
                               class="btn btn-primary btn-xs" style="margin-top: 10px;"><i class="fa fa-pencil fa-2x"></i></a>
                        	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
administrador/responsables/delete/<?php echo $_smarty_tpl->tpl_vars['r']->value['id_responsable'];?>
/<?php echo $_smarty_tpl->tpl_vars['alumno']->value['id_alumno'];?>
" onClick="javascript: return confirm('¿Estas seguro?');"
                               class="btn btn-danger btn-xs" style="margin-top: 10px;" ><i class="fa fa-trash fa-2x"></i></a>
                            <?php }?>
                       	</div>
                     </div>
				<?php } ?>
               	</ul>
  			</div>
		</div>
    </div>
</div>
<?php }} ?>