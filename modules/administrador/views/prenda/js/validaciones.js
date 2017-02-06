
	cant = 0;

	$("#btnvalidarfotos").click(verificarFotos);

	
	function verificarFotos(){
		if ( cant == 3 ){
			return true;
		}
		alert("Debes cargar todas las fotos");
		return false;
	}
	
	function mostrarFoto(fotoNombre,numFoto){
		if( fotoNombre != ''){
        	cant+=1;
			ruta = _root_+'public/img/prendas/upl_'+fotoNombre+'.jpg';
			setTimeout(function() {
				var ajax = $.ajax({
                  type: "GET",
                  url : ruta,
                  success : function(data){
                  	$('#imagen'+numFoto+'Foto').attr('src',ruta);
                  },
                  error: function(){
                    alert("No se ha podido cargar el archivo");
                  }
                });
       	   	}, 2500);
        }
	}
	
	
	