<?php
include_once 'DefinitionsGeneral.php';
// Definitions
const PELUQUEROS = 'peluqueros';
const PELUQUERO = 'peluquero';
const TIPODOCUMENTOS = 'tipoDocumentos';
const TIPODOCUMENTO = 'tipoDocumento';
const TIPODOC = 'tipoDoc';
// URLs
define('URL_PELUQUERO', env('API1') . '/peluquero/');
define('URL_TIPODOCUMENTO', env('API1') . '/tipodocumento/');

// Views
const VIEW_INDEX = 'peluqueros.index';
const VIEW_CREATE = 'peluqueros.create';
const VIEW_EDIT = 'peluqueros.edit';
// Routes
const ROUTE_INDEX = 'Peluqueros';
// Success
const SUCCESS_CREATE = 'Peluquero creado satisfactoriamente.';
const SUCCESS_UPDATE = 'Peluquero actualizado satisfactoriamente.';
const SUCCESS_DELETE = 'Peluquero eliminado satisfactoriamente.';
// Error
const ERROR_CHECKIN = 'Se presentó un problema. Intente más tarde.';
const ERROR_CREATE = 'No se pudo crear el peluquero.';
const ERROR_UPDATE = 'No se pudo actualizar el peluquero.';
const ERROR_DELETE = 'No se pudo eliminar el peluquero.';
function fieldsPeluquero($request): array
{
    return [
        'nombres' => $request->input('nombres'),
        'apellidos' => $request->input('apellidos'),
        'celular' => $request->input('celular'),
        'fijo' => $request->input('fijo'),
        'email' => $request->input('email'),
        'idTipoDocumento' => $request->input('tipoDoc'),
        'documento' => $request->input('documento'),
        'password' => $request->input('documento'),
        'confirmarPassword' => $request->input('documento')
    ];
}

function fieldsPeluqueroUpdate($request): array
{
    return [
        'nombres' => $request->input('nombres'),
        'apellidos' => $request->input('apellidos'),
        'celular' => $request->input('celular'),
        'fijo' => $request->input('fijo'),
        'email' => $request->input('email'),
        'idTipoDocumento' => $request->input('tipoDoc'),
        'documento' => $request->input('documento')
    ];
}
