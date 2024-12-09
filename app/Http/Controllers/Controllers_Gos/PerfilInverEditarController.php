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
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email',
            'location' => 'required|string',
            'phone' => 'required|string|size:10',
            'gender' => 'required|string',
            'document' => 'required|string',
        ]);

        // Actualizar el usuario
        $user = Auth::user(); // Obtener el usuario autenticado
        $user->update($validated); // Actualiza con los datos validados

        // Si se sube un archivo de certificado
        if ($request->hasFile('investment_certificate')) {
            // Procesar el archivo aquí
        }

        // Redirigir con éxito
        return redirect()->route('perfilInver.edit')->with('success', 'Perfil actualizado con éxito.');
    }
}
