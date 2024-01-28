<?php

namespace App\Http\Controllers;

use App\Models\Diagnosticos;
use Illuminate\Http\Request;
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
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/diagnostico');
        if ($response->successful()) {
            $datos = $response->json();
            return view('diagnosticos.index')->with('diagnosticos', $datos);
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
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/diagnostico');
        if ($response->successful()) {
            $diagnostico = $response->json();
            return view('diagnosticos.create', compact('diagnostico'));
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
        request()->validate(Diagnosticos::$rules);
        $response = Http::post('https://clinicas-vet-fefebe4de883.herokuapp.com/diagnostico', [
            'diagnostico' => $request->input('diagnostico'),
            'detalle' => $request->input('detalle'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('diagnosticos')
                ->with('success', 'Diagnostico creado con exito satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Diagnosticos $diagnosticos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Diagnosticos $diagnosticos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/diagnostico/' . $id);
        if ($response->successful()) {
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Diagnosticos $diagnosticos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Diagnosticos::$rules);
        $response = Http::put('https://clinicas-vet-fefebe4de883.herokuapp.com/diagnostico/' . $id, [
            'diagnostico' => $request->input('diagnostico'),
            'detalle' => $request->input('detalle'),

        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('diagnosticos')
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
     * @param \App\Models\Diagnosticos $diagnosticos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('https://clinicas-vet-fefebe4de883.herokuapp.com/diagnostico/' . $id);
        if ($response->successful()) {
            return redirect()->route('diagnosticos')
                ->with('success', 'Diagnostico eliminado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
