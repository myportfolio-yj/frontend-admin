<?php

namespace App\Http\Controllers;

use App\Models\Clinicas;
use App\Models\Perfiles;
use App\Models\User;
use App\Models\UserDetalles;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/veterinario');
        if ($response->successful()) {
            $datos = $response->json();
            return view('user.index') ->with('users',$datos);
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
        $user = new User();
        $userDetalle = new UserDetalles();
        $clinicas = Clinicas::pluck('v_nomclin','id');
        $perfiles = Perfiles::pluck('v_decripc','id');
        return view('user.create', compact('user','userDetalle','clinicas','perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());
        $userDetalle = new UserDetalles();
        if( is_null($request->n_estatus) )
        {
            $userDetalle->n_estatus = 0;
        } else{
            $userDetalle->n_estatus = $request->n_estatus;
        }
        $userDetalle->v_telefono = $request->v_telefono;
        $userDetalle->v_codcolegio = $request->v_codcolegio;
        $userDetalle->n_perfil = $request->n_perfil;
        $userDetalle->n_clinica = $request->n_clinica;
        $userDetalle->n_user = $user->id;
        $userDetalle->save();

        return redirect()->route('Medicos.index')
            ->with('success', 'Medico creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      /*
        $user = User::find($id);
        return view('user.show', compact('user'));
      */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/veterinario/'.$id);
        $response2 = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/tipodocumento');
        if ($response->successful() && $response2->successful() ) {
            $user = $response->json();
            $tipoDoc = $response2->json();
            $tipoDoc = Arr::pluck($tipoDoc,'tipoDocumento','id');
            return view('user.edit', compact('user','tipoDoc'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(User::$rulesEdit);
        $response = Http::put('https://usuario-vet-38fce36b3b4d.herokuapp.com/veterinario/'.$id, [
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
            return redirect()->route('Medicos.index')
                ->with('success', 'Medico actualizado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    /*public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado satisfactoriamente');
    }
    */
}
