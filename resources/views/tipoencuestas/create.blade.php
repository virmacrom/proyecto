@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear tipo de Encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'tipoencuestas.store', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                        {!! Form::label('name', 'Nombre del tipo de ecuesta') !!}
                        {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection