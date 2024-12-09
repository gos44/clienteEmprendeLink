<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class PerfilInverEditarController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el token desde la sesión
        $token = session('token', null);

        // Log detallado
        Log::info('Intentando obtener datos de usuario', [
            'token_presente' => !empty($token),
            'token_longitud' => $token ? strlen($token) : 'N/A'
        ]);

        if (!$token) {
            Log::error('No se encontró token en la sesión');
            return redirect()->route('login')->with('error', 'Sesión expirada');
        }

        try {
            // Hacer la solicitud para obtener los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Log de la respuesta
            Log::info('Respuesta de la API', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                $userData = $response->json();
                return view('Views_gos.PerfilEditarInversionista', ['user' => $userData]);
            } else {
                Log::error('Respuesta fallida de la API', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                // Manejar diferentes tipos de errores
                return back()->with('error', 'No se pueden obtener los datos del usuario');
            }
        } catch (\Exception $e) {
            Log::error('Excepción al obtener datos de perfil', [
                'mensaje' => $e->getMessage(),
                'clase' => get_class($e),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->with('error', 'Ocurrió un error al recuperar los datos');
        }
    }
    public function update(Request $request)
    {
        // Obtener token sin validación estricta
        $token = session('token', null);

        try {
            // Validar los datos localmente
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'birthdate' => 'required|date',
                'email' => 'required|email',
                'location' => 'required|string',
                'phone' => 'required|string|size:10',
                'gender' => 'required|string|in:Masculino,Femenino,Otro',
                'document' => 'required|string|min:10|max:15',
            ]);

            // Realizar solicitud a API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->put('https://apiemprendelink-production-9272.up.railway.app/api/auth/update-profile', $validatedData);

            // Manejar respuesta
            if ($response->successful()) {
                return back()->with('success', 'Perfil actualizado exitosamente');
            } else {
                Log::error('Error en actualización de perfil', ['response' => $response->body()]);
                return back()->with('error', 'No se pudo actualizar el perfil')->withInput();
            }

        } catch (\Exception $e) {
            Log::error('Error al actualizar perfil', [
                'mensaje' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Ocurrió un error inesperado')->withInput();
        }
    }
}
