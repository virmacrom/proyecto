@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear especialidad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['id'=>'form']) !!}
                        </div>
                      <div class="form-group">

                        {!! Form::label('name', 'Nombre de la especialidad') !!}
                        {!! Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Ingresa el nombre']) !!}
                        </div>

                        {!! link_to('#','Guardar',['id'=>'Guardar','class'=>'btn btn-warning btn-sm m-t-10']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $("#Guardar").click(function (e) {
            var name=$("#name").val();
            var token= $("input[name_token]").val();
            var route="{{route('especialidades.store')}}";
            var dataSting= "name="+name;

            $.ajax({
                url:route,
                headers:{'X-CSRF-TOKEN':token},
                type:'post',
                datatype:'json',
                data: dataSting,
                success:function (data) {
                    if(data.success=='true'){
                        document.location.href='{{route("especialidades.index")}}';
                    }
                },
                error:function (data) {
                    $("#error").html(data.responseJSON.name);
                    $("#message-error").fadeIn();
                }
            });

        });
    </script>
@endsection