@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Encuestas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'encuestas.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear encuesta', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'encuestas.destroyAll', 'method' => 'delete', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Borrar todas', ['class'=> 'btn btn-danger','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                {{--<th>Medico</th>--}}
                                {{--<th>Paciente</th>--}}
                                <th>TipoEncuesta</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($encuestas as $encuesta)


                                <tr>

                                    {{--<td>{{ $encuesta->paciente}}</td>--}}
                                    {{--<td>{{ $encuesta->medico->code}}</td>--}}
                                    <td>{{ $encuesta->tipoencuesta->name }}</td>


                                    <td>
                                        {!! Form::open(['route' => ['encuestas.edit',$encuesta->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['encuestas.destroy',$encuesta->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>

                                @foreach($tipoencuesta as $tipoencuesta)

                                    <tr>
                                        <td>{{ $tipoencuesta->pregunta->text }}</td>

                                        <td>
                                            {!! Form::open(['route' => ['tipoencuestas.edit',$tipoencuesta->id], 'method' => 'get']) !!}
                                            {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td>
                                            {!! Form::open(['route' => ['tipoencuestas.destroy',$tipoencuesta->id], 'method' => 'delete']) !!}
                                            {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                    @foreach($preguntas as $pregunta)
                                        <tr>
                                            <td>{{ $pregunta->respuesta->text }}</td>
                                            <td>
                                                {!! Form::open(['route' => ['preguntas.edit',$pregunta->id], 'method' => 'get']) !!}
                                                {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                {!! Form::open(['route' => ['preguntas.destroy',$pregunta->id], 'method' => 'delete']) !!}
                                                {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                                {!! Form::close() !!}

                                            </td>
                                        </tr>

                                        @foreach($respuestas as $respuesta)

                                            <tr>
                                                <td>{{ $respuesta->text }}</td>

                                                <td>
                                                    {!! Form::open(['route' => ['respuestas.edit',$respuesta->id], 'method' => 'get']) !!}
                                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                                    {!! Form::close() !!}
                                                </td>
                                                <td>
                                                    {!! Form::open(['route' => ['respuestas.destroy',$respuesta->id], 'method' => 'delete']) !!}
                                                    {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                                    {!! Form::close() !!}

                                                </td>
                                            </tr>
                                        @endforeach

                                    @endforeach
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection