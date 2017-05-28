@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar respuesta elegida</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($respuestaelegida, [ 'route' => ['respuestas.update',$respuesta->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}

                        <div class="form-group">
                            {!!Form::label('respuesta_id', 'respuesta') !!}
                            <br>
                            {!! Form::select('respuesta_id', $respuesta, $respuestaelegida->respuesta_id, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection