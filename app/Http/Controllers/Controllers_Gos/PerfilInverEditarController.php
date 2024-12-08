<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilInverEditarController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el token desde la sesión
        $token = session('token', null);

        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            // Hacer la solicitud para obtener los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if ($response->successful()) {
                $userData = $response->json();

                return view('Views_gos/PerfilInversionista', ['user' => $userData]);
            } else {
                return response()->json(['error' => 'Respuesta fallida de la API.'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        // Obtener el token desde la sesión
        $token = session('token', null);

        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            // Validar los datos recibidos del formulario
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                // Agrega aquí más campos según sea necesario
            ]);

            // Hacer la solicitud para actualizar los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->put('https://apiemprendelink-production-9272.up.railway.app/api/auth/update', $validatedData);

            if ($response->successful()) {
                return redirect()->route('perfilInver.index')
                    ->with('success', 'Perfil actualizado correctamente.');
            } else {
                return redirect()->back()->with('error', 'No se pudo actualizar el perfil. Inténtalo de nuevo.');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al intentar actualizar el perfil: ' . $e->getMessage()], 500);
        }
    }
}
