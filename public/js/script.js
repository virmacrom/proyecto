$("#guardar").click(function () {
    var dato=$("#name").val();
    var route="http://proyecto.app/especialidades";
    var token = $("#token").val();

    $.ajax({
        url:route,
        headers : {'X-CSRF-TOKEN':token},
        type: 'POST',
        dataType: 'json',
        data: {name: dato},

        success:function () {
            $("#msj-success").fadeIn();
        }
    });
});