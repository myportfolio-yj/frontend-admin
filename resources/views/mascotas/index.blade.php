@extends('base')

@section('title', 'Listado de Mascotas')

@section('css',asset('/css/mascotas.css') )

@section('main-content')

    <div class="main-content">
    <h1>Mascotas</h1>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>CodIdent</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <!-- Los datos de las mascotas se insertarán aquí -->
        @foreach ($datos as $dato)
        <tr>
            <td>{{ $dato['id'] }}</td>
            <td>{{ $dato['codIdentificacion'] }}</td>
            <td>{{ $dato['nombre'] }} {{ $dato['apellido'] }}</td>
            <td class="action-buttons">
                <button class="view-button" value="{{ $dato['id'] }}">Ver</button>
                <button class="delete-button" value="{{ $dato['id'] }}">Eliminar</button>
            </td>
        </tr>
        @endforeach
        <!-- Más filas pueden ser agregadas aquí -->
        </tbody>
    </table>
</div>

@endsection
