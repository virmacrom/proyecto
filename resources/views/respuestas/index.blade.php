@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Respuestas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'respuestas.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear respuesta', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'respuestas.destroyAll', 'method' => 'delete', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Borrar todas', ['class'=> 'btn btn-danger','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Respuesta</th>
                                <th>Pregunta</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($respuestas as $respuesta)
                            <tr data-id="{{$respuesta->id}}">
                                <td>{{ $respuesta->text }}</td>
                                <td>{{ $respuesta->pregunta->text }}</td>
                                <td>
                                    {!! Form::open(['route' => ['respuestas.edit',$respuesta->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

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
    {!! Form::open(['route' => ['respuestas.destroy',':RESPUESTA_ID'], 'method' => 'delete','id'=>'form-delete']) !!}
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
                var url=form.attr('action').replace(':RESPUESTA_ID',id);
                var data =form.serialize();
//Para que se borre la fila sin tener que darle a cargar otra vez
                row.fadeOut();
                //ajax
                $.post(url,data,function(result){
                    alert(result.message);
                }).fail(function () {
                    alert('La respuesta no fue eliminada');
                    row.show();
                });
            });

        });
    </script>

@endsection