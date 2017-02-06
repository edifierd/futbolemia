// JavaScript Document


$(document).on("ready",inicio);

function inicio(){
	$("span.help-block").hide();
	$("#btnvalidar").click(validar);
}

function validar(){
	var camposTexto = new Array("cantidad");
	var numError = 0;
	
	numError = validarCantidad(false);
	
	if ($('#talle').val().trim() === '') {
		$('#talle').parent().attr("class","form-group has-error has-feedback");
		$('#talle').parent().children("span.help-block").text("Debe elegir un talle").show();	
		$('#talle').parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" id="iconoTalle"></span>');
		numError += 1;
		
	} else {
		$('#talle').parent().attr("class","form-group has-success has-feedback");
		$('#talle').parent().children("span.help-block").hide();
		$('#talle').parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" id="iconoTalle"></span>');
	}
		
	if(numError > 0){
		return false;
	}
	
	return true;
}

function validarCantidad(opcional){ //Recibe TRUE si es opcional
	var campo = "cantidad"
	var valor = $.trim(document.getElementById(campo).value);
	document.getElementById(campo).value = valor;
	$("#icono"+campo).remove();
	if ((valor == null || valor.length == 0 || /^\s+$/.test(valor)) && (!opcional)){
		$("#"+campo).parent().attr("class","form-group has-error has-feedback");
		$("#"+campo).parent().children("span.help-block").text("Debe ingresar una "+campo).show();
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
