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
                background-color: #defef7;
                color: rgba(38, 196, 210, 0.71);
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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
                text-align: center;
                font-size: 18px;
                font-family: 'Raleway', Verdana;

            }

            .title {
                color: #216dd2;
                font-size: 89px;
            }

            .links > a {
                border-bottom-style: double;
                color: #26c4d2;
                background-color: rgba(38, 196, 210, 0.18);
                padding: 0 35px;
                font-size: 25px;
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
                    <a href="{{ url('/register') }}">Registro</a>
                    </div>



                 <div class="top-left">
                     <img src = "http://maxsilva.bligoo.com/media/users/13/674240/images/public/80475/encuesta.png"/>
                     </div>


                <div class="content">



                    <div class="title m-b-md">
                        <b>ALVIR encuestas</b>
                    </div>



                <br>


                <div class="links">
                    <a href="https://laravel.com/docs">Descripción</a>
                    <a href="https://laracasts.com">Sugerencias</a>
                    <a href="https://laravel-news.com">Encuestas</a>
                    <a href="https://forge.laravel.com">Contacto</a>
                </div>


                <br>
            </div>
        </div>
    </body>
</html>
