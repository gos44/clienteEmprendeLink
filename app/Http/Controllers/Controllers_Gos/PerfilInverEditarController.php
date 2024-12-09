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

            // Imprimir token para depuración
            Log::info('Token obtenido: ' . $token);

            // Si no hay token, intentar de todos modos cargar datos
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . ($token ?? ''),
                'Accept' => 'application/json',
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Imprimir respuesta para depuración
            Log::info('Respuesta de la API: ' . json_encode($response->json()));

            // Cargar la vista con los datos correctos
            $userData = $response->successful() ? $response->json() : [];

            return view('View_gos/PerfilInversionista', ['user' => $userData]);

        } catch (\Exception $e) {
            // Log del error con más detalles
            Log::error('Error al obtener datos de perfil: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());

            // Cargar vista con datos vacíos
            return view('View_gos/PerfilInversionista', ['user' => []]);
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

            // Imprimir datos validados para depuración
            Log::info('Datos validados: ' . json_encode($validatedData));

            // Realizar solicitud a API sin importar autenticación
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . ($token ?? ''),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->put('https://apiemprendelink-production-9272.up.railway.app/api/auth/update-profile', $validatedData);

            // Imprimir respuesta de la API para depuración
            Log::info('Respuesta de actualización: ' . json_encode($response->json()));

            // Manejar respuesta sin redirigir
            if ($response->successful()) {
                return back()->with('success', 'Perfil actualizado exitosamente');
            } else {
                // Imprimir detalles del error
                Log::error('Error en actualización: ' . $response->body());
                return back()->with('error', 'No se pudo actualizar el perfil: ' . $response->body())->withInput();
            }

        } catch (\Exception $e) {
            // Log del error con más detalles
            Log::error('Error al actualizar perfil: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            return back()->with('error', 'Ocurrió un error inesperado: ' . $e->getMessage())->withInput();
        }
    }
}
