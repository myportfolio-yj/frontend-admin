<?php

namespace App\Http\Controllers;

use App\Models\Especies;
use App\Models\Procedimientos;
use App\Models\Razas;
use App\Models\User;
use App\Models\Vacunas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Termwind\Components\Raw;

class RazasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com//raza');
        if ($response->successful()) {
            $datos = $response->json();
            return view('razas.index') ->with('razas',$datos);
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
        $raza=new Razas();
        $medico=User::pluck('name','id');
        $especie=Especies::pluck('v_decripc','id');
        return view('razas.create',compact('raza','medico','especie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Razas::$rules);
        $id = Auth::id();
        $razas['v_nombre'] = $request['v_nombre'];
        $razas['v_apuntes'] = $request['v_apuntes'];
        $razas['n_especie'] = $request['n_especie'];
        $razas['a_n_iduser'] = $id; /*** Este valor hay que cambiarlo por el usuario autenticado**/
        $razas['n_estado'] = 1;
        Razas::create($razas);

        return redirect()->route('razas')
            ->with('success', 'Raza creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Razas  $razas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $raza = Razas::find($id);
        return view('razas.show', compact('raza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Razas  $razas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com//raza/'.$id);
        $response2 = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com//especie');
        if ($response->successful() ) {
            $raza = $response->json();
            $tipoEsp = $response2->json();
            $tipoEsp = Arr::pluck($tipoEsp,'especie','id');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Razas  $razas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Razas::$rules);
        $response = Http::put('https://mascota-vet-933796c48a6c.herokuapp.com/raza/'.$id, [
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
     * @param  \App\Models\Razas  $razas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Razas $razas)
    {
        //
    }
}
