@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Respuestas</div>

                    <link rel="stylesheet"
                          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
                          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
                          crossorigin="anonymous">
                    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

                    <link href=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"
                          rel="stylesheet">

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'respuestas.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear respuesta', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'respuestas.destroyAll', 'method' => 'delete', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Borrar todas', ['class'=> 'btn btn-danger','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table  id="tabla-respuesta" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Respuesta</th>
                                <th>Pregunta</th>
                                <th colspan="1">Editar datos</th>
                                <th colspan="1">Eliminar datos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($respuestas as $respuesta)
                                <tr data-id="{{$respuesta->id}}">
                                    <td>{{ $respuesta->text }}</td>
                                    <td>{{ $respuesta->pregunta->text }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-detail" data-toggle="modal" data-target="#editar" >Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn-delete btn btn-danger" onclick="avisoEliminar({{$respuesta->id}})" data-toggle="modal" data-target="#avisoEliminar">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                </div>
                    <div id= "avisoEliminar" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Eliminar Respuesta</h4>
                                </div>
                                <div class="modal-body">
                                    <p>¿Desea eliminar la respuesta?&hellip;</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <button type="button"  class="btn btn-danger btn-ok" data-dismiss="modal">Confirmar</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
            </div>
        </div>
    </div>
    </div>
    {!! Form::open(['route' => ['respuestas.destroy',':RESPUESTA_ID'], 'method' => 'delete','id'=>'form-delete']) !!}
    {!! Form::close() !!}

@endsection

<meta name="_token" content="{!! csrf_token() !!}" />
<script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="js/scriptrespuesta.js"></script>