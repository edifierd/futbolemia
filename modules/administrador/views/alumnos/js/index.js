
$(document).ready(function(){
  $('.search-panel .dropdown-menu').find('a').click(function(e) {
    e.preventDefault();
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();
    $('.search-panel span#search_concept').text(concept);
    $('.input-group #sede').val(param);
  });
});

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
        setTimeout(function(){
          var url = _root_+"administrador/alumnos";
          $(location).attr('href',url);
        }, 2000);
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
      showConfirmButton: false,
    }).then();
  })
});
