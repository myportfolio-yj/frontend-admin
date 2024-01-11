<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="@yield('css')" rel="stylesheet">
</head>
<body>

<div class="sidebar">
    <img src="https://res.cloudinary.com/dmaoa8dcd/image/upload/v1704759687/Appomsv/Logo1_vai81d.png" alt="Logo">
    <ul>
        <li class="{{ Route::currentRouteName() == 'citas.index' ? 'active' : '' }}">
            <a href="{{ route('citas.index') }}">Citas</a>
        </li>
        <li class="{{ Route::currentRouteName() == 'clientes.index' ? 'active' : '' }}">
            <a href="{{ route('clientes.index') }}">Clientes</a>
        </li>
        <li class="{{ Route::currentRouteName() == 'mascotas.index' ? 'active' : '' }}">
            <a href="{{ route('mascotas.index') }}">Mascotas</a>
        </li>
    </ul>
</div>

<div class="header">
    <span class="menu-toggle">&#9776;</span>
    <div class="user-info">
        <span>Nombre Perfil</span>
        <ul class="user-menu">
            <li>Cerrar sesión</li>
        </ul>
    </div>
</div>

@yield('main-content')

<script>
    document.querySelector('.menu-toggle').addEventListener('click', function () {
        var sidebar = document.querySelector('.sidebar');
        var header = document.querySelector('.header');
        var mainContent = document.querySelector('.main-content');
        if (sidebar.style.width === '250px') {
            sidebar.style.width = '0';
            header.style.width = '100%';
            mainContent.style.width = '100%';
        } else {
            sidebar.style.width = '250px';
            header.style.width = 'calc(100% - 250px)';
            mainContent.style.width = 'calc(100% - 250px)';
        }
    });

    // Evento para mostrar el card de nueva cita
    document.querySelector('button').addEventListener('click', function () {
        document.getElementById('newAppointmentCard').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    });

    // Evento para ocultar el card y el overlay cuando se hace clic en el overlay
    document.getElementById('overlay').addEventListener('click', function () {
        document.getElementById('newAppointmentCard').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    });

    // Clientes
    // Agregar eventos para botones de Ver y Eliminar para cada cliente
    document.querySelectorAll('.view-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Aquí puedes agregar la lógica para ver los detalles del cliente
            alert('Ver detalles del cliente.');
        });
    });

    document.querySelectorAll('.delete-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Aquí puedes agregar la lógica para eliminar un cliente
            alert('Eliminar cliente.');
        });
    });

    // Masccotas
    // JavaScript para manejar eventos de botones
    document.querySelectorAll('.view-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Aquí puedes agregar la lógica para ver los detalles de la mascota
            alert('Ver detalles de la mascota.');
        });
    });

    document.querySelectorAll('.delete-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Aquí puedes agregar la lógica para eliminar una mascota
            alert('Eliminar mascota.');
        });
    });
</script>
</body>
</html>
