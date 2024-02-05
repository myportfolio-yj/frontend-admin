<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Identificaciòn de la mascota</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/identificacion.css') }}">
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0"
    style="background: #e9ecef;">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar
                    sesión</a>
            @endauth
        </div>
    @endif
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="login-logo">
            <a href="http://localhost/qrvet/public/home">
                <img src="https://res.cloudinary.com/dmaoa8dcd/image/upload/v1704759687/Appomsv/Logo1_vai81d.png" alt=""
                     height="80">
            </a>
        </div>
            <section class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Nro de Identificación:</strong>

                            </div>
                            <div class="form-group">
                                <strong>Nombre de la mascota:</strong>

                            </div>
                            <div class="form-group">
                                <strong>Apellido de la mascota:</strong>

                            </div>
                            <div class="form-group">
                                <strong>Fecha de nacimiento de la mascota:</strong>

                            </div>
                            <div class="form-group">
                                <strong>Sexo:</strong>

                            </div>
                            <div class="form-group">
                                <strong>Raza:</strong>

                            </div>
                            <div class="form-group">
                                <strong>Dueño de la mascota:</strong>
                            </div>
                            <div class="text-right">
                                QR de identificación del paciente<br/>
                                {!!QrCode::size(150)->generate( env('APP_URL', 'http://localhost/qrvet/public/').'validarqr/'.'Codigo') !!}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
</div>
</body>
</html>
