$('.suspender').click(function(event){
  var id_alumno = $(this).attr('idAlumno');
  swal({
    title: '¿Suspender alumno?',
    text: "¡El alumno sera suspendido!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, suspenderlo!'
  }).then(function () {
    $.ajax({
      url: _root_+"administrador/alumnos/delete/"+id_alumno,
      type: 'GET',
      success: function(jqXHR) {
        //Exito
        location.reload();
      },
      error: function() {
        //Error
        swal(
          'ERROR!',
          'Se ha producido un error.',
          'warning'
        )
      }
    });
    swal({
      title: '¡Alumno suspendido!',
      text: "¡Aguarde sera redireccionado!",
      type: 'success',
    }).then();
  })
});



$('.delete').click(function(event){
  event.stopPropagation();
  var id_responsable = $(this).attr('idResponsable');
  var id_alumno = $(this).attr('idAlumno');
  swal({
    title: '¿Estas seguro?',
    text: "¡No se eliminara permanentemente!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminarlo!'
  }).then(function () {
    $.ajax({
      url: _root_+"administrador/responsables/delete/"+id_responsable+"/"+id_alumno,
      type: 'GET',
      success: function(jqXHR) {
        //Exito
        var infoResponsable = $("#"+id_responsable);
        infoResponsable.remove();
      },
      error: function() {
        //Error
        swal(
          'ERROR!',
          'Se ha producido un error.',
          'warning'
        )
      }
    });
    swal(
      '¡Eliminado!',
      'La operación se ha realizado correctamente.',
      'success'
    )
  })
});


$('.resp').click(function(event){
  var id_responsable = $(this).attr('id');
  var url = _root_+"administrador/responsables/show/"+id_responsable
  $(location).attr('href',url);
});

$('.resp').mouseover(function() {
  $(this).css( "background-color","#C0C7FC" );
});

$('.resp').mouseout(function() {
  $(this).css( "background-color","" );
});
