<?php

namespace App\Http\Controllers;

class ConnectController extends Controller
{
    public function getLogin()
    {
        return view('connect.login');
    }
}
