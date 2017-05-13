@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear pregunta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'preguntas.store', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                        {!! Form::label('texto', 'pregunta') !!}
                        {!! Form::text('texto',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('tipoEncuesta_id', 'tipo de encuesta') !!}
                            <br>
                            {!! Form::select('tipoEncuesta_id', $tipoEncuestas, $pregunta->tipoEncuesta_id, ['class' => 'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection