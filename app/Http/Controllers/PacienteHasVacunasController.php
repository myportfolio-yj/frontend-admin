<?php

namespace App\Http\Controllers;

use App\Models\PacienteHasAlergias;
use App\Models\PacienteHasVacunas;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

include_once 'DefinitionsGeneral.php';

define('API_URL_MASCOTA', env('API2') . '/mascota/');
define('API_URL_VACUNA', env('API2') . '/vacuna/');
const VACUNA_CREATE = 'pacienteHasVacunas.create';
const PACIENTEHASVACUNA = 'pacienteHasVacunas';
CONST VACUNA = 'vacuna';
const VACUNAS = 'vacunas';
const CLIENTES = 'clientes';
const PACIENTE = 'paciente';
const ALERGIAS = 'alergias';
const SUCCESS_UPDATE = 'Mascota actualizada satisfactoriamente.';
const ERROR_UPDATE = 'No se pudo actualizar la mascota.';
// Routes
const ROUTE_INDEX = 'Atenciones';

class PacienteHasVacunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(): Application|Factory|View|RedirectResponse
    {
        $responseMascota = makeRequest(GET, API_URL_MASCOTA . $_GET[ID]);
        if ($error = handleError($responseMascota)) return $error;
        $responseVacunas = makeRequest(GET, API_URL_VACUNA);
        if ($error = handleError($responseVacunas)) return $error;

        return renderView(VACUNA_CREATE, [
            PACIENTEHASVACUNA => transformResponse($responseMascota, VACUNAS),
            VACUNAS => Arr::pluck($responseVacunas->json(), VACUNA, ID),
            CLIENTES => $responseMascota->json()[CLIENTES],
            PACIENTE => $responseMascota->json()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(PacienteHasVacunas::$rules);
        $responseMascota = makeRequest(GET, API_URL_MASCOTA . $request->input('paciente_id'));
        if ($error = handleError($responseMascota)) return $error;
        date_default_timezone_set('America/Lima');
        $mascotaActual = $responseMascota->json();
        $mascotaNueva = [
            'clientes' => array_column($mascotaActual['clientes'], ID),
            'nombre' => $mascotaActual['nombre'],
            'apellido' => $mascotaActual['apellido'],
            'fechaNacimiento' => $mascotaActual['fechaNacimiento'],
            'idSexo' => $mascotaActual['sexo'][ID],
            'idEspecie' => $mascotaActual['especie'][ID],
            'idRaza' => $mascotaActual['raza'][ID],
            'esterilizado' => $mascotaActual['esterilizado'],
            'alergias' => array_unique(array_column(transformResponse($responseMascota, ALERGIAS), ID)),
            'vacunas' => transformResponse($responseMascota, VACUNAS),
            'foto' => $mascotaActual['foto'],
        ];
        $mascotaNueva[VACUNAS][] = ['idVacuna' => $request->input(VACUNA), 'fecha' => date('d/m/Y')];
        $mascotaNueva[VACUNAS] = array_map('unserialize', array_values(array_unique(array_map('serialize', $mascotaNueva[VACUNAS]))));

        return returnsRedirect(makeRequest('PUT', API_URL_MASCOTA . $request->input('paciente_id'),
            $mascotaNueva), [ROUTE_INDEX, SUCCESS_UPDATE, ERROR_UPDATE]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PacienteHasAlergias $pacienteHasAlergias
     * @return \Illuminate\Http\Response
     */
    public function show(PacienteHasAlergias $pacienteHasAlergias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PacienteHasAlergias $pacienteHasAlergias
     * @return \Illuminate\Http\Response
     */
    public function edit(PacienteHasAlergias $pacienteHasAlergias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PacienteHasAlergias $pacienteHasAlergias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacienteHasAlergias $pacienteHasAlergias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PacienteHasAlergias $pacienteHasAlergias
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacienteHasAlergias $pacienteHasAlergias)
    {
        //
    }
}
