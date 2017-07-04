@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Especialidades

                        <link rel="stylesheet"
                              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
                              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
                              crossorigin="anonymous">
                        <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

                        <link href=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"
                              rel="stylesheet">
                        {{--<link href="/css/bootstrap.min.css" rel="stylesheet">--}}

                        {{--<link href="/css/dataTables.min.css" rel="stylesheet">--}}


                        <div class="panel-body">

                            @include('flash::message')
                            <button  class="btn btn-primary pull-right" data-toggle="modal" onclick="crear" data-target="#crear" >Nueva Especialidad</button>
                            <br><br/>

                            <table id="tabla-especialidad" class="table table-striped table-bordered">

                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th colspan="1">Editar datos</th>
                                    <th colspan="1">Eliminar datos</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($especialidades as $especialidad)
                                    <tr data-id="{{$especialidad->id}}">

                                        <td>{{ $especialidad->name }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-detail" data-toggle="modal" data-target="#editar" >Editar
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn-delete btn btn-danger" onclick="avisoEliminar({{$especialidad->id}})" data-toggle="modal" data-target="#avisoEliminar">Eliminar</button>
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
                                        <h4 class="modal-title">Eliminar Especialidad</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Desea eliminar la especialidad?&hellip;</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                        <button type="button"  class="btn btn-danger btn-ok" data-dismiss="modal">Confirmar</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div id= "crear" class="modal fade" tabindex="-1" role="dialog" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Crear Especialidad</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="frmespecialidades" name="frmespecialidades" class="form-horizontal" novalidate="">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Nombre:</label>
                                                <input type="text" class="form-control" id="especialidad-name">
                                            </div>

                                        </form>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="button"  class="btn btn-primary btn-save" >Confirmar</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        <div id= "editar" class="modal fade" tabindex="-1" role="dialog" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Editar Especialidad</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form id="frmespecialidades" name="frmespecialidades" class="form-horizontal" novalidate="">
                                            <div class="form-group">
                                                <label for="name" class="control-label">Nombre:</label>
                                                <input type="text" class="form-control" id="especialidad-name" name="name" >
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                        <button type="button"  class="btn btn-primary btn-save" >Confirmar</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => ['especialidades.destroy',':ESPECIALIDAD_ID'], 'method' => 'delete','id'=>'form-delete']) !!}
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
<script src="js/script.js"></script>


{{--
<script src="/js/jquery.min.js"></script>

<script src="/js/dataTables.min.js"></script>
--}}



