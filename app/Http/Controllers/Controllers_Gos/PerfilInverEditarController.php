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

        // Verificar si el token está en la sesión
        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            // Hacer la solicitud para obtener los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/investors/{investor}');

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                // Si la respuesta es exitosa, obtener los datos del usuario
                $userData = $response->json();

                // Extraer el ID del investor
                $investorId = $userData['id'] ?? null;

                return view('Views_gos/EditarPerfilInversionista', [
                    'user' => $userData,
                    'investor_id' => $investorId
                ]);
            } else {
                // Si la respuesta es fallida, devolver mensaje de error con código 401
                return response()->json(['error' => 'Respuesta fallida de la API.'], 401);
            }
        } catch (\Exception $e) {
            // Si ocurre un error inesperado, devolver mensaje de error con el detalle
            return response()->json(['error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $investor)
    {
        // Obtener el token desde la sesión
        $token = session('token', null);

        // Verificar si el token está en la sesión
        if (!$token) {
            return redirect()->back()->withErrors(['error' => 'Token no encontrado en la sesión.']);
        }

        // Validar los datos del formulario
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
            // Hacer la solicitud para actualizar el investor
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->put("https://apiemprendelink-production-9272.up.railway.app/api/investors/{$investor}", $validatedData);

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                return redirect()->route('perfilInver.edit')->with('success', 'Perfil actualizado correctamente.');
            } else {
                // Si la respuesta es fallida, devolver mensaje de error
                return redirect()->back()->withErrors(['error' => 'Error al actualizar el perfil: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            // Si ocurre un error inesperado, devolver mensaje de error
            return redirect()->back()->withErrors(['error' => 'Error inesperado: ' . $e->getMessage()]);
        }
    }
}
