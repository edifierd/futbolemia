
	cant = 0;

	$("#btnvalidarfotos").click(verificarFotos);
	
	$('#imagen1Carga').hide();

	
	function verificarFotos(){
		if ( cant == 3 ){
			return true;
		}
		alert("Debes cargar todas las fotos");
		return false;
	}
	
	function mostrarFoto(fotoNombre,numFoto,controlador){
		if( fotoNombre != ''){
        	cant+=1;
			
			$('#imagen'+numFoto+'Foto').hide();
			$('#imagen'+numFoto+'Carga').show();
			
			ruta = _root_+'public/img/'+controlador+'/upl_'+fotoNombre+'.jpg';
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
				$('#imagen'+numFoto+'Foto').show();
				$('#imagen'+numFoto+'Carga').hide();
       	   	}, 10000);
        }
	}
	
	
	