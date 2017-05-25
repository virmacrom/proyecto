@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'encuestas.store']) !!}
                       {{-- <div class="form-group">
                            {!! Form::label('name', 'Nombre de la encuesta') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>--}}

                        <div class="form-group">

                            {!!Form::label('tipoencuesta_id', 'Tipo encuesta que se realiza') !!}
                            <br>
                            {!! Form::select('tipoencuesta_id', $tipoencuesta, ['class' => 'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                           {!! Form::label('name', 'Nombre de la encuesta') !!}
                           {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                       </div>

                        <div class="form-group">
                           {!! Form::label('paciente_id', 'Nombre del paciente que realiza la encuesta') !!}
                             {!! Form::select('paciente_id', $pacientes, ['class' => 'form-control', 'required']) !!}

                         </div>
                        <div class="form-group">
                            {!! Form::label('medico_id', 'Nombre del medico sobre el que se realiza la encuesta') !!}
                            {!! Form::select('medico_id',$medicos,['class'=>'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection