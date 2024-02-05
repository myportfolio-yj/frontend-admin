<?php
include_once 'DefinitionsGeneral.php';
// Definitions
const CITAS = 'citas';
const CITA = 'cita';
const CITAS_VIGENTES = 'citasVigentes';
const MASCOTAS = 'mascotas';
const TIPOSCITA = 'tiposCita';

// URLs
define('URL_CITAS', env('API3') . '/cita/');
define('URL_CITAS_VIGENTE', env('API3') . '/cita-vigentes/');
define('URL_CHECKIN_PELUQUERIA', env('API3') . '/peluqueria/checkin/');
define('URL_CHECKIN_VETERINARIA', env('API3') . '/veterinaria/checkin/');
define('URL_TIPODOCUMENTO', env('API1') . '/tipodocumento/');
define('URL_CREAR_CITA', env('API3') . '/cita-formulario/');
// Views
 const VIEW_INDEX = 'citas.index';
 const VIEW_CREATE = 'citas..create';
 const VIEW_EDIT = 'citas.edit';
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
        'idCliente' => $request->input('idCliente'),
        'idMascota' => $request->input('idMascota'),
        'idTipoCita' => $request->input('idTipoCita'),
        'fecha' => $request->input('fecha'),
        'turno' => $request->input('turno'),
        'observaciones' => $request->input('observaciones'),
        'atencionesPeluqueria' => $request->input('atencionesPeluqueria'),
    ];
}
