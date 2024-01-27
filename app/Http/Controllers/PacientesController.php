<?php

namespace App\Http\Controllers;

use App\Mail\Alert;
use App\Models\Clientes;
use App\Models\Mascotas;
use App\Models\Razas;
use App\Models\Sexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Mascotas::paginate();

        return view('pacientes.index', compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $pacientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paciente = new Mascotas();

        $sexo = Sexo::pluck('v_decripc', 'id');
        $raza = Razas::pluck('v_nombre', 'id');
        $cliente = Clientes::pluck('v_nombre', 'id');

        $user = Auth::user();
        $primerCaracter = $user->detalle->clinica->v_nomclin[0];
        $month = date("m");
        $year = date("Y");
        $data = Mascotas::latest('id')->first();
        if (is_null($data)) {
            $data = 1;
        } else {
            $data = $data->id + 1;
        }

        $paciente->v_identifica = $primerCaracter . $month . $year . $data;

        return view('pacientes.create', compact('paciente', 'sexo', 'raza', 'cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mascotas::$rules);

        $paciente = Mascotas::create($request->all());

        return redirect()->route('pacientes')
            ->with('success', 'Paciente creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Mascotas $pacientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Mascotas::find($id);
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Mascotas $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Mascotas::find($id);
        $sexo = Sexo::pluck('v_decripc', 'id');
        $raza = Razas::pluck('v_nombre', 'id');
        $cliente = Clientes::pluck('v_nombre', 'id');
        return view('pacientes.editar', compact('paciente', 'sexo', 'raza', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mascotas $pacientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Mascotas::$rules);
        $paciente = Mascotas::find($id);
        $paciente->update($request->all());
        return redirect()->route('pacientes')
            ->with('success', 'Cliente actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Mascotas $pacientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascotas $pacientes)
    {
        //
    }

    public function noLogueado($id)
    {
        $paciente = Mascotas::find($id);
        return view('pacienteNoLogueado.show', compact('paciente'));
    }

    public function sendAlert(Request $request)
    {
        request()->validate(Mascotas::$rules2);
        $identificador = $request->identificador;
        $phone = $request->phone;
        $paciente = Mascotas::where('v_identifica', $identificador)->first();
        $cliente = $paciente->cliente;
        Mail::to($cliente->v_correo)->send(new Alert($cliente->v_correo, compact('cliente', 'phone', 'paciente')));
        return redirect()->route('noLogueado', ['id' => $paciente->id]);
    }
}
