$('.fila').click(function(event){
  var fila = $(this);
  var id_alumno = $(this).attr('id');
  var check = $('input[name='+id_alumno+']');
  check.trigger('click');
  if(check.is(':checked')){
      fila.css("background-color","#C0C7FC" );
  } else {
      fila.css("background-color","" );
  }
});
