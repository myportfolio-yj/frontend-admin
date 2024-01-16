<?php

namespace App\Http\Controllers;

use App\Models\Alergias;
use App\Models\Medicamentos;
use App\Models\User;
use App\Models\Vacunas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class VacunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com//vacuna');
        if ($response->successful()) {
            $datos = $response->json();
            return view('vacunas.index') ->with('vacunas',$datos);
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
        $vacuna=new Vacunas();
        $medico=User::pluck('name','id');
        return view('vacunas.create',compact('vacuna','medico'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vacunas::$rules);
        $id = Auth::id();
        $vacunas['v_nombre'] = $request['v_nombre'];
        $vacunas['v_apuntes'] = $request['v_apuntes'];
        $vacunas['n_expira'] = $request['n_expira'];
        $vacunas['a_n_iduser'] =$id; /*** Este valor hay que cambiarlo por el usuario autenticado**/
        $vacunas['n_estado'] = 1;
        Vacunas::create($vacunas);

        return redirect()->route('Vacunas')
            ->with('success', 'Vacuna creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacunas  $vacunas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacuna = Vacunas::find($id);

        return view('vacunas.show', compact('vacuna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacunas  $vacunas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://mascota-vet-933796c48a6c.herokuapp.com//vacuna/'.$id);
        if ($response->successful() ) {
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacunas  $vacunas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Vacunas::$rules);
        $response = Http::put('https://mascota-vet-933796c48a6c.herokuapp.com//vacuna/'.$id, [
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
     * @param  \App\Models\Vacunas  $vacunas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacunas $vacunas)
    {
        //
    }
}
