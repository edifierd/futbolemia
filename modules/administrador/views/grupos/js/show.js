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
        var alumnoTr = $("#fila"+id_alumno);
        alumnoTr.remove();
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
