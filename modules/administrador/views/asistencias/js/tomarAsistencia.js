$('input[type=checkbox]').click(function(event){
  var fila = $(this).parent().parent();
  var id_alumno = fila.attr('id');
  accion(fila,id_alumno);
});


$('.fila').click(function(event){
  event.stopPropagation();
  var fila = $(this);
  var id_alumno = $(this).attr('id');
  accion(fila,id_alumno);
});

function accion(fila,id_alumno) {
  var check = $('input[name='+id_alumno+']');
  check.trigger('click');
  if(check.is(':checked')){
      fila.css("background-color","#C0C7FC" );
  } else {
      fila.css("background-color","" );
  }
}
