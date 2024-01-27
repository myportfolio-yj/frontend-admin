<?php

namespace App\Http\Controllers;

use App\Models\Atenciones;
use App\Models\Diagnosticos;
use App\Models\Historias;
use App\Models\Procedimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class HistoriasController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = $_GET['id'];
        $historia = new Historias();
        $responseDiagnostico = Http::get('http://api3.v1.appomsv.com/diagnostico');
        $responseProcedimiento = Http::get('http://api3.v1.appomsv.com/procedimiento');
        if ($responseDiagnostico->successful() && $responseProcedimiento->successful()) {
            $diagnostico = $responseDiagnostico->json();
            $procedimiento = $responseProcedimiento->json();
            $diagnostico = Arr::pluck($diagnostico,'diagnostico','id');
            $procedimiento = Arr::pluck($procedimiento,'procedimiento','id');
            return view('Historias.create',compact('historia', 'diagnostico','procedimiento', 'id'));
        } else {
            // Manejar error
            $error = $responseDiagnostico->body();
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
        request()->validate(Historias::$rules);

        $response = Http::post('http://api3.v1.appomsv.com/atencion', [
            'idCita' => $request->input('n_atencion'),
            'motivo' => $request->input('v_motivo'),
            'peso' => $request->input('n_peso'),
            'temperatura' => $request->input('n_temp'),
            'frecuenciaRespiratoria' => $request->input('n_frecresp'),
            'frecuenciaCardiaca' => $request->input('n_freccard'),
            'idDiagnostico' => $request->input('n_diagnos'),
            'idProcedimiento' => $request->input('n_procedimiento'),
            'detalleDiagnostico' => $request->input('v_detdiagnos'),
            'detalleProcedimiento' => $request->input('v_detproced'),
            'cerrado' => false
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Atenciones');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historias  $historias
     * @return \Illuminate\Http\Response
     */
    public function show(Historias $historias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historias  $historias
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $historia = new Historias();
        $response = Http::get('http://api3.v1.appomsv.com/atencion/'.$id);
        if ($response->successful()) {
            $response = $response->json();
            $historia->v_motivo = $response['motivo'];
            $historia->n_peso = $response['peso'];
            $historia->n_temp = $response['temperatura'];
            $historia->n_frecresp = $response['frecuenciaRespiratoria'];
            $historia->n_freccard = $response['frecuenciaCardiaca'];
            $historia->n_diagnos = $response['idDiagnostico'];
            $historia->v_nombre = $response['idProcedimiento'];
            $historia->v_detdiagnos = $response['detalleDiagnostico'];
            $historia->v_detproced = $response['detalleProcedimiento'];
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
        $responseDiagnostico = Http::get('http://api3.v1.appomsv.com/diagnostico');
        $responseProcedimiento = Http::get('http://api3.v1.appomsv.com/procedimiento');
        if ($responseDiagnostico->successful() && $responseProcedimiento->successful()) {
            $diagnostico = $responseDiagnostico->json();
            $procedimiento = $responseProcedimiento->json();
            $diagnostico = Arr::pluck($diagnostico,'diagnostico','id');
            $procedimiento = Arr::pluck($procedimiento,'procedimiento','id');
            return view('Historias.create',compact('historia', 'diagnostico','procedimiento', 'id'));
        } else {
            // Manejar error
            $error = $responseDiagnostico->body();
            return dd($error);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historias  $historias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $historia = Historias::find($id);

        $historia->v_motivo = $request->v_motivo;
        $historia->n_peso = $request->n_peso;
        $historia->n_temp = $request->n_temp;
        $historia->n_frecresp = $request->n_frecresp;
        $historia->n_freccard = $request->n_freccard;
        $historia->v_detproced = $request->v_detproced;
        $historia->n_atencion = $request->n_atencion;
        $historia->n_diagnos = $request->n_diagnos;
        $historia->v_detdiagnos = $request->v_detdiagnos;
        $historia->n_procedimiento = $request->n_procedimiento;

        $historia->save();

        return redirect()->route('atenciones')
            ->with('success', 'Historia creada satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historias  $historias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historias $historias)
    {
        //
    }
}
