<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilInverEditarController extends Controller
{
    // Método para mostrar el perfil del usuario
    public function index(Request $request)
    {
        $token = session('token', null);

        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if ($response->successful()) {
                $userData = $response->json();
                return view('Views_gos/EditarPerfilInversionista', ['user' => $userData]);
            } else {
                return response()->json([
                    'error' => 'Respuesta fallida de la API.',
                    'details' => $response->json() // Información del error
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()
            ], 500);
        }
    }

    // Método para actualizar el perfil del usuario
    public function update(Request $request)
    {
        $token = session('token', null);

        if (!$token) {
            return redirect()->back()->withErrors(['error' => 'Token no encontrado en la sesión.']);
        }

        // Validación de datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'email' => 'required|email|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'number' => 'nullable|string|max:20',
        ]);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->put('https://apiemprendelink-production-9272.up.railway.app/api/auth/update', $validatedData);

            if ($response->successful()) {
                return redirect()->route('perfilInver.index')->with('success', 'Perfil actualizado correctamente.');
            } else {
                return redirect()->back()->withErrors([
                    'error' => 'Error al actualizar el perfil.',
                    'details' => $response->json() // Información detallada del error
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Error inesperado: ' . $e->getMessage()
            ]);
        }
    }
}
