<?php

namespace App\Http\Controllers;

use App\Models\Medicamentos;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;


class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/medicamento');
        if ($response->successful()) {
            $datos = $response->json();
            return view('medicamentos.index')->with('medicamentos', $datos);
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
    /*public function index()
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/medicamento');
        if ($response->successful()) {
            $medicamentos = $response->json();

            // Crear una instancia de Paginator manualmente
            $page = Paginator::resolveCurrentPage() ?: 1;
            $perPage = 10; // El número de elementos por página
            $items = collect($medicamentos);
            $total = $items->count();
            $slice = $items->slice(($page - 1) * $perPage, $perPage);
            $medicamentosPaginados = new LengthAwarePaginator($slice, $total, $perPage, $page, [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]);

            return view('medicamentos.index')->with('medicamentos', $medicamentosPaginados);
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/medicamento');
        if ($response->successful()) {
            $medicamento = $response->json();
            return view('medicamentos.create', compact('medicamento'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Medicamentos::$rules);
        $response = Http::post('https://clinicas-vet-fefebe4de883.herokuapp.com/medicamento', [
            'medicamento' => $request->input('medicamento'),
            'descripcion' => $request->input('descripcion'),
        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Medicamentos')
                ->with('success', 'Medicamento creado con exito.');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Medicamentos $medicamentos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Medicamentos $medicamentos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get('https://clinicas-vet-fefebe4de883.herokuapp.com/medicamento/' . $id);
        if ($response->successful()) {
            $medicamento = $response->json();
            return view('medicamentos.edit', compact('medicamento'));
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Medicamentos $medicamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Medicamentos::$rules);
        $response = Http::put('https://clinicas-vet-fefebe4de883.herokuapp.com/medicamento/' . $id, [
            'medicamento' => $request->input('medicamento'),
            'descripcion' => $request->input('descripcion'),

        ]);
        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('Medicamentos')
                ->with('success', 'Medicamento actualizada con exito.');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Medicamentos $medicamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete('https://clinicas-vet-fefebe4de883.herokuapp.com/medicamento/' . $id);
        if ($response->successful()) {
            return redirect()->route('Medicamentos')
                ->with('success', 'Medicamento eliminado con exito.');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }
}
