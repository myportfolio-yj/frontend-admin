<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

include_once 'IdentificacionDefinitions.php';
class IdentificacionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id): View|Factory|Application
    {
        $response = makeRequest('GET', URL_MASCOTA . $id);
        return $response->successful()
            ? renderView(VIEW_SHOW, [MASCOTA => $response->json()])
            : dd($response->body());
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
