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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'birthdate' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'gender' => 'nullable|string|in:Masculino,Femenino',
        ]);

        try {
            // Obtener el usuario autenticado
            $user = Auth::user();

            // Actualizar los datos del usuario
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'birthdate' => $request->birthdate,
                'location' => $request->location,
                'phone' => $request->phone,
                'gender' => $request->gender,
            ]);

            return redirect()->back()->with('success', 'Perfil actualizado con éxito');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Ocurrió un error al actualizar el perfil.']);
        }
    }
}
