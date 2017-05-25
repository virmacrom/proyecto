@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar tipo de Encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($tipoencuesta, [ 'route' => ['tipoencuestas.update',$tipoencuesta->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">


                        {!! Form::label('name', 'Nombre del tipo de Encuesta') !!}
                        {!! Form::text('name',$tipoencuesta->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>


                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection