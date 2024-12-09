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
        try {
            // Obtener el token desde la sesión (sin validación obligatoria)
            $token = session('token', null);

            // Si no hay token, intentar de todos modos cargar datos
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . ($token ?? ''),
                'Accept' => 'application/json',
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Cargar la vista independientemente de la respuesta
            $userData = $response->successful() ? $response->json() : [];

            return view('Views_gos.PerfilEditarInversionista', ['user' => $userData]);

        } catch (\Exception $e) {
            // Log del error pero sin bloquear la carga de la vista
            Log::error('Error al obtener datos de perfil: ' . $e->getMessage());

            // Cargar vista con datos vacíos
            return view('Views_gos.PerfilEditarInversionista', ['user' => []]);
        }
    }

    public function update(Request $request)
    {
        try {
            // Obtener token sin validación estricta
            $token = session('token', null);

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

            // Realizar solicitud a API sin importar autenticación
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . ($token ?? ''),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->put('https://apiemprendelink-production-9272.up.railway.app/api/auth/update-profile', $validatedData);

            // Manejar respuesta sin redirigir
            if ($response->successful()) {
                return back()->with('success', 'Perfil actualizado exitosamente');
            } else {
                return back()->with('error', 'No se pudo actualizar el perfil')->withInput();
            }

        } catch (\Exception $e) {
            // Log del error pero sin bloquear
            Log::error('Error al actualizar perfil: ' . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado')->withInput();
        }
    }
}
