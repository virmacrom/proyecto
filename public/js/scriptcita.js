
$(document).ready(function() {

    $("#avisoEliminar").on('click', '.btn-ok', function(e){

        //evitar que el navegador envíe la accion del enlace
        e.preventDefault();
        //obtener la fila y guardarla en una variable
        var row = $(document).find("tr[data-id="+aviso+"]");
        //Obtener el id de la fila
        var id = aviso;
        var form = $('#form-delete');
        var url = form.attr('action').replace(':CITA_ID', id);
        var data = form.serialize();

//Para que se borre la fila sin tener que darle a cargar otra vez
        row.fadeOut();
        //ajax
        $.post(url, data, function (result) {
            alert(result.message);
        }).fail(function () {
            alert('La cita no fue eliminada');
            row.show();
        });
    });


    var  tabla_cita=$("#tabla-cita").dataTable();


});

var aviso = null;
function avisoEliminar(id){

    aviso = id;

}

