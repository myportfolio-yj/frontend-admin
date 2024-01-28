<?php

namespace App\Http\Controllers;

use App\Models\Atenciones;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

include_once('AtencionesDefinitions.php');

class AtencionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $response = makeRequest('GET', API_URL);
        return $response->successful()
            ? renderView(VIEW_INDEX, [ATENCIONES => $response->json()])
            : dd($response->body());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Atenciones $atenciones
     * @return Response
     */
    public function show(Atenciones $atenciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Atenciones $atenciones
     * @return Response
     */
    public function edit(Atenciones $atenciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Atenciones $atenciones
     * @return Response
     */
    public function update(Request $request, Atenciones $atenciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Atenciones $atenciones
     * @return Response
     */
    public function destroy(Atenciones $atenciones)
    {
        //
    }
}
