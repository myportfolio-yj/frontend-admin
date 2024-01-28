<?php

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

// Success
const SUCCESS = 'success';
// Error
const ERROR = 'error';


function redireccionamiento(array $args): RedirectResponse
{
    if (count($args) == 1) return redirect()->route($args[0]);
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
