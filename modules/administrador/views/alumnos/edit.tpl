<h2>Modificar datos alumno</h2>

<div class="well span5">
	<div class="row">
    <div class="col-md-6">
    <form name="form1" method="post" action="" class="form">
        <input type="hidden" value="1" name="guardar" />
        
        <p>
            <label>Nombre Completo: </label>
            <label>{$apellido} {$nombre} </label>
        </p>
        
        <p>
            <label>DNI: </label>
            <input type="text" name="dni" value="{$datos.dni|default:""}" />
        </p>
        
        <p>
            <label>Grupo Actual: </label>
            <select id="grupo" name="grupo" >
            	<option value="{$grupo.id_grupo}" >{$grupo.sede} - {$grupo.tipo} - {$grupo.dias} - {$grupo.horario}</option>
        		{foreach from=$grupos item=g}
					<option value="{$g.id_grupo}" >{$g.sede} - {$g.tipo} - {$g.dias} - {$g.horario}</option>
				{/foreach}
			</select>
        </p>

        <p>
            <label>Fecha de Nacimiento: </label>
            <input type="date" name="nacimiento" value="{$datos.nacimiento|default:""}" />
        </p>
        
        <p>
            <label>Colegio: </label>
            <input type="text" name="colegio" value="{$datos.colegio|default:""}" />
        </p>

        <p>
            <label>Obra Social: </label>
            <input type="text" name="obra_social" value="{$datos.obra_social|default:""}" />
        </p> 
        
        <p>
            <label>Numero de Afiliado: </label>
            <input type="text" name="num_afiliado" value="{$datos.num_afiliado|default:""}" />
        </p>   
        
     </div>
     <div class="col-md-6">
     	<div class="row">
        	<div class="col-md-12">
            	<label>Certificado de aptitud física: (SOLO IMAGENES .jpg .png)</label>
                <input id="imagen1" type="file" accept="image/*" 
                onchange="mostrarFoto(enviar('imagen1','alumnos',new Array({$id_alumno},'borrar')),1,'alumnos'); "/>
                <input type="hidden" value="{$datos.certificado_fisico}" name="certificado_fisico" />
            </div>
            <div class="col-md-12">
            	{if $datos.certificado_fisico != ''}
            		<img src="{$_layoutParams.root}public/img/alumnos/{$datos.certificado_fisico}" id="imagen1Foto" style="width:50%; height:auto; margin-top:15px;"/>
                {else}
                	<img src="{$_layoutParams.root}public/img/sin_imagen.png" id="imagen1Foto" style="width:50%; height:auto; margin-top:15px;"/>
                {/if}
                <img src="{$_layoutParams.root}public/img/carga.gif" id="imagen1Carga" style="width:50%; height:auto; margin-top:15px;"/>
            </div>
         </div>
     </div>
     
     <div class="col-md-12">
        
        <p>
            <label>Observacion Medica: </label>
            <textarea name="observacion_medica" style="width:100%; min-height:150px;"/>{$datos.observacion_medica|default:""}</textarea>
        </p> 

        <p>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a href="javascript:history.back()" class="btn btn-danger" style="margin-left:25px;">Cancelar</a>
        </p>
    </p>
    </form>
    </div>
</div>