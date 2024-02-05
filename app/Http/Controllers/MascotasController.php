<?php

namespace App\Http\Controllers;

use App\Models\Alergias;
use App\Models\Mascotas;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

include_once 'MascotasDefinitions.php';
class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $response = makeRequest('GET', API_URL_MASCOTA);
        return $response->successful()
            ? renderView(VIEW_INDEX, [MASCOTAS => $response->json()])
            : dd($response->body());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(): Application|Factory|View|RedirectResponse
    {
        $response1 = makeRequest('GET', API_URL_CLIENTE);
        $response = makeRequest('GET', API_URL_MASCOTA);
        $response2 = makeRequest('GET', API_URL_SEXO);
        // CLIENTES => Arr::pluck($response1->json(), SEXO, ID),
        return ($response->successful() && $response2->successful() && $response1->successful())
            ? renderView(VIEW_CREATE, [
                CLIENTES => array_combine(
                    array_column($response1->json(), ID),
                    array_map(function ($item) {
                        return $item['nombres'] . ' ' . $item['apellidos'];
                    }, $response1->json())
                ),
                MASCOTA => $response->json(),
                TIPOSEX => Arr::pluck($response2->json(), SEXO, ID)
            ])
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
        request()->validate(Mascotas::$rules);
        return returnsRedirect(makeRequest('POST', API_URL_MASCOTA, fieldsMascotas($request)), [ROUTE_INDEX, SUCCESS_CREATE, ERROR_CREATE]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Alergias $alergias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id): Application|Factory|View|RedirectResponse
    {
        $response = makeRequest('GET', API_URL_MASCOTA . $id);
        $response2 = makeRequest('GET', API_URL_SEXO);
        return $response->successful()
            ? renderView(VIEW_EDIT, [MASCOTA => $response->json(), TIPOSEX => Arr::pluck($response2->json(), SEXO, ID)])
            : redireccionamiento([ROUTE_INDEX, ERROR, ERROR_UPDATE]);
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
        request()->validate(Mascotas::$rules);
        return returnsRedirect(makeRequest('PUT', API_URL_MASCOTA . $id, fieldsMascotas($request)), [ROUTE_INDEX, SUCCESS_UPDATE, ERROR_UPDATE]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Alergias $alergias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alergias $alergias)
    {
        //
    }
}
