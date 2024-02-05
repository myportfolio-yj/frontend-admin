<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class IdentificacionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/mascota');
        if ($response->successful()) {
            $datos = $response->json();
            return view('identificacion.index')->with('identificacion', $datos);
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }



    /*public function validarqr(Request $request)
    {
        $qr = $request->qr_code;
        $paciente = Mascotas::where('v_identifica', $qr)->first();
        if (is_null($paciente)) {
            return response()->json(['status' => 400,]);
        }
        $id = Auth::id();
        $url = env('APP_URL', 'http://localhost/qrvet/public/');
        if (is_null($id)) {
            return response()->json(['status' => 200, 'url' => $url . 'Pacientes/nologin/' . $paciente->id]);
        }
        return response()->json(['status' => 200, 'url' => $url . 'Pacientes/' . $paciente->id]);
    }

    public function validarqr2(string $identificador)
    {
        $paciente = Mascotas::where('v_identifica', $identificador)->first();
        if (is_null($paciente)) {
            return response()->json(['status' => 400,]);
        }
        $id = Auth::id();
        $url = env('APP_URL', 'http://localhost/qrvet/public/');
        if (is_null($id)) {
            return redirect()->route('noLogueado', ['id' => $paciente->id]);
        }
        return redirect()->route('pacientes.show', ['Paciente' => $paciente->id]);
    }*/
}
