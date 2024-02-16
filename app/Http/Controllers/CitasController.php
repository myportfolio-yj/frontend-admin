<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

include_once 'CitasDefinitions.php';

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $responseCitas = makeRequest(GET, URL_CITAS);
        $responseCitasVigentes = makeRequest(GET, URL_CITAS_VIGENTE);
        return ($responseCitas->successful() && $responseCitasVigentes->successful())
            ? renderView(VIEW_INDEX, [CITAS => $responseCitas->json(), CITAS_VIGENTES => $responseCitasVigentes->json()])
            : dd($responseCitas->body());
    }

    public function peluqueriaCheckIn($idCita): RedirectResponse
    {
        return returnsRedirect(makeRequest(POST, URL_CHECKIN_PELUQUERIA . $idCita), [ROUTE_INDEX, SUCCESS_CHECKIN, ERROR_CHECKIN]);
    }

    public function veterinariaCheckIn($idCita): RedirectResponse
    {
        return returnsRedirect(makeRequest(POST, URL_CHECKIN_VETERINARIA . $idCita), [ROUTE_INDEX, SUCCESS_CHECKIN, ERROR_CHECKIN]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(): View|Factory|RedirectResponse|Application
    {
        $responseFormulario = Http::get(URL_CREAR_CITA);
        $responseCliente = Http::get(URL_CLIENTES);
        return ($responseFormulario->successful() && $responseCliente->successful())
            ? renderView(VIEW_CREATE, $this->contruirArray($responseCliente, $responseFormulario))
            : redireccionamiento([ROUTE_INDEX, ERROR, ERROR_CREATE]);
    }

    function obtenerClientesyMascotas($responseCliente)
    {
        $clientes = [];
        $mascotas = [];
        foreach($responseCliente->json() as $valueCliente)
        {
            $idCliente = $valueCliente[ID];
            $nombresClientes = "{$valueCliente[NOMBRES]} {$valueCliente[APELLIDOS]} - {$valueCliente[TIPODOCUMENTO][TIPODOCUMENTO]}: {$valueCliente[DOCUMENTO]}";
            $aux = [];
            foreach($valueCliente[MASCOTAS] as $valueMascotas){
                $idMascota = $valueMascotas[ID];
                $nombresMascotas = "{$valueMascotas[NOMBRE]} {$valueMascotas[APELLIDO]}";
                $aux[$idMascota] = $nombresMascotas;
            }
            $clientes[$idCliente] = $nombresClientes;
            $mascotas[$idCliente] = $aux;
        }
        return array_values([$clientes, $mascotas]);
    }
    function obtenerCitaEmpleadosyTurnos($responseFormulario)
    {
        $tiposCita = [];
        $empleados = [];
        $fechas = [];
        $turnos = [];
        $atencionPeluqueria = [];
        foreach ($responseFormulario->json()[TIPOSCITA] as $valueTipoCita){
            $idTipoCita = $valueTipoCita[ID];
            $nombreTipoCita = $valueTipoCita[TIPOCITA];

            if(key_exists(RESERVASVETERINARIO, $valueTipoCita))
            {
                $auxEmpleado = [];
                $auxEmpleadoTurnos = [];
                foreach($valueTipoCita[RESERVASVETERINARIO] as $reservasVeterinario)
                {
                    $idVeterinaria = $reservasVeterinario[VETERINARIO][ID];
                    $auxTurnoHorario = [];
                    foreach($reservasVeterinario[TURNOS] as $valueTurno)
                    {
                        foreach($valueTurno[TURNOS] as $valueHorario)
                        {
                            $fechas[$reservasVeterinario[VETERINARIO][ID]][] = $valueTurno[FECHA];
                            $fechas[$reservasVeterinario[VETERINARIO][ID]] = array_unique($fechas[$reservasVeterinario[VETERINARIO][ID]]);
                            $auxTurnoHorario[$valueTurno[FECHA]][] = $valueHorario;
                        }
                    }
                    $auxEmpleadoTurnos[$idVeterinaria] = $auxTurnoHorario;
                    $nombresVeterinario = "{$reservasVeterinario[VETERINARIO][NOMBRES]} {$reservasVeterinario[VETERINARIO][APELLIDOS]} - {$reservasVeterinario[VETERINARIO][CODVETERINARIO]}";
                    $auxEmpleado[$idVeterinaria] = $nombresVeterinario;
                }
                $turnos = array_merge($turnos, $auxEmpleadoTurnos);
                $empleados[$idTipoCita] = $auxEmpleado;
            }
            if(key_exists(RESERVASPELUQUERO, $valueTipoCita))
            {
                foreach($valueTipoCita[ATENCIONESPELUQUERIA] as $atencionesPeluqueria)
                {
                    $atencionPeluqueria[$idTipoCita][$atencionesPeluqueria[ID]] = $atencionesPeluqueria[ATENCIONPELUQUERO];
                }
                $auxEmpleado = [];
                $auxEmpleadoTurnos = [];
                foreach($valueTipoCita[RESERVASPELUQUERO] as $reservasPeluquero)
                {
                    $idPeluquero = $reservasPeluquero[PELUQUERO][ID];
                    $auxTurnoHorario = [];
                    foreach($reservasPeluquero[TURNOS] as $valueTurno)
                    {
                        foreach($valueTurno[TURNOS] as $valueHorario)
                        {
                            $fechas[$reservasPeluquero[PELUQUERO][ID]][] = $valueTurno[FECHA];
                            $fechas[$reservasPeluquero[PELUQUERO][ID]] = array_unique($fechas[$reservasPeluquero[PELUQUERO][ID]]);
                            $auxTurnoHorario[$valueTurno[FECHA]][] = $valueHorario;
                        }
                    }
                    $auxEmpleadoTurnos[$idPeluquero] = $auxTurnoHorario;
                    $nombresPeluquero = "{$reservasPeluquero[PELUQUERO][NOMBRES]} {$reservasPeluquero[PELUQUERO][APELLIDOS]}";
                    $auxEmpleado[$idPeluquero] = $nombresPeluquero;
                }
                $turnos = array_merge($turnos, $auxEmpleadoTurnos);
                $empleados[$idTipoCita] = $auxEmpleado;
            }
            $tiposCita[$idTipoCita] = $nombreTipoCita;
        }
        return array_values([$tiposCita, $empleados, $fechas, $turnos, $atencionPeluqueria]);
    }

    function contruirArray($responseCliente, $responseFormulario)
    {
        $clientes = [];
        $mascotas = [];
        list($clientes, $mascotas) = $this->obtenerClientesyMascotas($responseCliente);

        $tiposCita = [];
        $empleados = [];
        $fechas = [];
        $turnos = [];
        $atencionPeluqueria = [];
        list($tiposCita, $empleados, $fechas, $turnos, $atencionPeluqueria) = $this->obtenerCitaEmpleadosyTurnos($responseFormulario);

        return [
            CLIENTES => $clientes,
            MASCOTAS => $mascotas,
            TIPOSCITA => $tiposCita,
            EMPLEADOS => $empleados,
            FECHAS => $fechas,
            TURNOS => $turnos,
            ATENCIONPELUQUERIA => $atencionPeluqueria
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return returnsRedirect(makeRequest('POST', URL_CITAS, fieldsCita($request)), [ROUTE_INDEX, SUCCESS_CREATE, ERROR_CREATE]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id): View|Factory|Application
    {
        $response = makeRequest('GET', URL_CITAS . $id);
        return $response->successful()
            ? renderView(VIEW_SHOW, [CITA => $response->json()])
            : dd($response->body());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $cita = makeRequest(GET, URL_CITAS . $id);
        $tipoDocumento = makeRequest(GET, URL_TIPODOCUMENTO);
        $tipocita = makeRequest(GET, URL_TIPOCITA);
        return ($cita->successful() && $tipoDocumento->successful() && $tipocita->successful())
            ? renderView(VIEW_EDIT, [
                CITA => $cita->json(),
                TIPODOC => Arr::pluck($tipoDocumento->json(), TIPODOCUMENTO, ID),
                TIPOSCITA => Arr::pluck($tipocita->json(), TIPOCITA, ID),
            ])
            : dd($cita->body());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        request()->validate(Cita::$rules);
        return returnsRedirect(makeRequest('PUT', URL_CITAS . $id, fieldsCita($request)), [ROUTE_INDEX, SUCCESS_UPDATE, ERROR_UPDATE]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Clientes $clientes
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        return returnsRedirect(makeRequest('DELETE', URL_CITAS . $id), [ROUTE_INDEX, SUCCESS_DELETE, ERROR_DELETE]);
    }
}
