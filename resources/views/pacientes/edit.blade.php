@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar paciente</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($paciente, [ 'route' => ['pacientes.update',$paciente->id], 'method'=>'PUT']) !!}


                        <div class="form-group">
                            {!! Form::label('nuhsa', 'NUHSA del paciente') !!}
                            {!! Form::text('nuhsa',$paciente->nuhsa,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('dni', 'DNI del paciente') !!}
                            {!! Form::text('dni',$paciente->dni,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('operado', 'Si el paciente se ha operado') !!}
                            {!! Form::text('operado',$paciente->operado,['class'=>'form-control']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
