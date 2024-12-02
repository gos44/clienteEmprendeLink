<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class MisEmpredimientosController extends Controller
{
    public function index()
    {
        // Hacer la solicitud GET a la API para obtener todos los emprendimientos
        $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/publicare');

        // Si la respuesta es exitosa
        if ($response->successful()) {
            // Obtener los datos del cuerpo de la respuesta
            $connections = $response->json();
        } else {
            // En caso de error, inicializar el arreglo vacío
            $connections = [];
        }

        // Retorna la vista con los emprendimientos
        return view('Views_gos/ListaMisEmprendiientos', compact('connections'));
    }
}
