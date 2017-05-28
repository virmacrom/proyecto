@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Formulario completado</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::model(['route' => '/encuestas.create', 'method' => 'get']) !!}

                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">


                            <tr>
                           @foreach ($tipoencuestas as $tipoencuesta)
                                    <th>Tipo encuesta</th>
                                <td><{{$tipoencuesta->name}}></td>
                            </tr>


                            <tr>
                                @foreach ($tipoencuesta->preguntas as $pregunta)
                                        <th>Pregunta</th>
                                    <td>{{ $pregunta->text}}</td>
                                @endforeach
                            </tr>

                                    {{--@foreach ($pregunta->respuestas as $respuesta)
                                        <td>{{ $respuesta->text}}</td>
                                    @endforeach--}}
                                    {{--@foreach ($respuesta->respuestaselegidas as $respuestaelegida)

                                        <td>{{ $respuestaelegida->text}}</td>
                                    @endforeach--}}

                              {{--  <tr>--}}

                                 {{--  <td>{{ $tipoencuesta->name }}</td>--}}
                                    {{--<td>{{ $tipoencuesta->pregunta }}</td>--}}


                                   {{-- <td>

                                        {!! Form::open(['route' => ['encuestas.edit',$encuesta->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['encuestas.destroy',$encuesta->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>--}}
                                {{--</tr>--}}

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection