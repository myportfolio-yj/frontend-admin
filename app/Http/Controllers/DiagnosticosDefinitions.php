<?php
include_once 'DefinitionsGeneral.php';
// Definitions
const DIAGNOSTICO = 'diagnostico';
const DIAGNOSTICOS = 'diagnosticos';
const DETALLE = 'detalle';

// URLs
define('API_URL', env('API3') . '/diagnostico/');

// Views
const VIEW_INDEX = 'diagnosticos.index';
const VIEW_CREATE = 'diagnosticos.create';
const VIEW_EDIT = 'diagnosticos.edit';

// Routes
const ROUTE_INDEX = 'Diagnosticos';

// Success
const SUCCESS_CREATE = 'Diagnostico creado con exito.';
const SUCCESS_UPDATE = 'Diagnostico actualizado con exito.';
const SUCCESS_DELETE = 'Diagnostico eliminado con exito.';

// Error
const ERROR_CREATE = 'No se pudo crear el diagnostico.';
const ERROR_UPDATE = 'No se pudo actualizar el diagnostico.';
const ERROR_DELETE = 'No se pudo eliminar el diagnostico.';

function fieldsDiagnosticos($request)
{
    return [
        DIAGNOSTICO => $request->input(DIAGNOSTICO),
        DETALLE => $request->input(DETALLE),
    ];
}

