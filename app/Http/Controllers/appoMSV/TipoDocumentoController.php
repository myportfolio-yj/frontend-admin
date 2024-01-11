<?php

namespace App\Http\Controllers\appoMSV;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class TipoDocumentoController extends Controller
{
    public function index()
    {
        $response = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/cliente');

        if ($response->successful()) {
            $datos = $response->json();
            return view('cliente', compact('datos'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
