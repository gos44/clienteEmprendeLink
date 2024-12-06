<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class MisEmpredimientosController extends Controller
{
    public function index()
    {
        // Depurar si el usuario está autenticado
        dd(Auth::user());  // Veremos si tenemos un usuario válido

        try {
            // Verificar que el usuario esté autenticado
            $user = Auth::user();

            if (!$user) {
                // Esto nos permitirá saber si el usuario no está autenticado
                return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
            }

            // Comprobar el token antes de enviarlo a la API
            dd($user->api_token);  // Verificamos el token antes de hacer la solicitud

            // Hacer la solicitud GET a la API con el token de autenticación
            $response = Http::withToken($user->api_token) // Usa el token de acceso del usuario
                ->get('https://apiemprendelink-production-9272.up.railway.app/api/myentrepreneurships');

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
