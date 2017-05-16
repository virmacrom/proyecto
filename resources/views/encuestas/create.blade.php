@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'encuestas.store']) !!}
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre de la encuesta') !!}
                            {!! Form::text('nombre',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico sobre el que se hace la encuesta') !!}
                            <br>
                            {!! Form::select('medico_id', $medico, $encuesta->medico_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente que hace la encuesta') !!}
                            <br>
                            {!! Form::select('paciente_id', $paciente, $encuesta->paciente_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">

                            {!!Form::label('tipoEncuesta_id', 'Tipo encuesta que se realiza') !!}
                            <br>
                            {!! Form::select('tipoEncuesta_id', $tipoEncuesta, $encuesta->tipoEncuesta_id, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">

                            {!!Form::label('sas_id', 'Sas que crea la encuesta') !!}
                            <br>
                            {!! Form::select('sas_id', $sas, ['class' => 'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection