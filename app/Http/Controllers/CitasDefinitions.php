<?php
include_once 'DefinitionsGeneral.php';
// Definitions
const CITAS = 'citas';
const CITA = 'cita';
const CITAS_VIGENTES = 'citasVigentes';
const MASCOTAS = 'mascotas';
const TIPOSCITA = 'tiposCita';
const TIPOCITA = 'tipoCita';
const TIPODOC = 'tipoDoc';
const TIPODOCUMENTO = 'tipoDocumento';
const CLIENTES = 'clientes';
const CLIENTE = 'cliente';
const NOMBRE = 'nombre';
const NOMBRES = 'nombres';
const APELLIDO = 'apellido';
const APELLIDOS = 'apellidos';
const DOCUMENTO = 'documento';
const VETERINARIO = 'veterinario';
const RESERVASVETERINARIO = 'reservasVeterinario';
const CODVETERINARIO = 'codVeterinario';
const PELUQUERO = 'peluquero';
const EMPLEADOS = 'empleados';
const FECHAS = 'fechas';
const FECHA = 'fecha';
const TURNOS = 'turnos';
const RESERVASPELUQUERO = 'reservasPeluquero';
const ATENCIONESPELUQUERIA= 'atencionesPeluqueria';
const ATENCIONPELUQUERO= 'atencionPeluquero';
const ATENCIONPELUQUERIA= 'atencionPeluqueria';

// URLs
define('URL_CITAS', env('API3') . '/cita/');
define('URL_CITAS_VIGENTE', env('API3') . '/cita-vigentes/');
define('URL_CHECKIN_PELUQUERIA', env('API3') . '/peluqueria/checkin/');
define('URL_CHECKIN_VETERINARIA', env('API3') . '/veterinaria/checkin/');
define('URL_TIPODOCUMENTO', env('API1') . '/tipodocumento/');
define('URL_CREAR_CITA', env('API3') . '/cita-formulario/');
define('URL_CLIENTES', env('API1') . '/cliente/');
define('URL_TIPOCITA', env('API3') . '/tipocita/');
// Views
 const VIEW_INDEX = 'citas.index';
 const VIEW_CREATE = 'citas.create';
 const VIEW_EDIT = 'citas.edit';
 const VIEW_SHOW = 'citas.show';
// Routes
 const ROUTE_INDEX = 'Citas';
// Success
const SUCCESS_CHECKIN = 'El checkin fue correcto';
const SUCCESS_CREATE = 'Cita creada satisfactoriamente.';
const SUCCESS_UPDATE = 'Cita actualizada satisfactoriamente.';
const SUCCESS_DELETE = 'Cita eliminada satisfactoriamente.';
// Error
const ERROR_CHECKIN = 'Se presentó un problema. Intente más tarde.';
const ERROR_CREATE = 'No se puedo crear la cita.';
const ERROR_UPDATE = 'No se puedo actualizar la cita.';
const ERROR_DELETE = 'No se puedo eliminar la cita.';
function fieldsCita($request): array
{
    return [
        'idCliente' => $request->input('cliente'),
        'idMascota' => $request->input('mascotas'),
        'idTipoCita' => $request->input('tiposCita'),
        'fecha' => $request->input('fechas'),
        'turno' => $request->input('turnos'),
        'observaciones' => $request->input('observaciones'),
        'atencionesPeluqueria' => $request->input('atencionPeluqueria'),
    ];
}
