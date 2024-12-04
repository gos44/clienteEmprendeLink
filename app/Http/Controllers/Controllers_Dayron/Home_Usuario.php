<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home_Usuario extends Controller
{
    public function __construct()
    {
        // Aplica el middleware de autenticación, si quieres asegurarte que solo los usuarios autenticados puedan acceder
        $this->middleware('guest'); // Esto asegura que solo los no autenticados puedan acceder a la página Home1
    }

    public function index()
    {
        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            // Si está autenticado, redirige al perfil del usuario
            return redirect()->route('Home_Usuario.index');
        }

        // Si no está autenticado, retorna la vista de Home1 para registro/login
        return view('Home1');
    }
}

