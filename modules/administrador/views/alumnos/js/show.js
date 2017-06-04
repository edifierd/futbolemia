

$('.resp').click(function(event){
  //alert($(this).attr('id'));
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
