<?php


namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el token de sesión
        $token = session('token') ? trim(session('token')) : null;

        // Si no hay token, redirigir al login
        if (!$token) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        try {
            // Intentar obtener los datos del usuario con el token
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Verifica si la respuesta es exitosa
            if ($response->successful()) {
                // Si la respuesta es exitosa, obtienes los datos del usuario
                $userData = $response->json()['user_data'];

                // Si estás en modo depuración, puedes ver los datos de la respuesta sin interrumpir
                // con dd() pero de todas formas ver los datos
                $shouldDebug = true;  // Cambiar a false cuando no quieras ver el dd()

                if ($shouldDebug) {
                    // Mostrar la respuesta en la consola para que no interrumpa el flujo
                    // en lugar de usar dd() directamente.
                    // Esto también podría ser útil para depurar.
                    \Log::info('Respuesta de la API:', $response->json());
                }

                // Enviar los datos a la vista
                return view('perfilUser.index', ['user' => $userData]);
            }

            // Si la respuesta no es exitosa, redirigir al login
            return redirect()->route('login')->with('error', 'Sesión expirada');

        } catch (\Exception $e) {
            // En caso de error, redirigir al login
            return redirect()->route('login')->with('error', 'Error al validar sesión');
        }
    }
}
