<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        return returnsRedirect(makeRequest('POST', URL_CHECKIN_PELUQUERIA . $idCita), [ROUTE_INDEX, SUCCESS_CHECKIN, ERROR_CHECKIN]);
    }

    public function veterinariaCheckIn($idCita): RedirectResponse
    {
        return returnsRedirect(makeRequest('POST', URL_CHECKIN_VETERINARIA . $idCita), [ROUTE_INDEX, SUCCESS_CHECKIN, ERROR_CHECKIN]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(): View|Factory|RedirectResponse|Application
    {
        $response = Http::get(URL_CREAR_CITA);
        return ($response->successful())
            ? renderView(VIEW_CREATE, [MASCOTAS => $response->json()[MASCOTAS], TIPOSCITA => $response->json()[TIPOSCITA]])
            : redireccionamiento([ROUTE_INDEX, ERROR, ERROR_CREATE]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Citas::$rules);
        return returnsRedirect(makeRequest('POST', URL_CITAS, fieldsCita($request)), [ROUTE_INDEX, SUCCESS_CREATE, ERROR_CREATE]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        //
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
