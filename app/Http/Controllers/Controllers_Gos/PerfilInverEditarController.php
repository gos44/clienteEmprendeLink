<?php
namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilInverEditarController extends Controller {
    public function index(Request $request)     {
        $token = session('token', null);

        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if ($response->successful()) {
                $userData = $response->json();

                // IMPORTANTE: Pasar explícitamente el ID
                return view('Views_gos/EditarPerfilInversionista', [
                    'user' => $userData,
                    'user_id' => $userData['id']  // Añade esta línea
                ]);
            } else {
                return response()->json(['error' => 'Respuesta fallida de la API.'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)     {
        $token = session('token', null);

        if (!$token) {
            return redirect()->back()->withErrors(['error' => 'Token no encontrado en la sesión.']);
        }

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
            ])->put("https://apiemprendelink-production-9272.up.railway.app/api/auth/update/{$id}", $validatedData);

            if ($response->successful()) {
                return redirect()->route('perfilInver.edit')->with('success', 'Perfil actualizado correctamente.');
            } else {
                return redirect()->back()->withErrors(['error' => 'Error al actualizar el perfil: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error inesperado: ' . $e->getMessage()]);
        }
    }
}
