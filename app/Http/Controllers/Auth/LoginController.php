<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        try {
            $response = Http::post(env('API1') . '/login/veterinario', [
                'email' => $request->input("email"),
                'password' => $request->input("password")
            ]);
            if ($response->successful()) {
                $data = json_decode((string)$response->getBody(), true);
                if(empty($data)) {
                    return redirect()->back()->with('error', 'Your credentials are incorrect. Please try again');
                }
                $user = new \App\Models\User();
                $user->id = $data['id'];
                $user->name = $data['nombres'];
                $user->email = $data['email'];
                $user->codVeterinario = $data["codVeterinario"];
                $user->apellidos = $data["apellidos"];
                $user->celular = $data["celular"];
                $user->fijo = $data["fijo"];
                $user->tipoDocumento = $data["tipoDocumento"];
                $user->documento = $data["documento"];
                $request->session()->put('user', $user);
                Auth::login($user);
                return redirect()->intended('mascotas');
            } else {
                if ($response->status() === 400) {
                    return redirect()->back()->with('error', 'Invalid request. Please enter a username or a password.');
                } elseif ($response->status() === 401) {
                    return redirect()->back()->with('error', 'Your credentials are incorrect. Please try again');
                }
                return redirect()->back()->with('error', 'Something went wrong on the server.');
            }
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return redirect()->back()->with('error', 'Invalid request. Please enter a username or a password.');
            } elseif ($e->getCode() === 401) {
                return redirect()->back()->with('error', 'Your credentials are incorrect. Please try again');
            }
            return redirect()->back()->with('error', 'Something went wrong on the server.');
        }
    }
}
