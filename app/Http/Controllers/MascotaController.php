<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MascotaController extends Controller
{
    public function index()
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/mascota');
        if ($response->successful()) {
            $datos = $response->json();
            return view('mascota', compact('datos'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    public function registrar()
    {
        return view('mascotaregistrar');
    }
}
