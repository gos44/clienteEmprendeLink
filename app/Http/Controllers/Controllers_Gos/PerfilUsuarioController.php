<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;


class PerfilUsuarioController extends Controller
{
    public function index()
    {
        $url = "https://apiemprendelink-production-9272.up.railway.app/api/Entrepreneurs/1?included=user";
        $response = Http::get($url);

        if ($response->successful()) {
            // Retorna directamente el JSON para depuración
            return response()->json($response->json(), 200);
        } else {
            // En caso de error, retorna el mensaje del error
            return response()->json([
                'error' => 'No se pudieron cargar los datos del perfil',
                'details' => $response->json() // Incluye más detalles del error si están disponibles
            ], $response->status());
        }
    }
}