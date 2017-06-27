@extends('layouts.app')

@section('content')
<table class="table table-striped table-bordered">
    <tr>
        <th>Nombre</th>
        <th colspan="2">Acciones</th>
    </tr>
    @foreach ($especialidades as $especialidad)
        <tr data-id="{{$especialidad->id}}">
            <td>{{ $especialidad->name }}</td>
            <td>
                <a href=""class="btn-warning">Editar</a>

            </td>
            <td>
                <a href=""class="btn-delete">Eliminar</a>


            </td>


        </tr>
    @endforeach
</table>

@endsection