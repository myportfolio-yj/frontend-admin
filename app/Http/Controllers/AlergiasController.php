<?php

namespace App\Http\Controllers;

use App\Models\Alergias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

include_once 'AlergiasDefinitions.php';

class AlergiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    /*ORIGINAL
     * public function index(): View|Factory|Application
    {
        $response = makeRequest('GET', API_URL);
        return $response->successful()
            ? renderView(VIEW_INDEX, [ALERGIAS => $response->json()])
            : dd($response->body());
    }*/
    public function index(Request $request): View|Factory|Application
    {
        $response = makeRequest('GET', API_URL);

        if ($response->successful()) {
            $data = $response->json();
            $currentPage = $request->query('page', 1);
            $perPage = 10; // Número de elementos por página

            // Calcula el desplazamiento para la paginación
            $offset = ($currentPage - 1) * $perPage;

            // Obtén los elementos de la página actual
            $currentPageData = array_slice($data, $offset, $perPage);

            // Crea una instancia de LengthAwarePaginator
            $paginator = new LengthAwarePaginator(
                $currentPageData,
                count($data),
                $perPage,
                $currentPage,
                ['path' => $request->url()]
            );

            return renderView(VIEW_INDEX, [
                ALERGIAS => $paginator,
            ]);
        } else {
            return dd($response->body());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return renderView(VIEW_CREATE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate(Alergias::$rules);
        return returnsRedirect(makeRequest('POST', API_URL, fieldsAlergia($request)), [ROUTE_INDEX, SUCCESS_CREATE, ERROR_CREATE]);
    }

    /**
     * Display the specified resource.
     *
     * @param Alergias $alergias
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
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id): Application|Factory|View|RedirectResponse
    {
        $response = makeRequest('GET', API_URL . $id);
        return $response->successful()
            ? renderView(VIEW_EDIT, [ALERGIA => $response->json()])
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
        request()->validate(Alergias::$rules);
        return returnsRedirect(makeRequest('PUT', API_URL . $id, fieldsAlergia($request)), [ROUTE_INDEX, SUCCESS_UPDATE, ERROR_UPDATE]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        return returnsRedirect(makeRequest('DELETE', API_URL . $id), [ROUTE_INDEX, SUCCESS_DELETE, ERROR_DELETE]);
    }
}
