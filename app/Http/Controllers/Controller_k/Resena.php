<?php

namespace App\Http\Controllers\Controller_k;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Resena extends Controller
{
    public function Resena()
    {
        // // Simulación de datos que se pueden utilizar en la vista
        // $connections = [
        //     // Ejemplo de datos
        //     ['name' => 'Connection 1', 'description' => 'Description of connection 1'],
        //     ['name' => 'Connection 2', 'description' => 'Description of connection 2']
        // ];

        // Retorna la vista 'Perfil' con los datos de prueba
        return view('kevin.Reseña');
    }
   
}
