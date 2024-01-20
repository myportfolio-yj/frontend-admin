<?php

namespace App\Http\Controllers;

use App\Models\Alergias;
use App\Models\Medicamentos;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Http;

class AlergiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com//alergia');
        if ($response->successful()) {
            $datos = $response->json();
            return view('alergias.index') ->with('alergias',$datos);
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
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/alergia');
        if ($response->successful() ) {
            $alergia = $response->json();
            return view('alergias.create', compact('alergia'));
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
        request()->validate(Alergias::$rules);
        $response = Http::post('https://clinicas-vet-fefebe4de883.herokuapp.com/alergia', [
            'alergia' => $request->input('alergia'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Alergias')
                ->with('success', 'Alergia creado con exito satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alergias  $alergias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alergias  $alergias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com//alergia/'.$id);
        if ($response->successful() ) {
            $alergia = $response->json();
            return view('alergias.edit', compact('alergia'));
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
     * @param  \App\Models\Alergias  $alergias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Alergias::$rules);
        $response = Http::put('https://mascota-vet-933796c48a6c.herokuapp.com//alergia/'.$id, [
            'alergia' => $request->input('alergia'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Alergias')
                ->with('success', 'Alergia actualizada satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alergias  $alergias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('https://mascota-vet-933796c48a6c.herokuapp.com//alergia/'.$id);
        if ($response->successful()) {
            return redirect()->route('Alergias')
                ->with('success', 'Alergia eliminado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
