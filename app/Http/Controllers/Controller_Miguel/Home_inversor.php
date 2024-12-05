<?php

namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Home_inversor extends Controller
{
    public function __construct()
    {
        // Aplica el middleware de autenticación a este controlador
        $this->middleware('auth');
    }

    public function index()
    {
        // Verifica si el usuario tiene el rol "inversionista"
        if (Auth::user()->role !== 'inversionista') {
            // Redirige al usuario si no tiene el rol correcto
            return redirect()->route('Home1.index')->with('error', 'No tienes permiso para acceder a esta página.');
        }

        // Retorna la vista solo si el usuario tiene el rol "inversionista"
        return view('views_Miguel.home_inversor');
    }
}
