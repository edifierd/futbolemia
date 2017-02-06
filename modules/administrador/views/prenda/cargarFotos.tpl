
<h1>Cargar Fotos: </h1>

<form method="post" action="{$_layoutParams.root}administrador/prenda/finalizarPublicacion" role="form">
	<div class="form-group row">
    	<div class="col-xs-12"> Foto Frente </div>
    	<div class="col-xs-12" >
        	<input id="imagen1" type="file" accept="image/*" onchange="mostrarFoto(enviar('imagen1', new Array({$prenda.id}, 'foto_frente' )),'1'); "/>
            <img src="" id="imagen1Foto" height="100"/>
        </div>
        
        <div class="col-xs-12"> Foto Perfil </div>
    	<div class="col-xs-12">
        	<input id="imagen2" type="file" accept="image/*" onchange="mostrarFoto(enviar('imagen2', new Array({$prenda.id}, 'foto_perfil' )),'2'); " />
            <img src="" id="imagen2Foto" height="100"/>
        </div>
        
        <div class="col-xs-12"> Foto Atras </div>
    	<div class="col-xs-12">
        	<input id="imagen3" type="file" accept="image/*" onchange="mostrarFoto(enviar('imagen3', new Array({$prenda.id}, 'foto_atras' )),'3'); " />
            <img src="" id="imagen3Foto" height="100"/>
        </div>
	</div>
    <input type="hidden" name="enviado" value="1">
    <input type="hidden" name="idPrenda" value="{$prenda.id}">
    <br /><br />
    <button class="btn btn-primary" id="btnvalidarfotos"><i class="icon-ok icon-white"></i>Publicar</button>
</form>


