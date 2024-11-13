<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Simulación de datos que se pueden utilizar en la vista
        $connections = [
            // Ejemplo de datos
            ['name' => 'Connection 1', 'description' => 'Description of connection 1'],
            ['name' => 'Connection 2', 'description' => 'Description of connection 2']
        ];

        // Retorna la vista 'Perfil' con los datos de prueba
        return view('Views_gos/index', compact('connections'));
    }
}
