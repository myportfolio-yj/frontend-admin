<?php

namespace App\Http\Controllers;

use App\Models\Alergias;
use App\Models\Diagnosticos;
use App\Models\Medicamentos;
use App\Models\Peluqueros;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DiagnosticosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com//diagnostico');
        if ($response->successful()) {
            $datos = $response->json();
            return view('diagnosticos.index') ->with('diagnosticos',$datos);
        } else {
            // Manejar error
            $error = $response->body();
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
        $response2 = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com//diagnostico');
        if ($response2->successful() ) {
            $datos = $response2->json();
            return view('peluqueros.create') ->with('diagnostico',$datos);
        } else {
            // Manejar error
            $error = $response2->body();
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
        request()->validate(Peluqueros::$rules);
        $response = Http::post('https://usuario-vet-38fce36b3b4d.herokuapp.com/peluquero', [
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'celular' => $request->input('celular'),
            'fijo' => $request->input('fijo'),
            'email' => $request->input('email'),
            'idTipoDocumento' => $request->input('tipoDoc'),
            'documento' => $request->input('documento'),
            'password' => $request->input('documento'),
            'confirmarPassword' => $request->input('documento')
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Peluqueros')
                ->with('success', 'Peluquero creado con exito satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosticos  $diagnosticos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosticos  $diagnosticos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com//diagnostico/'.$id);
        if ($response->successful() ) {
            $diagnostico = $response->json();
            return view('diagnosticos.edit', compact('diagnostico'));
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
     * @param  \App\Models\Diagnosticos  $diagnosticos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Diagnosticos::$rules);
        $response = Http::put('https://clinicas-vet-fefebe4de883.herokuapp.com//diagnostico/'.$id, [
            'diagnostico' => $request->input('diagnostico'),
            'detalle' => $request->input('diagnostico'),

        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Diagnosticos')
                ->with('success', 'Diagnostico actualizada satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosticos  $diagnosticos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('https://clinicas-vet-fefebe4de883.herokuapp.com//diagnostico/'.$id);
        if ($response->successful()) {
            return redirect()->route('Diagnosticos')
                ->with('success', 'Diagnostico eliminado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
