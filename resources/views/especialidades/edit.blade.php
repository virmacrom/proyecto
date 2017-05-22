@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar especialidad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($especialidad, [ 'route' => ['especialidades.update',$especialidad->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">

                        {!! Form::label('name', 'Nombre de la especialidad') !!}
                        {!! Form::text('name',$especialidad->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        {{--<div class="form-group">

                            {!!Form::label('sas_id', 'Sas que edita la especialidad') !!}
                            <br>
                            {!! Form::select('sas_id', $sas, $especialidad->sas_id, ['class' => 'form-control', 'required']) !!}
                        </div>--}}
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection