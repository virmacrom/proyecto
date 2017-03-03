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
            html, body {
                background-color: #fff;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #20326f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                </div>
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Encuestas</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Registro</a>
                @endif
            @endif






            <div class="content">

                    <div class="title m-b-md">
                        ALVIR encuestas 3
                    </div>



                <?php
                $creadores = ["Virginia"=> "vmaciasromero@gmail.com", "Alicia" => "aliciazamorareina6@gmail.com"]
                ?>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    foreach($creadores as $nombre => $email){
                    ?>
                    <tr>
                        <td>
                            <?php echo $nombre ?>
                        </td>
                        <td>
                            <?php echo $email ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>


                <div class="links">
                    <a href="https://laravel.com/docs">Descripción</a>
                    <a href="https://laracasts.com">Sugerencias</a>
                    <a href="https://laravel-news.com">Contacto</a>
                    <a href="https://forge.laravel.com">Encuestas</a>
                </div>
            </div>
        </div>
    </body>
</html>
