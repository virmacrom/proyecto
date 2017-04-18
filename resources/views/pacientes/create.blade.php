@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear paciente</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'pacientes.store']) !!}

                        <div class="form-group">
                            {!! Form::label('nuhsa', 'NUHSA del paciente') !!}
                            {!! Form::text('nuhsa',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('dni', 'DNI del paciente') !!}
                            {!! Form::text('dni',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('operado', 'Si el paciente se ha operado paciente') !!}
                            {!! Form::text('operado',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection