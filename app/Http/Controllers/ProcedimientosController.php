<?php

namespace App\Http\Controllers;

use App\Models\Medicamentos;
use App\Models\Procedimientos;
use App\Models\User;
use App\Models\Vacunas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProcedimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com//procedimiento');
        if ($response->successful()) {
            $datos = $response->json();
            return view('procedimientos.index') ->with('procedimientos',$datos);
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
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com//procedimiento');
        if ($response->successful() ) {
            $procedimiento = $response->json();
            return view('procedimientos.create', compact('procedimiento'));
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
        request()->validate(Procedimientos::$rules);
        $response = Http::post('https://clinicas-vet-fefebe4de883.herokuapp.com//procedimiento', [
            'procedimiento' => $request->input('procedimiento'),
            'descripcion ' => $request->input('descripcion'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Procedimientos')
                ->with('success', 'Procedimiento creado con exito satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedimientos  $procedimientos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedimientos  $procedimientos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com//procedimiento/'.$id);
        if ($response->successful() ) {
            $procedimiento = $response->json();
            return view('procedimientos.edit', compact('procedimiento'));
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
     * @param  \App\Models\Procedimientos  $procedimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Procedimientos::$rules);
        $response = Http::put('https://clinicas-vet-fefebe4de883.herokuapp.com//procedimiento/'.$id, [
            'procedimiento' => $request->input('procedimiento'),
            'descripcion' => $request->input('descripcion'),

        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Procedimientos')
                ->with('success', 'Procedimiento actualizada satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedimientos  $procedimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('https://clinicas-vet-fefebe4de883.herokuapp.com//procedimiento/'.$id);
        if ($response->successful()) {
            return redirect()->route('Procedimientos')
                ->with('success', 'Procedimiento eliminado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
