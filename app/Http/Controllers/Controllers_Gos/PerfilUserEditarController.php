<?php
namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUserEditarController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el token desde la sesión
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
                return view('Views_gos/EditarPerfilUsuario', ['user' => $userData]);
            } else {
                return response()->json(['error' => 'Respuesta fallida de la API.'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $userId)
    {
        // Validación de datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'number' => 'nullable|string|max:20',
            'image' => 'nullable|image|max:2048', // Tamaño máximo de 2 MB
        ]);

        $token = session('token', null);

        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            // Preparar datos para enviar a la API
            $payload = $validatedData;

            // Si se cargó una imagen, manejarla
            if ($request->hasFile('image')) {
                $payload['image'] = base64_encode(file_get_contents($request->file('image')->getRealPath()));
            }

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->put("https://apiemprendelink-production-9272.up.railway.app/api/users/{$userId}", $payload);

            if ($response->successful()) {
                return redirect()->route('perfilUser.edit')->with('success', 'Perfil actualizado exitosamente.');
            } else {
                return back()->withErrors(['error' => 'No se pudo actualizar el perfil.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al intentar actualizar el perfil: ' . $e->getMessage()]);
        }
    }
}
