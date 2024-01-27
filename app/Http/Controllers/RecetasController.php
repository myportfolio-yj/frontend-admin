<?php

namespace App\Http\Controllers;

use App\Models\Atenciones;
use App\Models\Medicamentos;
use App\Models\Recetas;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = $_GET['id'];
        $response = Http::get('http://api3.v1.appomsv.com/cita/'.$id);
        if ($response->successful()) {
            $response = $response->json();
            $medicamentos = Http::get('http://api3.v1.appomsv.com/medicamento');
            if ($medicamentos->successful()) {
                $medicamentos = $medicamentos->json();
                $medicamentos = Arr::pluck($medicamentos,'medicamento','id');
            } else {
                // Manejar error
                $error = $response->body();
                return dd($error);
            }
            // $recetas = Recetas::where('n_atencion', $atencion->id)->get();
            $recetas = [];
            $receta = new Recetas();
            return view('recetas.create',compact('id', 'medicamentos', 'receta', 'recetas'));
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
        $receta = new Recetas();
        $receta->n_cantidad = $request->n_cantidad;
        $receta->v_dosis = $request->v_dosis;
        $receta->n_medica = $request->n_medica;
        $receta->n_atencion = $request->n_atencion;

        $receta->save();

        return redirect()->route('recetas.create', ['id' => $receta->n_atencion])
            ->with('success', 'Receta de paciente se ha añadido satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recetas  $recetas
     * @return \Illuminate\Http\Response
     */
    public function show(Recetas $recetas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recetas  $recetas
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $receta = Recetas::find($id);
        $id = $receta->n_atencion;
        $medicamentos = Medicamentos::pluck('v_nombre','id');
        return view('Recetas.create',compact('id', 'medicamentos', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recetas  $recetas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recetas $recetas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recetas  $recetas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recetas $recetas)
    {
        //
    }
}
