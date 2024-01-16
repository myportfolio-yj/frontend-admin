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

Route::get('/login', [App\Http\Controllers\appoMSV\LoginController::class, 'index'])->name('login');
Route::post('/ingresar', [App\Http\Controllers\appoMSV\LoginController::class, 'login'])->name('ingresar');

Route::get('/citas', [App\Http\Controllers\appoMSV\CitaController::class, 'index'])->name('citas.index');

Route::get('/clientes', [App\Http\Controllers\appoMSV\ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/{idCliente}', [App\Http\Controllers\appoMSV\ClienteController::class, 'detalle'])->name('clientedetalle1');
Route::get('/clientes/registrar', [App\Http\Controllers\appoMSV\ClienteController::class, 'registrar'])->name('clienteregistro1');

Route::get('/mascotas', [App\Http\Controllers\appoMSV\MascotaController::class, 'index'])->name('mascotas.index');
Route::get('/mascotas/registrar', [App\Http\Controllers\appoMSV\MascotaController::class, 'registrar'])->name('mascotaregistro1');

Route::get('/alergias', [App\Http\Controllers\appoMSV\AlergiaController::class, 'index'])->name('alergias.index');
Route::get('/atencion-peluqueria', [App\Http\Controllers\appoMSV\AtencionPeluqueriaController::class, 'index'])->name('atencionpeluqueria.index');
Route::get('/especies', [App\Http\Controllers\appoMSV\EspecieController::class, 'index'])->name('especie.index');
Route::get('/raza', [App\Http\Controllers\appoMSV\RazaController::class, 'index'])->name('raza.index');
Route::get('/tipo-cita', [App\Http\Controllers\appoMSV\TipoCitaController::class, 'index'])->name('tipocita.index');
Route::get('/tipo-documento', [App\Http\Controllers\appoMSV\TipoDocumentoController::class, 'index'])->name('tipodocumento.index');
Route::get('/vacuna', [App\Http\Controllers\appoMSV\VacunaController::class, 'index'])->name('vacuna.index');

// Rutas de Login
include_once('routesLogin.php');

// Validar URL
Route::post('/validarqr', [App\Http\Controllers\HomeController::class, 'validarqr'])->name('validarqr');
Route::get('/validarqr/{identificador}', [App\Http\Controllers\HomeController::class, 'validarqr2'])->name('validarqr2');

// Resultado de Scanneo sin login
Route::get('/Pacientes/nologin/{id}', [App\Http\Controllers\PacientesController::class, 'noLogueado'] )->name('noLogueado');
Route::post('/Alerta/send', [App\Http\Controllers\PacientesController::class, 'sendAlert'])->name('sendAlert');

Route::middleware(['auth'])->group(function () {
    // Inicio
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Rutas del menú
    Route::resource('Medicos', 'App\Http\Controllers\UserController');
    Route::resource('Clientes', 'App\Http\Controllers\ClientesController');
    Route::resource('Pacientes', 'App\Http\Controllers\PacientesController');
    Route::resource('Atenciones', 'App\Http\Controllers\AtencionesController');
    Route::resource('Historias', 'App\Http\Controllers\HistoriasController');
    Route::resource('Alergias', 'App\Http\Controllers\AlergiasController');
    Route::resource('Medicamentos', 'App\Http\Controllers\MedicamentosController');
    Route::resource('Diagnosticos', 'App\Http\Controllers\DiagnosticosController');
    Route::resource('Vacunas', 'App\Http\Controllers\VacunasController');
    Route::resource('Procedimientos', 'App\Http\Controllers\ProcedimientosController');
    Route::resource('Razas', 'App\Http\Controllers\RazasController');
    Route::resource('PacienteHasAlergias', 'App\Http\Controllers\PacienteHasAlergiasController');
    Route::resource('PacienteHasVacunas', 'App\Http\Controllers\PacienteHasVacunasController');
    Route::resource('Recetas', 'App\Http\Controllers\RecetasController');
    //Ruta para los graficos estadisticos
    Route::resource('Graficos', 'App\Http\Controllers\Graficos');
    //Ruta para los mapas
    Route::resource('Mapas', 'App\Http\Controllers\Mapas');

    //Rutas para Acciones de la opcion Historia
    Route::post('GuardarHistoria', [App\Http\Controllers\HistoriasController::class, 'Historia'])->name('GuardarHistoria');
    Route::get('/Historias', [App\Http\Controllers\HistoriasController::class, 'index'])->name('Historias');

    //Rutas para Acciones de la opcion Atenciones
    Route::post('GuardarAtencion', [App\Http\Controllers\AtencionesController::class, 'store'])->name('GuardarAtencion');
    Route::get('/Atenciones', [App\Http\Controllers\AtencionesController::class, 'index'])->name('Atenciones');

    //Rutas para Acciones de la opcion Clientes
    Route::post('GuardarCliente', [App\Http\Controllers\ClientesController::class, 'store'])->name('GuardarCliente');
    Route::get('/Clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('Clientes');

    //Rutas para Acciones de la opcion Mascotas
    Route::post('GuardarPaciente', [App\Http\Controllers\PacientesController::class, 'store'])->name('GuardarPaciente');
    Route::get('/Pacientes', [App\Http\Controllers\PacientesController::class, 'index'])->name('Pacientes');


    //Rutas para Acciones de la opcion Alergias
    Route::post('GuardarAlergia', [App\Http\Controllers\AlergiasController::class, 'store'])->name('GuardarAlergia');
    Route::get('/Alergias', [App\Http\Controllers\AlergiasController::class, 'index'])->name('Alergias');


    //Rutas para Acciones de la opcion Medicamentos
    Route::post('GuardarMedicamento', [App\Http\Controllers\MedicamentosController::class, 'store'])->name('GuardarMedicamento');
    Route::get('/Medicamentos', [App\Http\Controllers\MedicamentosController::class, 'index'])->name('Medicamentos');

    //Rutas para Acciones de la opcion Diagnosticos
    Route::post('GuardarDiagnostico', [App\Http\Controllers\DiagnosticosController::class, 'store'])->name('GuardarDiagnostico');
    Route::get('/Diagnosticos', [App\Http\Controllers\DiagnosticosController::class, 'index'])->name('Diagnosticos');

    //Rutas para Acciones de la opcion Vacunas
    Route::post('GuardarVacuna', [App\Http\Controllers\VacunasController::class, 'store'])->name('GuardarVacuna');
    Route::get('/Vacunas', [App\Http\Controllers\VacunasController::class, 'index'])->name('Vacunas');

    //Rutas para Acciones de la opcion Procedimientos
    Route::post('GuardarProcedimiento', [App\Http\Controllers\ProcedimientosController::class, 'store'])->name('GuardarProcedimiento');
    Route::get('/Procedimientos', [App\Http\Controllers\ProcedimientosController::class, 'index'])->name('Procedimientos');

    //Rutas para Acciones de la opcion Razas
    Route::post('GuardarRaza', [App\Http\Controllers\RazasController::class, 'store'])->name('GuardarRaza');
    Route::get('/Razas', [App\Http\Controllers\RazasController::class, 'index'])->name('Razas');
});







