
// Iniciando biblioteca
var resize = new window.resize();
resize.init();

// Declarando variáveis
var imagenes;
var imagen_actual;

/*
// Quando carregado a página
$(function ($) {

// Quando selecionado as imagenes
$('#imagen').on('change', function () {
		enviar();
    });
});
*/



/* 

Envia los archivos seleccionados 

Parametros de entrada: 
	- inputName (nombre del campo de formulario)
	- data (array con informacion extra a utilizar)

*/


function enviar(inputName, controlador, data) {
	// Verificando se o navegador tem suporte aos recursos para redimensionamento
	if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
		alert('Su navegador no soporta el uso de archivos Blob');
		return;
	}

	// Alocando imagenes selecionadas
	imagenes = $('#'+inputName)[0].files;

	// Se selecionado pelo menos uma imagen
	if (imagenes.length > 0) {   

		// Definindo progresso de carregamento
		//$('#progresso').attr('aria-valuenow', 0).css('width', '0%');

		// Escondendo campo de imagen
		//$('#'+inputName).hide();
				
		// Iniciando redimensionamento
		imagen_actual = 0;
		return redimensionarImagen(data, controlador);
	}
}
		
function redimensionarImagen(data, controlador) {

	//var jsonStringArray = JSON.stringify(data); //No lo estoy usando era para enviar el array lo mande dirctamente
			
	//Verifico que sea un archivo valido
    if (!(typeof imagenes[imagen_actual] !== 'object') || !(imagenes[imagen_actual] == null)){
		
		fotoNombre = new Date().getTime().toString(16);
		
		// Redimensionando
    	resize.photo(imagenes[imagen_actual], 1000, 'dataURL', function (imagen) { //Antes decia 800 en rojo
    		// Enviando imagen al servidor
    		$.post(_root_ + 'administrador/' + controlador + '/uploader', {imagen: imagen, 
																		   nombre: fotoNombre, 
																		   controlador: controlador,
																		   datos: data }, function() { 
					//$('#mensaje').html('Imagen(s) enviada(s) com sucesso'); 
					} 
			);
			
			$('#mensaje').html('Imagen enviada con exito.'); 
			
			
    	});
		
		return fotoNombre;
	}
	return '';
}
		
/*		
// Redimencionado multiple recursivo 
function redimencionadoMultiple() {
	// Se redimensionado todas as imagenes
    if (imagen_actual > imagenes.length) {
    	// Definindo progresso de finalizado
        $('#progresso').html('Imagen(s) enviada(s) com sucesso');

		// Limpando imagenes
		limpar();

		// Exibindo campo de imagen
		$('#imagen').show();

		// Finalizando
		return;
	}

	// Se não for um arquivo válido
	if ((typeof imagenes[imagen_actual] !== 'object') || (imagenes[imagen_actual] == null)) {
		// Passa para a próxima imagen
		imagen_actual++;
		redimensionar();
		return;
	}

	// Redimensionando
	resize.photo(imagenes[imagen_actual], 800, 'dataURL', function (imagen) {

		// Salvando imagen no servidor
		$.post(_root_ + 'administrador/upload/uploader', {imagen: imagen}, function() {

			// Definindo porcentagem
			var porcentagem = (imagen_actual + 1) / imagenes.length * 100;

			// Atualizando barra de progresso
			$('#progresso').text(Math.round(porcentagem) + '%').attr('aria-valuenow', porcentagem).css('width', porcentagem + '%');

			// Aplica delay de 1 segundo
			// Apenas para evitar sobrecarga de requisições
			// e ficar visualmente melhor o progresso
			setTimeout(function () {
				// Passa para a próxima imagen
				imagen_actual++;
				redimensionar();
			}, 1000);
		});
	});
}

<div class="progress">
	<div id="progresso" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
</div>

<div class="col-xs-12">
	<div id="mensaje" style="color:#0F3; font-size:18px;"></div>
</div>


//Limpa os arquivos selecionados 
function limpar() {
	var input = $("#imagen");
	input.replaceWith(input.val('').clone(true));
}
*/