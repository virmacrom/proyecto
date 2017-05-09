@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar respuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($respuesta, [ 'route' => ['respuestas.update',$respuesta->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">

                        {!! Form::label('texto', 'respuesta') !!}
                        {!! Form::text('texto',$respuesta->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('pregunta_id', 'pregunta') !!}
                            <br>
                            {!! Form::select('pregunta_id', $preguntas, $respuesta->tipoEncuesta_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection