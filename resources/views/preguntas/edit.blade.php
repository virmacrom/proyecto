@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar pregunta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($pregunta, [ 'route' => ['preguntas.update',$pregunta->id], 'method'=>'PUT']) !!}
                        <div class="form-group">

                        {!! Form::label('text', 'pregunta') !!}
                        {!! Form::text('text',$pregunta->text,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('tipoencuesta_id', 'tipo de encuesta') !!}
                            <br>
                            {!! Form::select('tipoencuesta_id', $tipoencuesta, $pregunta->tipoencuesta_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection