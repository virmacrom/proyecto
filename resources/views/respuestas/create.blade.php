@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear respuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'respuestas.store', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                        {!! Form::label('text', 'respuesta') !!}
                        {!! Form::text('text',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('pregunta_id', 'pregunta') !!}
                            <br>
                            {!! Form::select('pregunta_id', $preguntas, ['class' => 'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection