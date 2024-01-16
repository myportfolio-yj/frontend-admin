<?php

namespace App\Http\Controllers;

use App\Models\Alergias;
use App\Models\Clientes;
use App\Models\TipoDoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class PeluquerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/peluquero');
        if ($response->successful()) {
            $datos = $response->json();
            return view('peluqueros.index') ->with('peluqueros',$datos);
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
        $cliente=new Clientes();
        $tipo=TipoDoc::pluck('v_decripc','id');
        return view('clientes.create',compact('cliente','tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Clientes::$rules);

        $cliente = Clientes::create($request->all());

        return redirect()->route('Clientes')
            ->with('success', 'Cliente creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Clientes::find($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peluqueros  $peluqueros
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/peluquero/'.$id);
        $response2 = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/tipodocumento');
        if ($response->successful() && $response2->successful() ) {
            $peluquero = $response->json();
            $tipoDoc = $response2->json();
            $tipoDoc = Arr::pluck($tipoDoc,'tipoDocumento','id');
            return view('peluqueros.edit', compact('peluquero','tipoDoc'));
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
     * @param  \App\Models\Peluqueros  $peluqueros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Peluqueros::$rules);
        $response = Http::put('https://usuario-vet-38fce36b3b4d.herokuapp.com/peluquero/'.$id, [
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'celular' => $request->input('celular'),
            'fijo' => $request->input('fijo'),
            'email' => $request->input('email'),
            'idTipoDocumento' => $request->input('tipoDoc'),
            'documento' => $request->input('documento')
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Peluqueros')
                ->with('success', 'Peluquero actualizado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peluqueros  $peluqueros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peluqueros $peluqueros)
    {
        //
    }
}
