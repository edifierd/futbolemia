$('.delete').click(function(event){
  event.stopPropagation();
  var id_grupo = $(this).attr('idGrupo');
  swal({
    title: '¿Estas seguro?',
    text: "¡Se eliminara permanentemente!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminarlo!'
  }).then(function () {
    $.ajax({
      url: _root_+"administrador/grupos/delete_grupo/"+id_grupo,
      type: 'GET',
      success: function(jqXHR) {
        //Exito
        var grupoTr = $("#fila"+id_grupo);
        grupoTr.remove();
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
