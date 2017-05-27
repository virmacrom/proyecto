@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Encuestas</div>



                    <div class="panel-body">
                        @include('flash::message')
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                Crear encuesta <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu">
                                @foreach ($tipoencuestas as $tipoencuesta)
                                    <li><a href="/encuestas/create/{{$tipoencuesta->id}}"> {{$tipoencuesta->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>


                        <br><br>
                      {{--  <table class="table table-striped table-bordered">
                                <th>TipoEncuesta</th>
                                <th colspan="2">Acciones</th>
                            </tr>--}}

                            @foreach ($encuestas as $encuesta)
                                <tr>
                                  <td>{{ $encuesta->tipoencuesta->name}}</td>

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

                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection