<?php

namespace App\Http\Controllers\Controllers_Dayron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Visitar_Emprendimiento_Inversor extends Controller
{
    public function index()
    {
        // // Simulación de datos que se pueden utilizar en la vista
        // $connections = [
        //     // Ejemplo de datos
        //     ['name' => 'Connection 1', 'description' => 'Description of connection 1'],
        //     ['name' => 'Connection 2', 'description' => 'Description of connection 2']
        // ];Views_Dayron

        // Retorna la vista 'Perfil' con los datos de prueba
        return view('Pruebas_gos.Visitar_Emprendimiento_Inversor');
    }
}
