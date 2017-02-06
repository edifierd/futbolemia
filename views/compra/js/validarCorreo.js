// JavaScript Document

$(document).on("ready",inicio);

function inicio(){
	$("span.help-block").hide();
	$("#btnvalidar").click(validarCorreo);
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
		return false
	} else if (!(/\S+@\S+\.\S+/.test(valor))) {
		$("#"+campo).parent().attr("class","form-group has-warning has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Ingrese una direccion valida de correo").show();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-warning-sign form-control-feedback" id="icono'+campo+'"></span>');
		return false;
	} else {	
		$("#"+campo).parent().attr("class","form-group has-success has-feedback");
		$("#"+campo).parent().children("span.help-block").hide();
		$("#"+campo).parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" id="icono'+campo+'"></span>');
		return true;
	}
}