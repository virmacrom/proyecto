@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear especialidad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'especialidades.store', 'class'=>'form-inline']) !!}
                        <div class="form-group">
                        {!! Form::label('name', 'Nombre de la especialidad') !!}
                        {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">

                            {!!Form::label('sas_id', 'Sas que crea la encuesta') !!}
                            <br>
                            {!! Form::select('sas_id', $sas, ['class' => 'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection