@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar sas</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($sas, [ 'route' => ['sas.update',$sas->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}


                        <div class="form-group">

                            {!! Form::label('code', 'codigo del medico') !!}
                            {!! Form::text('code',$sas->code,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>

                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection