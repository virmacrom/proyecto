@extends('layouts.app')

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
                    <li><a href="{{ url('/enfermedades') }}">Enfermedades</a></li>
                    <li><a href="{{ url('/encuestas') }}">Encuestas</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
