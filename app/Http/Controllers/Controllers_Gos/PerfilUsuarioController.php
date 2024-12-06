<?php


namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
  // Obtener el token de sesión
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

                // Registrar el estado de la respuesta y el contenido para depuración
                \Log::info('Estado de la respuesta:', ['status' => $response->status()]);
                \Log::info('Contenido de la respuesta:', ['body' => $response->body()]);

                // Si la respuesta es exitosa, obtener los datos del usuario
                if ($response->successful()) {
                    $userData = $response->json()['user_data'];

                    // Registrar los datos del usuario para ver si se están obteniendo correctamente
                    \Log::info('Datos del usuario:', ['user' => $userData]);

                    // Enviar los datos a la vista
                    return view('perfilUser.index', ['user' => $userData]);
                }

                // Si la respuesta no es exitosa, redirigir al login
                return redirect()->route('login')->with('error', 'Sesión expirada');

            } catch (\Exception $e) {
                // En caso de error, registrar el error y redirigir al login
                \Log::error('Error al obtener datos del usuario:', ['error' => $e->getMessage()]);
                return redirect()->route('login')->with('error', 'Error al validar sesión');
            }
        }
    }
