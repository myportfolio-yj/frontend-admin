<?php
include_once 'DefinitionsGeneral.php';

// Definitions
const MASCOTA = 'mascota';
const MASCOTAS = 'mascotas';
// URLs
define('URL_MASCOTA', env('API2') . '/mascota/');

// Views
const VIEW_SHOW = 'identificacion.show';

// Routes
const ROUTE_INDEX = 'Identificacion';
// Success

function fieldsCliente($request): array
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
/*
function fieldsClienteUpdate($request): array
{
    return [
        'nombres' => $request->input('nombres'),
        'apellidos' => $request->input('apellidos'),
        'celular' => $request->input('celular'),
        'fijo' => $request->input('fijo'),
        'idTipoDocumento' => $request->input('tipoDoc'),
        'documento' => $request->input('documento')
    ];
}*/
