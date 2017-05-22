@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar pregunta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($pregunta, [ 'route' => ['preguntas.update',$pregunta->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">

                        {!! Form::label('texto', 'pregunta') !!}
                        {!! Form::text('texto',$pregunta->text,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('tipoencuesta_id', 'tipo de encuesta') !!}
                            <br>
                            {!! Form::select('tipoencuesta_id', $tipoencuestas, $pregunta->tipoencuesta_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection