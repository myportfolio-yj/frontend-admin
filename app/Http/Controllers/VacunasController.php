<?php

namespace App\Http\Controllers;

use App\Models\Vacunas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;


class VacunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/vacuna');
        if ($response->successful()) {
            $datos = $response->json();
            return view('vacunas.index')->with('vacunas', $datos);
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
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/vacuna');
        if ($response->successful()) {
            $vacuna = $response->json();
            return view('vacunas.create', compact('vacuna'));
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
        request()->validate(Vacunas::$rules);
        $response = Http::post('https://mascota-vet-933796c48a6c.herokuapp.com/vacuna', [
            'vacuna' => $request->input('vacuna'),
            'duracion' => $request->input('duracion'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Vacunas')
                ->with('success', 'Vacuna creado con exito satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vacunas $vacunas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vacunas $vacunas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/vacuna/'.$id);
        if ($response->successful()) {
            $vacuna = $response->json();
            return view('vacunas.edit', compact('vacuna'));
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
     * @param \App\Models\Vacunas $vacunas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Vacunas::$rules);
        $response = Http::put('https://mascota-vet-933796c48a6c.herokuapp.com/vacuna/' . $id, [
            'vacuna' => $request->input('vacuna'),
            'duracion' => $request->input('duracion'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Vacunas')
                ->with('success', 'Vacuna actualizada satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vacunas $vacunas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('https://mascota-vet-933796c48a6c.herokuapp.com/vacuna/' . $id);
        if ($response->successful()) {
            return redirect()->route('Vacunas')
                ->with('success', 'Vacuna eliminado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
