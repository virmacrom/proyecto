@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Nombre</th>
                                <th>Nuhsa</th>
                                <th>Dni</th>
                                <th>Operado</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($pacientes as $paciente)


                                <tr>

                                    <td>{{ $paciente->fullname }}</td>
                                    <td>{{ $paciente->nuhsa }}</td>
                                    <td>{{ $paciente->dni }}</td>
                                    <td>{{ $paciente->operado }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.edit',$paciente->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.destroy',$paciente->id], 'method' => 'delete']) !!}
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
@endsection