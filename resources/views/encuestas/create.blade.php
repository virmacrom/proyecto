@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Rellenar encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                       {!! Form::open(['route' => 'encuestas.store']) !!}

                        <div class="form-group">
                            {!!Form::label('tipoencuesta_id', 'tipo encuesta') !!}
                            <br>
                            {!! Form::select('tipoencuesta_id', $tipoencuesta, ['class' => 'form-control']) !!}
                        </div>


                      {{--  <div class="form-group">
                           {!! Form::label('paciente_id', 'Nombre del paciente que realiza la encuesta') !!}
                             {!! Form::select('paciente_id', $pacientes, ['class' => 'form-control', 'required']) !!}

                         </div>--}}
                       {{-- <div class="form-group">
                            {!! Form::label('medico_id', 'Nombre del medico sobre el que se realiza la encuesta') !!}
                            {!! Form::select('medico_id',$medicos,['class'=>'form-control', 'required']) !!}
                        </div>--}}


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection