@extends('base')

@section('title', 'Dashboard de Clientes')

@section('css',asset('/css/clientes.css') )

@section('main-content')

<div class="main-content">
    <h1>Clientes</h1>
    <button class="add-button" id="addClientButton">Nuevo Cliente</button>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <!-- Los datos de los clientes se insertarán aquí -->
        @foreach ($datos as $dato)
        <tr>
            <td>{{ $dato['id'] }}</td>
            <td>{{ $dato['tipoDocumento']['tipoDocumento'] }} - {{ $dato['documento']}}</td>
            <td>{{ $dato['nombres'] }} {{ $dato['apellidos'] }}</td>
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
