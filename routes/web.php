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
});







