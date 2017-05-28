@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas que le corresponden</div>

                    <div class="panel-body">
                        @include('flash::message')
                        @foreach($cita->medicos as $cita)

                            <td>{{$cita->medicos->fullname}}</td>
                        @endforeach

                        <td>
                            {!! Form::open(['route' => ['citas.show',$cita->medicos], 'method' => 'get']) !!}
                            {!!   Form::submit('show', ['class'=> 'btn btn-warning'])!!}
                            {!! Form::close() !!}
                        </td>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection