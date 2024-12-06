<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class MisEmpredimientosController extends Controller
{
    public function index()
    {
        try {
            // Hacer la solicitud GET a la API sin usar token
            $response = Http::get('https://apiemprendelink-production-9272.up.railway.app/api/publicare');

            // Si la respuesta es exitosa
            if ($response->successful()) {
                // Obtener los datos de la respuesta
                $connections = $response->json()['data'] ?? [];
            } else {
                // En caso de error en la API, inicializar un arreglo vacío
                $connections = [];
            }

            // Retorna la vista con los emprendimientos
            return view('Views_gos/ListaMisEmprendiientos', compact('connections'));
        } catch (\Exception $e) {
            // Manejo de errores
            return back()->with('error', 'No se pudieron cargar los emprendimientos: ' . $e->getMessage());
        }
    }
}
