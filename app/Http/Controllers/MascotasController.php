<?php

namespace App\Http\Controllers;

use App\Models\Alergias;
use App\Models\Diagnosticos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/mascota');
        if ($response->successful()) {
            $datos = $response->json();
            return view('mascotas.index') ->with('mascotas',$datos);
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
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/mascota');
        $response2 = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/sexo');
        if ($response->successful() ) {
            $mascota = $response->json();
            $tipoSex = $response2->json();
            $tipoSex = Arr::pluck($tipoSex,'sexo','id');
            return view('mascotas.create', compact('mascota','tipoSex'));
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
        request()->validate(Mascotas::$rules);
        $response = Http::post('https://mascota-vet-933796c48a6c.herokuapp.com/mascota', [
            'codIdentificacion' => $request->input('codIdentificacion'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'fechaNacimiento' => $request->input('fechaNacimiento'),
            'esterilizado' => $request->input('esterilizado'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('mascotas')
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
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/mascota/'.$id);
        $response2 = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com/sexo');
        if ($response->successful() ) {
            $mascota = $response->json();
            $tipoSex = $response2->json();
            $tipoSex = Arr::pluck($tipoSex,'sexo','id');
            return view('mascotas.edit', compact('mascota','tipoSex'));
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
        request()->validate(Mascotas::$rules);
        $response = Http::put('https://mascota-vet-933796c48a6c.herokuapp.com/mascota/'.$id, [
            'codIdentificacion' => $request->input('codIdentificacion'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'fechaNacimiento' => $request->input('fechaNacimiento'),
            'esterilizado' => $request->input('esterilizado'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('mascotas')
                ->with('success', 'Mascota actualizada satisfactoriamente');
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
    public function destroy(Alergias $alergias)
    {
        //
    }
}
