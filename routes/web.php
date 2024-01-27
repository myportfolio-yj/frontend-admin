<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta Inicial
Route::get('/', function () { return view('welcome'); });

// Rutas de Login
include_once('routesLogin.php');

// Validar URL
Route::post('/validarqr', [App\Http\Controllers\HomeController::class, 'validarqr'])->name('validarqr');
Route::get('/validarqr/{identificador}', [App\Http\Controllers\HomeController::class, 'validarqr2'])->name('validarqr2');

// Resultado de Scanneo sin login
//Route::get('/Pacientes/nologin/{id}', [App\Http\Controllers\PacientesController::class, 'noLogueado'] )->name('noLogueado');
//Route::post('/Alerta/send', [App\Http\Controllers\PacientesController::class, 'sendAlert'])->name('sendAlert');

Route::middleware(['auth'])->group(function () {
    // Inicio
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Rutas del menú
    //USUARIOS
    Route::resource('medicos', 'App\Http\Controllers\UserController');
    Route::resource('peluqueros', 'App\Http\Controllers\PeluquerosController');
    Route::resource('clientes', 'App\Http\Controllers\ClientesController');
    //INGRESOS
    Route::resource('mascotas', 'App\Http\Controllers\MascotasController');
    Route::resource('citas', 'App\Http\Controllers\CitasController');
    Route::post('/peluqueria/checkin/{idCita}', [App\Http\Controllers\CitasController::class, 'peluqueriaCheckIn'])->name('peluqueriaCheckin');
    Route::post('/veterinaria/checkin/{idCita}', [App\Http\Controllers\CitasController::class, 'veterinariaCheckIn'])->name('veterinariaCheckin');
    Route::resource('atenciones', 'App\Http\Controllers\AtencionesController');
    Route::resource('historias', 'App\Http\Controllers\HistoriasController');
    Route::resource('recetas', 'App\Http\Controllers\RecetasController');
    Route::resource('pacienteHasAlergias', 'App\Http\Controllers\PacienteHasAlergiasController');
    Route::resource('pacienteHasVacunas', 'App\Http\Controllers\PacienteHasVacunasController');
    //CONFIGURACIONES
    Route::resource('alergias', 'App\Http\Controllers\AlergiasController');
    Route::resource('medicamentos', 'App\Http\Controllers\MedicamentosController');
    Route::resource('diagnosticos', 'App\Http\Controllers\DiagnosticosController');
    Route::resource('vacunas', 'App\Http\Controllers\VacunasController');
    Route::resource('procedimientos', 'App\Http\Controllers\ProcedimientosController');
    Route::resource('razas', 'App\Http\Controllers\RazasController');
    //GEOLOCALIZACIION
    Route::resource('geolocalizacion', 'App\Http\Controllers\GeolocalizacionesController');

    //Ruta para los mapas
    // Route::resource('Mapas', 'App\Http\Controllers\Mapas'); <--------------------

    //USUARIOS
    //Rutas para Acciones de la opcion Peluqueros
    Route::post('guardarPeluquero', [App\Http\Controllers\PeluquerosController::class, 'store'])->name('GuardarPeluquero');
    Route::get('/peluqueros', [App\Http\Controllers\PeluquerosController::class, 'index'])->name('Peluqueros');

    //Rutas para Acciones de la opcion Clientes
    Route::post('guardarCliente', [App\Http\Controllers\ClientesController::class, 'store'])->name('GuardarCliente');
    Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('Clientes');

    //INGRESO
    //Rutas para Acciones de la opcion Mascotas
    Route::post('guardarMascota', [App\Http\Controllers\MascotasController::class, 'store'])->name('GuardarPaciente');
    Route::get('/mascotas', [App\Http\Controllers\MascotasController::class, 'index'])->name('Mascotas');

    //Rutas para Acciones de la opcion Atenciones
    Route::post('guardarCita', [App\Http\Controllers\CitasController::class, 'store'])->name('GuardarCita');
    Route::get('/citas', [App\Http\Controllers\CitasController::class, 'index'])->name('Citas');

    //Rutas para Acciones de la opcion Atenciones
    Route::post('guardarAtencion', [App\Http\Controllers\AtencionesController::class, 'store'])->name('GuardarAtencion');
    Route::get('/atenciones', [App\Http\Controllers\AtencionesController::class, 'index'])->name('Atenciones');

    //Rutas para Acciones de la opcion Historia
    Route::post('guardarHistoria', [App\Http\Controllers\HistoriasController::class, 'Historia'])->name('GuardarHistoria');
    Route::get('/historias', [App\Http\Controllers\HistoriasController::class, 'index'])->name('Historias');

    //CONFIGURACIONES
    //Rutas para Acciones de la opcion Alergias
    Route::post('guardarAlergia', [App\Http\Controllers\AlergiasController::class, 'store'])->name('GuardarAlergia');
    Route::get('/alergias', [App\Http\Controllers\AlergiasController::class, 'index'])->name('Alergias');

    //Rutas para Acciones de la opcion Medicamentos
    Route::post('guardarMedicamento', [App\Http\Controllers\MedicamentosController::class, 'store'])->name('GuardarMedicamento');
    Route::get('/medicamentos', [App\Http\Controllers\MedicamentosController::class, 'index'])->name('Medicamentos');

    //Rutas para Acciones de la opcion Diagnosticos
    Route::post('guardarDiagnostico', [App\Http\Controllers\DiagnosticosController::class, 'store'])->name('GuardarDiagnostico');
    Route::get('/diagnosticos', [App\Http\Controllers\DiagnosticosController::class, 'index'])->name('Diagnosticos');

    //Rutas para Acciones de la opcion Vacunas
    Route::post('guardarVacuna', [App\Http\Controllers\VacunasController::class, 'store'])->name('GuardarVacuna');
    Route::get('/vacunas', [App\Http\Controllers\VacunasController::class, 'index'])->name('Vacunas');

    //Rutas para Acciones de la opcion Procedimientos
    Route::post('guardarProcedimiento', [App\Http\Controllers\ProcedimientosController::class, 'store'])->name('GuardarProcedimiento');
    Route::get('/procedimientos', [App\Http\Controllers\ProcedimientosController::class, 'index'])->name('Procedimientos');

    //Rutas para Acciones de la opcion Razas
    Route::post('guardarRaza', [App\Http\Controllers\RazasController::class, 'store'])->name('GuardarRaza');
    Route::get('/razas', [App\Http\Controllers\RazasController::class, 'index'])->name('Razas');

    //Rutas para Acciones de la opcion Geolocalizacion
    Route::post('guardarGeolocalizacion', [App\Http\Controllers\GeolocalizacionesController::class, 'store'])->name('GuardarGeolocalizacion');
    Route::get('/geolocalizaciones', [App\Http\Controllers\GeolocalizacionesController::class, 'index'])->name('Geolocalizaciones');
});







