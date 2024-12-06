<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class MisEmpredimientosController extends Controller
{
    public function index()
    {
        try {
            // Verificar que el usuario esté autenticado
            $user = Auth::user();

            // Elimina esta parte si deseas que la vista funcione sin estar autenticado
            if (!$user) {
                // Aquí ya no redirigimos a login, pero si es necesario puedes agregar un mensaje de advertencia
                return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
            }

            // Hacer la solicitud GET a la API con el token de autenticación
            $response = Http::withToken($user->api_token) // Usa el token de acceso del usuario
                ->get('https://apiemprendelink-production-9272.up.railway.app/api/myentrepreneurships');

            // Si la respuesta es exitosa
            if ($response->successful()) {
                // Obtener los datos de la respuesta
                $connections = $response->json()['data'] ?? []; // Asegúrate de que la clave 'data' exista
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
