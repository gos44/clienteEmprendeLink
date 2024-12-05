<?php



// este es el originaaaaaaaaallllllllllllllll

namespace App\Http\Controllers\Controllers_Sebas;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class inicio_de_sesion_usuariocontroller extends Controller
{
    public function index()
    {
        return view('Views_Sebas.iniciar_sesion_usuario');
    }
//de aqui para abajo ya no es original es solo una pruenbva
public function login(Request $request)
{
    // Validar los datos de entrada
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required|in:entrepreneur,investor'
    ]);

    try {
        // Preparar datos para la autenticación
        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role']
        ];

        // Enviar solicitud POST a la API para autenticar al usuario
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/login', $credentials);

        // Depuración: Log de respuesta completa
        Log::info('Respuesta de login', [
            'status' => $response->status(),
            'body' => $response->body(),
            'successful' => $response->successful()
        ]);

        if ($response->successful()) {
            // Intentar obtener el token de diferentes formas
            $responseData = $response->json();
            $token = $responseData['token'] ??
                     $responseData['access_token'] ??
                     $response->json()['data']['token'] ??
                     null;

            if ($token) {
                // Guardar token de múltiples formas
                $request->session()->put('token', $token);
                $request->session()->put('user_token', $token);
                \Session::put('token', $token);

                // Verificar si el rol es entrepreneur o investor y redirigir a la vista correspondiente
                $role = $validated['role']; // Obtenemos el rol del usuario

                if ($role == 'entrepreneur') {
                    // Redirigir al home de entrepreneur
                    return redirect()->route('Home_Usuario.index')
                        ->with('success', 'Usuario registrado con éxito. Ahora puedes iniciar sesión.')
                        ->with('token', $token); // Pasar token adicional
                } elseif ($role == 'investor') {
                    // Redirigir al home de investor
                    return redirect()->route('Home_inversor.index')
                        ->with('success', 'Usuario inversor registrado con éxito. Ahora puedes iniciar sesión.')
                        ->with('token', $token); // Pasar token adicional
                }
            } else {
                // Log si no se encuentra el token
                Log::error('No se encontró el token en la respuesta', [
                    'response_data' => $responseData
                ]);

                return back()->withErrors([
                    'error' => 'No se pudo obtener el token de autenticación'
                ]);
            }
        }

        // Si el login no es exitoso
        return back()->withErrors([
            'error' => 'Credenciales incorrectas. Por favor, revisa tus datos.',
            'response' => $response->body()
        ]);

    } catch (\Exception $e) {
        // Manejo de errores
        Log::error('Error de inicio de sesión', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return back()->withErrors([
            'error' => 'Ocurrió un error inesperado. Por favor, intenta de nuevo.'
        ]);
    }
}
}
