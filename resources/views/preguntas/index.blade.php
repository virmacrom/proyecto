@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Preguntas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'preguntas.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear pregunta', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'preguntas.destroyAll', 'method' => 'delete', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Borrar todas', ['class'=> 'btn btn-danger','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Texto</th>
                                <th>TipoEncuesta</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($preguntas as $pregunta)
                            <tr>
                                <td>{{ $pregunta->text }}</td>
                                <td>{{ $pregunta->tipoencuesta }}</td>
                                <td>
                                    {!! Form::open(['route' => ['preguntas.edit',$pregunta->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    {!! Form::open(['route' => ['preguntas.destroy',$pregunta->id], 'method' => 'delete']) !!}
                                    {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro de borrar la pregunta?"))event.preventDefault();'])!!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection