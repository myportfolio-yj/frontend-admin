<?php
include_once 'DefinitionsGeneral.php';

// Definitions
const MASCOTAS = 'mascotas';
const MASCOTA = 'mascota';
const TIPOSEX = 'tipoSex';
const SEXO = 'sexo';
const CLIENTES = 'clientes';

// URLs
define('API_URL_MASCOTA', env('API2') . '/mascota/');
define('API_URL_SEXO', env('API2') . '/sexo/');
define('API_URL_CLIENTE', env('API1') . '/cliente/');

// Views
const VIEW_INDEX = 'mascotas.index';
const VIEW_CREATE = 'mascotas.create';
const VIEW_EDIT = 'mascotas.edit';

// Routes
const ROUTE_INDEX = 'Mascotas';

// Success
const SUCCESS_CREATE = 'Mascota creada satisfactoriamente.';
const SUCCESS_UPDATE = 'Mascota actualizada satisfactoriamente.';
const SUCCESS_DELETE = 'Mascota eliminada satisfactoriamente.';

// Error
const ERROR_CREATE = 'No se pudo crear la mascota.';
const ERROR_UPDATE = 'No se pudo actualizar la mascota.';
const ERROR_DELETE = 'No se pudo eliminar la mascota.';


function fieldsMascotas($request){
    return [
        'codIdentificacion' => $request->input('codIdentificacion'),
        'nombre' => $request->input('nombre'),
        'apellido' => $request->input('apellido'),
        'fechaNacimiento' => $request->input('fechaNacimiento'),
        'esterilizado' => $request->input('esterilizado'),
    ];
}
