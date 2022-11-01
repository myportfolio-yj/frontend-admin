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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ConnectController;
use Illuminate\Support\Facades\Auth;

Route::get('/welcome', [ConnectController::class, 'getLogin']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas del menú
Route::resource('qrv_clientes', 'App\Http\Controllers\qrv_clientesController');


Route::resource('qrv_client', 'App\Http\Controllers\qrv_clientController');

Route::post('/validarqr', [App\Http\Controllers\HomeController::class, 'validarqr'])->name('validarqr');

Route::resource('Medicos', 'App\Http\Controllers\UserController');
Route::resource('Alergias', 'App\Http\Controllers\AlergiasController');
Route::resource('Medicamentos', 'App\Http\Controllers\MedicamentosController');
Route::resource('Diagnosticos', 'App\Http\Controllers\DiagnosticosController');
Route::resource('Vacunas', 'App\Http\Controllers\VacunasController');
Route::resource('Procedimientos', 'App\Http\Controllers\ProcedimientosController');
Route::resource('Razas', 'App\Http\Controllers\RazasController');
Route::resource('Detalles', 'App\Http\Controllers\DetallesController');


Route::resource('users', 'App\Http\Controllers\UserController');

//Rutas para Acciones de la opcion Alergias
Route::post('GuardarAlergia', [App\Http\Controllers\AlergiasController::class, 'store'])
    ->name('GuardarAlergia');
Route::get('/Alergias', [App\Http\Controllers\AlergiasController::class, 'index'])->name('Alergias');


//Rutas para Acciones de la opcion Medicamentos
Route::post('GuardarMedicamento', [App\Http\Controllers\MedicamentosController::class, 'store'])
    ->name('GuardarMedicamento');
Route::get('/Medicamentos', [App\Http\Controllers\MedicamentosController::class, 'index'])->name('Medicamentos');

//Rutas para Acciones de la opcion Diagnosticos
Route::post('GuardarDiagnostico', [App\Http\Controllers\DiagnosticosController::class, 'store'])
    ->name('GuardarDiagnostico');
Route::get('/Diagnosticos', [App\Http\Controllers\DiagnosticosController::class, 'index'])->name('Diagnosticos');

//Rutas para Acciones de la opcion Vacunas
Route::post('GuardarVacuna', [App\Http\Controllers\VacunasController::class, 'store'])
    ->name('GuardarVacuna');
Route::get('/Vacunas', [App\Http\Controllers\VacunasController::class, 'index'])->name('Vacunas');

//Rutas para Acciones de la opcion Procedimientos
Route::post('GuardarProcedimiento', [App\Http\Controllers\ProcedimientosController::class, 'store'])
    ->name('GuardarProcedimiento');
Route::get('/Procedimientos', [App\Http\Controllers\ProcedimientosController::class, 'index'])->name('Procedimientos');

//Rutas para Acciones de la opcion Razas
Route::post('GuardarRaza', [App\Http\Controllers\RazasController::class, 'store'])
    ->name('GuardarRaza');
Route::get('/Razas', [App\Http\Controllers\RazasController::class, 'index'])->name('Razas');

