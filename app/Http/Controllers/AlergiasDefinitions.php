<?php
// Definitions
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

const ALERGIA = 'alergia';
const ALERGIAS = 'alergias';

// URLs
define('API_URL', env('API2') . '/alergia/');

// Views
const VIEW_INDEX = 'alergias.index';
const VIEW_CREATE = 'alergias.create';
const VIEW_EDIT = 'alergias.edit';

// Routes
const ROUTE_INDEX = 'Alergias';

// Success
const SUCCESS = 'success';
const SUCCESS_CREATE = 'Alergia creada satisfactoriamente.';
const SUCCESS_UPDATE = 'Alergia actualizada satisfactoriamente.';
const SUCCESS_DELETE = 'Alergia eliminada satisfactoriamente.';

// Error
const ERROR = 'error';
const ERROR_CREATE = 'No se puedo crear la alergia.';
const ERROR_UPDATE = 'No se puedo actualizar la alergia.';
const ERROR_DELETE = 'No se puedo eliminar la alergia.';


function redireccionamiento(array $args): RedirectResponse
{
    return redirect()->route($args[0])->with($args[1], $args[2]);
}

function renderView(string $view, array $data = null): Factory|View|Application
{
    if (is_null($data)) return view($view);
    return view($view, $data);
}

function returnsRedirect($input, array $args): RedirectResponse
{
    if ($input->successful()) {
        return redireccionamiento([$args[0], SUCCESS, $args[1]]);
    } else {
        return redireccionamiento([$args[0], ERROR, $args[2]]);
    }
}

function fieldsAlergia($request)
{
    return [ALERGIA => $request->input(ALERGIA)];
}

/**
 * Make a HTTP request.
 *
 * @param string $method
 * @param string $url
 * @param array $data
 * @return Response
 */
function makeRequest(string $method, string $url, array $data = []): Response
{
    return Http::{$method}($url, $data);
}
