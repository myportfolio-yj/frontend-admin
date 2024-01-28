<?php
include_once 'DefinitionsGeneral.php';

// Definitions
const CLIENTE = 'cliente';
const CLIENTES = 'clientes';
const TIPODOC = 'tipoDoc';
// URLs
define('URL_CLIENTE', env('API1') . '/cliente/');
define('URL_TIPODOCUMENTO', env('API1') . '/tipodocumento/');

// Views
const VIEW_INDEX = 'clientes.index';
const VIEW_SHOW = 'clientes.show';
const VIEW_CREATE = 'clientes.create';
const VIEW_EDIT = 'clientes.edit';

// Routes
const ROUTE_INDEX = 'Clientes';
// Success
const SUCCESS_CREATE = 'Cliente creado satisfactoriamente.';
const SUCCESS_UPDATE = 'Cliente actualizado satisfactoriamente.';
const SUCCESS_DELETE = 'Cliente eliminado satisfactoriamente.';

// Error
const ERROR_CREATE = 'No se puedo crear el cliente.';
const ERROR_UPDATE = 'No se puedo actualizar el cliente.';
const ERROR_DELETE = 'No se puedo eliminar el cliente.';
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
}
