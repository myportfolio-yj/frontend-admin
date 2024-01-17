<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $response2 = Http::get('https://usuario-vet-38fce36b3b4d.herokuapp.com/tipodocumento');
        if ($response2->successful() ) {
            $tipoDoc = $response2->json();
            $tipoDoc = Arr::pluck($tipoDoc,'tipoDocumento','id');
            return view('user.create', compact('tipoDoc'));
        } else {
            // Manejar error
            $error = $response2->body();
            return dd($error);
        }
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
        $response = Http::post('https://usuario-vet-38fce36b3b4d.herokuapp.com/veterinario', [
            'codVeterinario' => $request->input('codVeterinario'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'celular' => $request->input('celular'),
            'fijo' => $request->input('fijo'),
            'email' => $request->input('email'),
            'idTipoDocumento' => $request->input('tipoDoc'),
            'documento' => $request->input('documento'),
            'password' => $request->input('documento'),
            'confirmarPassword' => $request->input('documento')
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Medicos.index')
                ->with('success', 'Medico creado con exito satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }

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
            'codVeterinario' => $request->input('codVeterinario'),
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
    public function destroy($id)
    {
        $response = Http::delete('https://usuario-vet-38fce36b3b4d.herokuapp.com/veterinario/'.$id);
        if ($response->successful()) {
            return redirect()->route('Medicos.index')
                ->with('success', 'Usuario eliminado satisfactoriamente');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
