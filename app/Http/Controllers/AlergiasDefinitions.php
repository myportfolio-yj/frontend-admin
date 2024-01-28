<?php
include_once('DefinitionsGeneral.php');
// Definitions
const ALERGIA = 'alergia';
const ALERGIAS = 'alergias';

// URLs
define('API_URL', env('API2') . '/alergia/');

// Views
const VIEW_INDEX = 'alergias.index';
const VIEW_CREATE = 'alergias.create';
const VIEW_EDIT = 'alergias.edit';

// Routes
const ROUTE_INDEX = 'Alergias';

// Success
const SUCCESS_CREATE = 'Alergia creada satisfactoriamente.';
const SUCCESS_UPDATE = 'Alergia actualizada satisfactoriamente.';
const SUCCESS_DELETE = 'Alergia eliminada satisfactoriamente.';

// Error
const ERROR_CREATE = 'No se puedo crear la alergia.';
const ERROR_UPDATE = 'No se puedo actualizar la alergia.';
const ERROR_DELETE = 'No se puedo eliminar la alergia.';


function fieldsAlergia($request)
{
    return [ALERGIA => $request->input(ALERGIA)];
}


