<?php

use App\Models\Historias;

include_once 'DefinitionsGeneral.php';

// Definitions
const DIAGNOSTICO = 'diagnostico';
const PROCEDIMIENTO = 'procedimiento';
const HISTORIA = 'historia';
const IDCITA = 'idCita';
const MOTIVO = 'motivo';
const PESO = 'peso';
const TEMPERATURA = 'temperatura';
const FRECUENCIARESPIRATORIA = 'frecuenciaRespiratoria';
const FRECUENCIACARDIACA = 'frecuenciaCardiaca';
const IDDIAGNOSTICO = 'idDiagnostico';
const IDPROCEDIMIENTO = 'idProcedimiento';
const DETALLEDIAGNOSTICO = 'detalleDiagnostico';
const DETALLEPROCEDIMIENTO = 'detalleProcedimiento';
const CERRADO = 'cerrado';
const NATENCION = 'n_atencion';
const VMOTIVO = 'v_motivo';
const NPESO = 'n_peso';
const NTEMP = 'n_temp';
const NFRECRESP = 'n_frecresp';
const NFRECCARD = 'n_freccard';
const NDIAGNOS = 'n_diagnos';
const NPROCEDIMIENTO = 'n_procedimiento';
const VDETDIAGNOS = 'v_detdiagnos';
const VDETPROCED = 'v_detproced';

// URLs
define('API_URL_ATENCION', env('API3') . '/atencion/');
define('API_URL_DIAGNOSTICO', env('API3') . '/diagnostico/');
define('API_URL_PROCEDIMIENTO', env('API3') . '/procedimiento/');

// Views
const VIEW_INDEX = 'historias.index';
const VIEW_CREATE = 'historias.create';
const VIEW_EDIT = 'historias.edit';

// Routes
const ROUTE_INDEX = 'Atenciones';

// Success
const SUCCESS_CREATE = 'Historia creada satisfactoriamente.';
const SUCCESS_UPDATE = 'Historia actualizada satisfactoriamente.';
const SUCCESS_DELETE = 'Historia eliminada satisfactoriamente.';

// Error
const ERROR_CREATE = 'No se pudo crear la historia.';
const ERROR_UPDATE = 'No se pudo actualizar la historia.';
const ERROR_DELETE = 'No se pudo eliminar la historia.';

function fieldsHistorias($request)
{
    return [
        IDCITA => $request->input(NATENCION),
        MOTIVO => $request->input(VMOTIVO),
        PESO => $request->input(NPESO),
        TEMPERATURA => $request->input(NTEMP),
        FRECUENCIARESPIRATORIA => $request->input(NFRECRESP),
        FRECUENCIACARDIACA => $request->input(NFRECCARD),
        IDDIAGNOSTICO => $request->input(NDIAGNOS),
        IDPROCEDIMIENTO => $request->input(NPROCEDIMIENTO),
        DETALLEDIAGNOSTICO => $request->input(VDETDIAGNOS),
        DETALLEPROCEDIMIENTO => $request->input(VDETPROCED),
        CERRADO => false
    ];
}

function setHistoria($response)
{
    $historia = new Historias();
    $historia->id = $response[ID];
    $historia->v_motivo = $response[MOTIVO];
    $historia->n_peso = $response[PESO];
    $historia->n_temp = $response[TEMPERATURA];
    $historia->n_frecresp = $response[FRECUENCIARESPIRATORIA];
    $historia->n_freccard = $response[FRECUENCIACARDIACA];
    $historia->n_diagnos = $response[IDDIAGNOSTICO];
    $historia->v_nombre = $response[IDPROCEDIMIENTO];
    $historia->v_detdiagnos = $response[DETALLEDIAGNOSTICO];
    $historia->v_detproced = $response[DETALLEPROCEDIMIENTO];
    return $historia;
}
