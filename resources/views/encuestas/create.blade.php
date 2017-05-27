@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        @include('flash::message')

                        <h1>Rellenar encuesta.</h1>
                        <p>Nota: Este es un formulario de ejemplo en el que los datos aquí escritos se
                            trasladan a otra página.</p>
                        <form action="formulario.php" method="post"/>

                        <p>Nombre: <input type="text" name="name"/>
                            Apellidos: <input type="text" surname="surname" size="40"/>
                            DNI: <input type="text" dni="dni" size="10"/></p>
                        <p>Nombre del médico: <input type="text" name="name"/><br/>
                        <table>
                            <tr>
                                <td>
                                    sexo<br/>
                                    <input type="radio" name="sexo" value="V"/> Varón<br/>
                                    <input type="radio" name="sexo" value="M"/> Mujer</p>
                        </td>
                        </tr>
                        </table>
                        <p>¿Está operado?:</p>
                        <select name="operado">
                            <option>¿Operado?:</option>
                            <option value="">Sí</option>
                            <option value="">No</option>
                        </select>
                        </p>

                        <p>Tipo de encuesta: <input type="hidden" name="tipoencuesta_id" value="id"/></p>
                        <p>Pregunta:

                            </p>

                            <p>Su opinión: <br/>
                                <textarea name="comentario" rows="5" cols="50">Comentario: </textarea>
                            <p><input type="submit" value="Guardar">
                                <input type="reset" value="borrar todo"></p>
                            </form>


          {{--              {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}--}}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection