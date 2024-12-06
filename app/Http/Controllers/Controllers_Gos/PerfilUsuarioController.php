<?php


namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener token de sesión y limpiarlo
        $token = session('token') ? trim(session('token')) : null;

        // Si no hay token, redirigir a login
        if (!$token) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        try {
            // Intentar obtener los datos del usuario con el token
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Flag para decidir si ejecutar dd()
            $shouldDebug = true;  // Cambia esto a true para que dd() se ejecute

            // Si el flag es true, hacemos un dd() para depuración
            if ($shouldDebug) {
                dd($response->status(), $response->json());
            }

            // Verifica si la respuesta es exitosa
            if ($response->successful()) {
                $userData = $response->json()['user_data'];

                // Enviar los datos a la vista
                return view('perfilUser.index', ['user' => $userData]);
            }

            // Si falla, redirigir a login
            return redirect()->route('login')->with('error', 'Sesión expirada');

        } catch (\Exception $e) {
            // En caso de error, redirigir a login
            return redirect()->route('login')->with('error', 'Error al validar sesión');
        }
    }
}
