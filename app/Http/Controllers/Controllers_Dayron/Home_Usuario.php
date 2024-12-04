<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Home_Usuario extends Controller
{
    public function index()
    {
        // Recuperar el token de la sesión
        $token = session('auth_token');

        if (!$token) {
            return redirect()->route('login')->withErrors(['error' => 'Token no encontrado, por favor inicie sesión.']);
        }

        return view('Views_Dayron.Home_Usuario', compact('token'));
    }
}
