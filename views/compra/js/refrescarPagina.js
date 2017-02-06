// JavaScript Document


$(document).on("ready",inicio);

function inicio(){
	$("#btnvalidar").click(refrescar);
}

function refrescar(){
	window.location.href = _root_ +"compra/exito/"+_ventaId_;
}