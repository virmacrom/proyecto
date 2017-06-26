@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Especialidades</div>

                    <div class="panel-body">
                        @include('flash::message')
                         {!! Form::open(['route' => [ 'especialidades.create',':ESPECIALIDAD_ID'], 'method' => 'get','id'=>'form-primary']) !!}
                        {!!   Form::submit('Crear especialidad', ['class'=> 'btn btn-warning'])!!}
                        {!! Form::close() !!}


                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($especialidades as $especialidad)
                            <tr data-id="{{$especialidad->id}}">
                                <td>{{ $especialidad->name }}</td>
                                <td>
                                    <a href=""class="btn-warning">Editar</a>

                                </td>
                                <td>
                                    <a href=""class="btn-delete">Eliminar</a>


                                </td>


                            </tr>
                            @endforeach
                        </table>
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