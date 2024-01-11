<?php

namespace App\Http\Controllers\appoMSV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $response = Http::post('https://usuario-vet-38fce36b3b4d.herokuapp.com/login/veterinario', [
            'email' => $request->input("email"),
            'password' => $request->input("password")
        ]);

        if ($response->successful()) {
            $datos = $response->json();
            return redirect()->route('cita');
        } else {
            // Manejar error
            $error = $response->body();
            return dd($error);
        }
    }

}
