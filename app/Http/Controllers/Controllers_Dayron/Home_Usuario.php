<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Home_Usuario extends Controller
{
    public function __construct()
    {
        // Aplica el middleware de autenticación a todas las acciones de este controlador
        $this->middleware('auth');
    }

    public function index()
    {
        // Aquí puedes agregar cualquier lógica que necesites antes de retornar la vista

        // Retorna la vista 'Home_Usuario'
        return view('Views_Dayron.Home_Usuario');
    }
}

