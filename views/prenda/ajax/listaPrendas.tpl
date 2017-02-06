


<div id="lista_registros">
{if isset($prendas) && count($prendas)}

<div class="row" style="margin-bottom:25px;">
     {foreach item=datos from=$prendas}
        <div class="col-xs-12 col-sm-6 col-md-3" style=" padding:15px; ">
        	<a href="{$_layoutParams.root}prenda/show/{$datos.id}" onmouseover="transparenciaImagen({$datos.id},0.5)" onmouseout="transparenciaImagen({$datos.id},1)">
        	<div class="row">
            	<div class="col-md-12">
                	<img src="{$_layoutParams.root}public/img/prendas/thumb/thumb_{$datos.foto_frente}.jpg" class="img-responsive" id="{$datos.id}" 
                    	 style="margin-right:auto; margin-left:auto; width:240px; height:320px;"/>
                </div>
                <div class="col-md-12" style="text-align:center;">
                	<b>{$datos.nombre}</b>
                </div>
                <div class="col-md-12" style="text-align:center;">
                	${$datos.precio}
                </div>
        	</div>
            </a>
        </div>
    {/foreach}
</div>
{else}

<p><strong>No hay prendas publicadas!</strong></p>

{/if}

{$paginacion|default:""}
</div>