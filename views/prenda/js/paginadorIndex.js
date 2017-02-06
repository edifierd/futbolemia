$(document).on('ready', function(){
	
	$(document).on('click', '.pagina', function(){
        paginacion($(this).attr("pagina"));
    });
	
    var paginacion = function(pagina){
        var pagina = 'pagina=' + pagina;

        $.post(_root_ + 'prenda/paginador', pagina , function(data){
            $("#lista_registros").html('');
            $("#lista_registros").html(data);
        });
    }

});