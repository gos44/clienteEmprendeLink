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

        // Verificar si el token está en la sesión
        if (!$token) {
            Log::error('No se encontró token en la sesión');
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            // Hacer la solicitud para obtener los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                // Si la respuesta es exitosa, obtener los datos del usuario
                $userData = $response->json();

                // Cambiar a la vista correcta de edición de perfil
                return view('Views_gos.PerfilEditarInversionista', ['user' => $userData]);
            } else {
                Log::error('Respuesta fallida de la API', ['response' => $response->body()]);
                return response()->json(['error' => 'Respuesta fallida de la API.'], 401);
            }
        } catch (\Exception $e) {
            Log::error('Error al obtener datos de perfil', [
                'mensaje' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()], 500);
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
