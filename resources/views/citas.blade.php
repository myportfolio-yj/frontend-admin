@extends('base')

@section('title', 'Dashboard de Citas')

@section('css',asset('/css/citas.css') )

@section('main-content')

<div class="main-content">
    <h1>Citas</h1>
    <div class="search-box">
        <input type="text" placeholder="Buscar...">
        <button>Nueva cita</button>
    </div>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Fecha</th>
            <th>Turno</th>
            <th>Nombre</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        <!-- Los datos de la tabla se insertarán aquí -->
        @foreach ($datos as $dato)
        <tr>
            <td>{{ $dato['id'] }}</td>
            <td>{{ $dato['fecha'] }}</td>
            <td>{{ $dato['turno'] }}</td>
            <td>{{ $dato['nombreMascota'] }}</td>
            <td>
                <button value="{{ $dato['id'] }}">Atender</button>
            </td>
        </tr>
        @endforeach
        <!-- Más filas pueden ser agregadas aquí -->
        </tbody>
    </table>
</div>

<!-- Overlay para oscurecer la pantalla detrás del card -->
<div class="overlay" id="overlay"></div>

<!-- Card para nueva cita -->
<div class="card" id="newAppointmentCard">
    <h2>Nueva Cita</h2>
    <input type="text" placeholder="Nombre de la mascota">
    <button id="attendButton">Atender</button>
</div>

@endsection
