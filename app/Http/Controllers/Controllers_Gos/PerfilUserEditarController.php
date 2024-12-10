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

    public function update(Request $request)
    {
        $token = session('token', null);

        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        // Prepara el payload con los datos del formulario
        $payload = [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'birth_date' => $request->input('birth_date'),
            'email' => $request->input('email'),
            'location' => $request->input('location'),
            'phone' => $request->input('phone'),
            'number' => $request->input('number'),
            'image' => $request->file('image'), // Si la API acepta imágenes
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->put("https://apiemprendelink-production-9272.up.railway.app/api/auth/update", $payload);

            if ($response->successful()) {
                return redirect()->route('perfilInver.index')->with('success', 'Perfil actualizado exitosamente.');
            } else {
                return back()->withErrors(['error' => 'No se pudo actualizar el perfil. Detalles: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al intentar actualizar el perfil: ' . $e->getMessage()]);
        }
    }

}
