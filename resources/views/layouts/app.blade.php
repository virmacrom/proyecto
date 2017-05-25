<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ALVIR encuestas') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'ALVIR encuestas') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li><a href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    {{--{{dd(Auth::user())}}--}}
                                    @if (Auth::user()->medico)   {{--hacer que solo vea sus cosas--}}
                                        <li><a href="{{ url('/pacientes') }}"> Pacientes</a></li>
                                        <li><a href="{{ url ('/enfermedades') }}"> Enfermedades</a></li>
                                        <li><a href="{{ url('/especialidades') }}">Especialidades</a></li>

                                    @elseif (Auth::user()->paciente)
                                        <li><a href="{{ url('/encuestas') }}">Encuestas</a></li>

                                    @elseif (Auth::user()->sas)
                                    <li><a href="{{ url('/pacientes') }}"> Pacientes</a></li>
                                    <li><a href="{{ url('/medicos') }}"> Medicos</a></li>
                                    <li><a href="{{ url('/especialidades') }}">Especialidades</a></li>
                                    <li><a href="{{ url('/enfermedades') }}">Enfermedades</a></li>
                                    <li><a href="{{ url('tipoencuestas') }}">Tipo de Encuestas</a></li>
                                    <li><a href="{{ url('/encuestas') }}">Encuestas</a></li> {{--tiene que estar?¿--}}
                                    <li><a href="{{ url('/preguntas') }}">Preguntas</a></li>
                                    <li><a href="{{ url ('/respuestas') }}"> Enfermedades</a></li>

                                    @endif
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar sesión</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @if (count($errors) > 0)
            <div class="container">
                <div class="row ">
                    <div class="alert alert-danger col-md-8 col-md-offset-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
