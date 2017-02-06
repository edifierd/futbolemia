// JavaScript Document

$(document).on("ready",inicio);

function inicio(){
	$("span.help-block").hide();
	$("#btnvalidar").click(validar);
}

function validar(){
	var camposTexto = new Array("name","surname");
	var numError = 0;
	for (i=0; i < camposTexto.length; i++){
		var campo = camposTexto[i];
		var valor = $.trim(document.getElementById(campo).value);
		document.getElementById(campo).value = valor;
		$("#icono"+campo).remove();
		if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
			$("#"+campo).parent().attr("class","form-group has-error has-feedback");
			$("#"+campo).parent().children("span.help-block").text("Debe ingresar su "+campo).show();
			$("#"+campo).parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" id="icono'+campo+'"></span>');
			numError += 1;
		} else if (!isNaN(valor)) {
			$("#"+campo).parent().attr("class","form-group has-warning has-feedback");
			$("#"+campo).parent().children("span.help-block").text("El campo ingresado no es valido").show();
			$("#"+campo).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" id="icono'+campo+'"></span>');
			numError += 1;
		} else {	
			$("#"+campo).parent().attr("class","form-group has-success has-feedback");
			$("#"+campo).parent().children("span.help-block").hide();
			$("#"+campo).parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" id="icono'+campo+'"></span>');
		}
	}
	
	numError += validarDocumento(false); 
	
	numError += validarCodArea(false); 
	
	numError += validarTelefono(false); 
			
	if(numError > 0){
		return false;
	}
	
	return true;
}

function validarDocumento(opcional){ //Recibe TRUE si el telefono es opcional
	var campo = "document_number"
	var valor = $.trim(document.getElementById(campo).value);
	document.getElementById(campo).value = valor;
	$("#icono"+campo).remove();
	if ((valor == null || valor.length == 0 || /^\s+$/.test(valor)) && (!opcional)){
		$("#"+campo).parent().attr("class","form-group has-error has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Debe ingresar su documento").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (isNaN(valor)) {
		$("#"+campo).parent().attr("class","form-group has-warning has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Ingrese solo números").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (valor.length > 8){
		$("#"+campo).parent().attr("class","form-group has-warning has-feedback");
		$("#"+campo).parent().children("span.help-block").text("No parece un numero valido").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (!opcional){	
		$("#"+campo).parent().attr("class","form-group has-success has-feedback");
		$("#"+campo).parent().children("span.help-block").hide();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" id="icono'+campo+'"></span>');
		return 0;
	} else {
		$("#"+campo).parent().attr("class","");
		$("#"+campo).parent().children("span.help-block").hide();
		return 0;
	}
}

function validarCodArea(opcional){ //Recibe TRUE si el telefono es opcional
	var campo = "area_phone_code"
	var valor = $.trim(document.getElementById(campo).value);
	document.getElementById(campo).value = valor;
	$("#icono"+campo).remove();
	if ((valor == null || valor.length == 0 || /^\s+$/.test(valor)) && (!opcional)){
		$("#"+campo).parent().attr("class","form-group has-error has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Debe ingresar su código de área").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (isNaN(valor)) {
		$("#"+campo).parent().attr("class","form-group has-warning has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Ingrese solo números").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (valor.length > 4){
		$("#"+campo).parent().attr("class","form-group has-warning has-feedback");
		$("#"+campo).parent().children("span.help-block").text("No parece un numero valido").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (!opcional){	
		$("#"+campo).parent().attr("class","form-group has-success has-feedback");
		$("#"+campo).parent().children("span.help-block").hide();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" id="icono'+campo+'"></span>');
		return 0;
	} else {
		$("#"+campo).parent().attr("class","");
		$("#"+campo).parent().children("span.help-block").hide();
		return 0;
	}
}

function validarTelefono(opcional){ //Recibe TRUE si el telefono es opcional
	var campo = "phone_number"
	var valor = $.trim(document.getElementById(campo).value);
	document.getElementById(campo).value = valor;
	$("#icono"+campo).remove();
	if ((valor == null || valor.length == 0 || /^\s+$/.test(valor)) && (!opcional)){
		$("#"+campo).parent().attr("class","form-group has-error has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Debe ingresar su teléfono").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (isNaN(valor)) {
		$("#"+campo).parent().attr("class","form-group has-warning has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Ingrese solo números").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (!opcional){	
		$("#"+campo).parent().attr("class","form-group has-success has-feedback");
		$("#"+campo).parent().children("span.help-block").hide();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" id="icono'+campo+'"></span>');
		return 0;
	} else {
		$("#"+campo).parent().attr("class","");
		$("#"+campo).parent().children("span.help-block").hide();
		return 0;
	}
}