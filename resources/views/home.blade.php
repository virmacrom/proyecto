@extends('layouts.app')
<style>
    .panel-heading{
        color: #3869d4;
        background-color: #ace9ec;
        font-family: 'Raleway', Verdana;
        font-size: 18px;
        font-weight: 200;
    }
    .panel-body{
        color: #3869d4;
        background-color: #ace9ec;
        font-family: 'Raleway', Verdana;
        font-size: 18px;
        font-weight: 100;
    }
</style>

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    Deslizate sobre el menú para explorar las funcionalidades.
                </div>


                <div class="links">
                    <li><a href="{{ url('/encuestas') }}">Encuestas</a></li>
                    <li><a href="{{ url('/citas') }}">Citas</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
