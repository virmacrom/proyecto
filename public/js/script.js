
$(document).ready(function() {

    $("#avisoEliminar").on('click', '.btn-ok', function(e){

        //evitar que el navegador envíe la accion del enlace
        e.preventDefault();
        //obtener la fila y guardarla en una variable
        var row = $(document).find("tr[data-id="+aviso+"]");
        //Obtener el id de la fila
        var id = aviso;
        var form = $('#form-delete');
        var url = form.attr('action').replace(':ESPECIALIDAD_ID', id);
        var data = form.serialize();

//Para que se borre la fila sin tener que darle a cargar otra vez
        row.fadeOut();
        //ajax
        $.post(url, data, function (result) {
            alert(result.message);
        }).fail(function () {
            alert('La especialidad no fue eliminada');
            row.show();
        });
    });


  $('#crear').on('click','.btn-save',function (e) {
      var name=$(".especialidad-name").val();

     var json=
         {
             "nombre": name
         };
 //     var json = especialidad;

      $.ajax({
          type:"POST",
          //data:"name="+name+"&_token={{ csrf_token()}}",
          url: "/especialidades",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data:json,
          success:function () {
            // debugger;
              // alert('Tus datos han sido insertdos correctamente');
              //$('#tabla-especialidad').load();//Se recarga la tabla

              $(".name").val("");//Limpiamos los input
          },
          error: function(){
              debugger;
          }
      });
      /*$.post(url, especialidad, function (result) {
          alert(result.message);
      }).fail(function () {
          alert('La especialidad no fue eliminada');
          row.show();
      });*/
      return false;//Se agrega el Return para que no recargue la pagina al enviar el formulario

  });

   /*
    //Se obtiene el valor del campo nombre
    var name=$(".name").val();
    //Se valida para que no sea nulo
    if(nombre=""){
        alert.error("Debe introducir un nombre");
        $("input").focus();
        return false;
    }
    //Se crea una variable que recibira el valor de todos los input que estan dentro del Form
    var obtener=$("#frmespecialidades").serialize();

    $.ajax({
        type:"POST",
        url: "especialidades.store",
        data:obtener,
        success:function () {
            alertify.success('Tus datos han sido insertdos correctamente');
            $('#tabla-especialidad').load("#tabla-especialidad");//Se recarga la tabla
            $(".name").val("");//Limpiamos los input
        }
    });
    return false;//Se agrega el Return para que no recargue la pagina al enviar el formulario
*/


    var  tabla_especialidad=$("#tabla-especialidad").dataTable();


});

var aviso = null;
function avisoEliminar(id){

    aviso = id;

}

