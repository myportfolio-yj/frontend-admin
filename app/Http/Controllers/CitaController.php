<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CitaController extends Controller
{
    public function index()
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/cita');
        if ($response->successful()) {
            $datos = $response->json();
            return view('citas', compact('datos'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

}
