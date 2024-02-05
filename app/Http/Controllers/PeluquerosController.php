<?php

namespace App\Http\Controllers;

use App\Models\Peluqueros;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

include_once 'PeluqueroDefinitions.php';

class PeluquerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $response = makeRequest('GET', URL_PELUQUERO);
        return $response->successful()
            ? renderView(VIEW_INDEX, [PELUQUEROS => $response->json()])
            : dd($response->body());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(): View|Factory|Application|RedirectResponse
    {
        $response = makeRequest('GET', URL_TIPODOCUMENTO);
        return ($response->successful())
            ? renderView(VIEW_CREATE, [TIPODOC => Arr::pluck($response->json(), TIPODOCUMENTO, ID)])
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
        request()->validate(Peluqueros::$rules);
        return returnsRedirect(makeRequest('POST', URL_PELUQUERO, fieldsPeluquero($request)), [ROUTE_INDEX, SUCCESS_CREATE, ERROR_CREATE]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Clientes $clientes
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
    public function edit($id): View|Factory|RedirectResponse|Application
    {
        $response = makeRequest('GET', URL_PELUQUERO . $id);
        $response2 = makeRequest('GET', URL_TIPODOCUMENTO);
        return ($response->successful() && $response2->successful())
            ? renderView(VIEW_EDIT, [PELUQUERO => $response->json(), TIPODOC => Arr::pluck($response2->json(), TIPODOCUMENTO, ID)])
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
        request()->validate(Peluqueros::$rules);
        return returnsRedirect(makeRequest('PUT', URL_PELUQUERO . $id, fieldsPeluqueroUpdate($request)), [ROUTE_INDEX, SUCCESS_UPDATE, ERROR_UPDATE]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        return returnsRedirect(makeRequest('DELETE', URL_PELUQUERO . $id), [ROUTE_INDEX, SUCCESS_DELETE, ERROR_DELETE]);
    }
}
