
$(document).on("ready",inicio);

function inicio(){
	$("span.help-block").hide();
	$("#btnvalidar").click(validar);
}

function validar(){
	var camposTexto = new Array("nombre","apellido","localidad");
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
	
	numError += validarTelefono(true);
	
	numError += validarCorreo();
		
	if(numError > 0){
		return false;
	}
	
	return true;
}

function validarTelefono(opcional){ //Recibe TRUE si el telefono es opcional
	var campo = "telefono"
	var valor = $.trim(document.getElementById(campo).value);
	document.getElementById(campo).value = valor;
	$("#icono"+campo).remove();
	if ((valor == null || valor.length == 0 || /^\s+$/.test(valor)) && (!opcional)){
		$("#"+campo).parent().attr("class","form-group has-error has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Debe ingresar su "+campo).show();
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

function validarCorreo(){
	var campo = "correo"
	var valor = $.trim(document.getElementById(campo).value);
	document.getElementById(campo).value = valor;
	$("#icono"+campo).remove();
	if (valor == null || valor.length == 0 || /^\s+$/.test(valor)){
		$("#"+campo).parent().attr("class","form-group has-error has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Debe ingresar su "+campo).show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else if (!(/\S+@\S+\.\S+/.test(valor))) {
		$("#"+campo).parent().attr("class","form-group has-warning has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Ingrese una direccion valida de correo").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" id="icono'+campo+'"></span>');
		return 1;
	} else {	
		$("#"+campo).parent().attr("class","form-group has-success has-feedback");
		$("#"+campo).parent().children("span.help-block").hide();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" id="icono'+campo+'"></span>');
		return 0;
	}
}


