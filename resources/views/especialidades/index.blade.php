@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Especialidades
                        <p class="navbar-text navbar-right" style="margin-top: 1px">
                            <button type="button" id='crear' name='crear' class="btn btn-warning navbar-btn" style="margin-bottom: 1px";margin>Crear</button>
                        </p>

                    </div>

                    <div class="panel-body">
                        @include('flash::message')

                        <div id="list-especialidad"></div>
                </div>
            </div>
        </div>
    </div>
    </div>

    {!! Form::open(['route' => ['especialidades.edit',':USER_ID'], 'method' => 'get', 'id'=>'form-warning']) !!}
    {!! Form::close() !!}


    {!! Form::open(['route' => ['especialidades.destroy',':ESPECIALIDAD_ID'], 'method' => 'delete','id'=>'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        listespecialidad();
    });
    $("#crear").click(function () {
        document.location.href="{{route('especialidades.create')}}";
    })
    var listespecialidad=function () {
        $.ajax({
            type:'get',
            url:'{{url('listall')}}',
            success:function (data) {
                $('#list-especialidad').empty().html(data);
            }
        });
    }
    $(document).ready(function () {
       $('.btn-delete').click(function (e) {

           //evitar que el navegador envíe la accion del enlace
           e.preventDefault();
         //obtener la fila y guardarla en una variable
           var row=$(this).parents('tr');
           //Obtener el id de la fila
           var id=row.data('id');
           var form=$('#form-delete');
           var url=form.attr('action').replace(':ESPECIALIDAD_ID',id);
           var data =form.serialize();
//Para que se borre la fila sin tener que darle a cargar otra vez
           row.fadeOut();
           //ajax
           $.post(url,data,function(result){
              alert(result.message);
           }).fail(function () {
               alert('La especialidad no fue eliminada');
               row.show();
           });
       });
       $('.btn-warning').click(function (e) {
           document.location.href="{{route('especialidades.create')}}";

       })
    });

</script>

@endsection