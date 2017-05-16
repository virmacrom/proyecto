@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($encuesta, [ 'route' => ['encuestas.update',$encuesta->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('nombre', 'nombre de la encuesta') !!}
                            {!! Form::text('nombre',$encuesta->nombre,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico sobre el que se hace la encuesta') !!}
                            <br>
                            {!! Form::select('medico_id', $medicos, $encuesta->medico_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente que hace la encuesta') !!}
                            <br>
                            {!! Form::select('paciente_id', $pacientes, $encuesta->paciente_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">

                            {!!Form::label('tipoEncuesta_id', 'Tipo encuesta que se realiza') !!}
                            <br>
                            {!! Form::select('tipoEncuesta_id', $tipoEncuestas, $encuesta->tipoEncuesta_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">

                            {!!Form::label('sas_id', 'Sas que edita la encuesta') !!}
                            <br>
                            {!! Form::select('sas_id', $sas, $encuesta->sas_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
