@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'citas.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear cita', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($citas as $cita)


                                <tr data-id="{{$cita->id}}">
                                    <td>{{ $cita->fechacita }}</td>
                                    <td>{{ $cita->medico->fullname }}</td>
                                    <td>{{ $cita->paciente->fullname}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['citas.edit',$cita->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>


                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['citas.edit',':CITA_ID'], 'method' => 'get','id'=>'form-delete']) !!}
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
                var url=form.attr('action').replace(':CITA_ID',id);
                var data =form.serialize();
//Para que se borre la fila sin tener que darle a cargar otra vez
                row.fadeOut();
                //ajax
                $.post(url,data,function(result){
                    alert(result.message);
                }).fail(function () {
                    alert('La cita no fue eliminada');
                    row.show();
                });
            });

        });
    </script>

@endsection