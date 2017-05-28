@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes</div>

                    <div class="panel-body">
                        @include('flash::message')
                        @foreach($pacientes->citas as $paciente)

                            <td>{{$pacientes->citas->fechacita}}</td>
                        @endforeach

                        <td>
                            {!! Form::open(['route' => ['pacientes.show',$pacientes->citas], 'method' => 'get']) !!}
                            {!!   Form::submit('show', ['class'=> 'btn btn-warning'])!!}
                            {!! Form::close() !!}
                        </td>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection