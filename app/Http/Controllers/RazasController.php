<?php

namespace App\Http\Controllers;

use App\Models\Razas;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class RazasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/raza');
        if ($response->successful()) {
            $datos = $response->json();
            return view('razas.index')->with('razas', $datos);
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
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/raza');
        $response2 = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/especie');
        if ($response->successful()) {
            $raza = $response->json();
            $tipoEsp = $response2->json();
            $tipoEsp = Arr::pluck($tipoEsp, 'especie', 'id');
            return view('razas.create', compact('raza', 'tipoEsp'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Razas::$rules);
        $response = Http::post('https://mascota-vet-933796c48a6c.herokuapp.com/raza', [
            'raza' => $request->input('raza'),
            'especie ' => $request->input('especie'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('razas')
                ->with('success', 'Raza creado con exito satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Razas $razas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Razas $razas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/raza/' . $id);
        $response2 = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/especie');
        if ($response->successful()) {
            $raza = $response->json();
            $tipoEsp = $response2->json();
            $tipoEsp = Arr::pluck($tipoEsp, 'especie', 'id');
            return view('razas.edit', compact('raza', 'tipoEsp'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Razas $razas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Razas::$rules);
        $response = Http::put('https://mascota-vet-933796c48a6c.herokuapp.com/raza/' . $id, [
            'raza' => $request->input('raza'),
            'idEspecie' => $request->input('tipoEsp'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('razas')
                ->with('success', 'Raza actualizada satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Razas $razas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('https://mascota-vet-933796c48a6c.herokuapp.com/raza/' . $id);
        if ($response->successful()) {
            return redirect()->route('razas')
                ->with('success', 'Raza eliminada satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
