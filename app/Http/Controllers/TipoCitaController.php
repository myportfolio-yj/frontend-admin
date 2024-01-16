<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class TipoCitaController extends Controller
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
