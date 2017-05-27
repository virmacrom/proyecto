@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Rellenar encuesta</div>

                    <div class="panel-body">
                        @include('flash::message')

                       {{-- <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                Seleccionar pregunta <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu">
                                @foreach ($preguntas as $pregunta)
                                    <li><a href="/encuestas/create/{{$pregunta->id}}"> {{$pregunta->text}}</a></li>
                                @endforeach
                            </ul>
                        </div>--}}

                       {!! Form::open(['route' => 'encuestas.store']) !!}

                            <input type="hidden" name="tipoencuesta_id" value="<?=$tipoencuesta->id ?>">  {{--añadido --}}


                  {{-- <div class="form-group" >
                            {!!Form::label('tipoencuesta_id', 'tipo encuesta') !!}
                            <br>
                            {!! Form::select('tipoencuesta_id', $tipoencuesta, ['class' => 'form-control']) !!}
                        </div>--}}


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