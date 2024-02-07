<?php

namespace App\Http\Controllers;

use App\Models\Historias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

include_once 'HistoriasDefinitions.php';

class HistoriasController extends Controller
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
    public function create(): View|Factory|Application|RedirectResponse
    {
        $responseDiagnostico = makeRequest(GET, API_URL_DIAGNOSTICO);
        $responseProcedimiento = makeRequest(GET, API_URL_PROCEDIMIENTO);
        return ($responseDiagnostico->successful() && $responseProcedimiento->successful())
            ? renderView(VIEW_CREATE, [
                HISTORIA => new Historias(),
                DIAGNOSTICO => Arr::pluck($responseDiagnostico->json(), DIAGNOSTICO, ID),
                PROCEDIMIENTO => Arr::pluck($responseProcedimiento->json(), PROCEDIMIENTO, ID),
                ID => $_GET[ID]
            ])
            : dd($responseDiagnostico->body());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Historias::$rules);
        return returnsRedirect(makeRequest('POST', API_URL_ATENCION, fieldsHistorias($request)), [ROUTE_INDEX, SUCCESS_CREATE, ERROR_CREATE]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Historias $historias
     * @return \Illuminate\Http\Response
     */
    public function show(Historias $historias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(string $id): View|Factory|RedirectResponse|Application
    {
        $response = makeRequest('GET', API_URL_ATENCION . $id);
        if ($response->successful()) {
            $historia = setHistoria($response->json());
        } else {
            $error = $response->body();
            return dd($error);
        }
        $responseDiagnostico = makeRequest('GET', API_URL_DIAGNOSTICO);
        $responseProcedimiento = makeRequest('GET', API_URL_PROCEDIMIENTO);
        return ($responseDiagnostico->successful() && $responseProcedimiento->successful())
            ? renderView(VIEW_EDIT, [
                HISTORIA => $historia,
                DIAGNOSTICO => Arr::pluck($responseDiagnostico->json(), DIAGNOSTICO, ID),
                PROCEDIMIENTO => Arr::pluck($responseProcedimiento->json(), PROCEDIMIENTO, ID),
                ID => $id
            ])
            : redireccionamiento([ROUTE_INDEX, ERROR, ERROR_UPDATE]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        request()->validate(Historias::$rules);
        return returnsRedirect(makeRequest('PUT', API_URL_ATENCION . $id, fieldsHistorias($request)), [ROUTE_INDEX, SUCCESS_UPDATE, ERROR_UPDATE]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Historias $historias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historias $historias)
    {
        //
    }
}
