<?php

namespace App\Http\Controllers;

use App\Models\Alergias;
use App\Models\Clientes;
use App\Models\Diagnosticos;
use App\Models\TipoDoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responseCitas = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/cita');
        $responseCitasVigentes = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/cita-vigentes');
        if ($responseCitas->successful() && $responseCitasVigentes->successful()) {
            $citas = $responseCitas->json();
            $citasVigentes = $responseCitasVigentes->json();
            return view('citas.index', compact('citas','citasVigentes'));
        } else {
            // Manejar error
            $error = $responseCitas->body();
            return dd($error);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com//cita');
        if ($response->successful() ) {
            $cita = $response->json();
            return view('citas.create', compact('cita'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Citas::$rules);
        $response = Http::post('https://clinicas-vet-fefebe4de883.herokuapp.com//cita', [
            'idCliente' => $request->input('idCliente'),
            'idMascota' => $request->input('idMascota'),
            'idTipoCita' => $request->input('idTipoCita'),
            'fecha' => $request->input('fecha'),
            'turno' => $request->input('turno'),
            'observaciones' => $request->input('observaciones'),
            'atencionesPeluqueria' => $request->input('atencionesPeluqueria'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Citas')
                ->with('success', 'Cita creado con exito satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com//cita/'.$id);
        $response2 = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/tipodocumento');
        if ($response->successful() && $response2->successful() ) {
            $cliente = $response->json();
            $tipoDoc = $response2->json();
            $tipoDoc = Arr::pluck($tipoDoc,'tipoDocumento','id');
            return view('clientes.edit', compact('cliente','tipoDoc'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Clientes::$rules);
        $response = Http::put('https://clinicas-vet-fefebe4de883.herokuapp.com//cita/'.$id, [
            'idCliente' => $request->input('idCliente'),
            'idMascota' => $request->input('idMascota'),
            'idTipoCita' => $request->input('idTipoCita'),
            'fecha' => $request->input('fecha'),
            'turno' => $request->input('turno'),
            'observaciones' => $request->input('observaciones'),
            'atencionesPeluqueria' => $request->input('atencionesPeluqueria')
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Citas')
                ->with('success', 'Cita actualizado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('https://clinicas-vet-fefebe4de883.herokuapp.com//cita/'.$id);
        if ($response->successful()) {
            return redirect()->route('Citas')
                ->with('success', 'Cita eliminado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
