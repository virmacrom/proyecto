<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ALVIR</title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html,body{
                background-image: url("http://systemweb.co/wp-content/uploads/2015/04/encuesta.png");
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: #defef7;
                color: rgba(38, 196, 210, 0.71);
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;



            ;

            }


            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                color: #20326f;
                text-align:center;
                font-size: 18px;
                font-family: 'Raleway', Verdana;


            }

            .title {
                color: #216dd2;
                font-size: 80px;
            }

            .links > a {
                border-bottom-style: double;
                color: #636b6f;
                background-color: rgba(38, 196, 210, 0.18);
                padding: 0 40px;
                font-size: 30px;
                font-family: 'Raleway', Verdana;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }

            .m-b-md {
                margin-bottom: 70px;
                font-family: 'Raleway', Verdana;
                font-size: 90px;
            }

        </style>
    </head>
    <body>


        <div class="flex-center position-ref full-height">


                <div class="top-right links">
                    <a href="{{ url('/login') }}">Entrar</a>
                    <a href="{{ url('/register') }}">RegistroPaciente</a>

                    <br>

                    <a href="{{ url('/registermedico') }}">RegistroMédico</a>
                    <a href="{{ url('/registersas') }}">RegistroSas</a>
                    </div>



                 <div class="top-left">

                     <div class="title m-b-md">
                         <b>ALVIR encuestas</b>
                     </div>


                <div class="content">


                    <br>



                <br>
            </div>
        </div>
    </body>
</html>
