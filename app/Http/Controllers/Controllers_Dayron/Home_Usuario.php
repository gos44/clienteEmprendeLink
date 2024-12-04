<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home_Usuario extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user || $user->role !== 'entrepreneur') {
            return redirect()->route('iniciar_sesion_usuario.login')->withErrors('Acceso denegado.');
        }
    
        return view('Views_Dayron.Home_Usuario', compact('user'));
    }
    
}

