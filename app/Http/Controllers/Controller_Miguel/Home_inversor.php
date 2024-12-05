<?php

namespace App\Http\Controllers\Controller_Miguel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Home_inversor extends Controller
{
    public function __construct()
    {
        // Aplica el middleware de autenticación
        $this->middleware('auth');
    }

    public function index()
    {
        // Verifica si el usuario tiene el rol de inversionista
        if (Auth::user()->role !== 'inversionista') {
            // Redirige al usuario a una vista específica si no tiene permisos
            return redirect()->route('Home1.index')->with('error', 'No tienes permiso para acceder a esta página.');
        }

        // Retorna la vista para los usuarios con el rol "inversionista"
        return view('views_Miguel.home_inversor');
    }
}
