<?php

namespace App\Http\Controllers;

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
        $response = Http::get('http://api3.v1.appomsv.com/cita/' . $id);
        $responseRecetas = Http::get('http://api3.v1.appomsv.com/cita-recetas/' . $id);
        if ($response->successful() && $responseRecetas->successful()) {
            $response = $response->json();
            $recetas = $responseRecetas->json();
            $medicamentos = Http::get('http://api3.v1.appomsv.com/medicamento');
            if ($medicamentos->successful()) {
                $medicamentos = $medicamentos->json();
                $medicamentos = Arr::pluck($medicamentos, 'medicamento', 'id');
            } else {
                // Manejar error
                $error = $response->body();
                return dd($error);
            }
            $receta = new Recetas();
            return view('recetas.create', compact('id', 'medicamentos', 'receta', 'recetas'));
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
        $response = Http::post('http://api3.v1.appomsv.com/receta', [
            'idCita' => $request->input('n_atencion'),
            'idMedicamento' => $request->input('n_medica'),
            'cantidad' => $request->input('n_cantidad'),
            'dosis' => $request->input('v_dosis'),
            'indicaciones' => $request->input('v_indicaciones'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('recetas.create', ['id' => $request->input('n_atencion')]);
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Recetas $recetas
     * @return \Illuminate\Http\Response
     */
    public function show(Recetas $recetas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Recetas $recetas
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recetas $recetas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recetas $recetas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Recetas $recetas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recetas $recetas)
    {
        //
    }
}
