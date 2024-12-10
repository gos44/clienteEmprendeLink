<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PerfilInverEditarController extends Controller
{
    public function edit($id)
    {
        $token = session('token', null);

        if (!$token) {
            return response()->json(['error' => 'Token no encontrado en la sesión.'], 401);
        }

        try {
            // Hacer la solicitud para obtener datos del inversor
            $investorResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if (!$investorResponse->successful()) {
                return response()->json(['error' => 'No se pudo obtener información del inversor.'], 404);
            }

            // Obtener los datos del inversor
            $investorData = $investorResponse->json();

            // Asegúrate de que los datos estén bien estructurados
            $data = [
                'investor' => $investorData,
            ];

            // Pasar los datos a la vista
            return view('Views_gos/EditarPerfilInversionista', ['user' => $investorData]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage(),
            ], 500);
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

        // **Validación modificada para permitir la edición sin campos obligatorios**
        // Los campos no serán requeridos, pero se validarán si están presentes.
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',    // Cambiado a nullable
            'lastname' => 'nullable|string|max:255', // Cambiado a nullable
            'birth_date' => 'nullable|date',
            'email' => 'nullable|email|max:255',    // Cambiado a nullable
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'number' => 'nullable|string|max:20',
            'investment_number' => 'nullable|string', // Cambiado a nullable
            'document' => 'nullable|string',          // Cambiado a nullable
            'image' => 'nullable|image|max:2048'
        ]);

        // Preparar los datos para la actualización
        $updateData = [
            'name' => $validatedData['name'] ?? '',           // Si no se proporciona, enviar vacío
            'lastname' => $validatedData['lastname'] ?? '',   // Si no se proporciona, enviar vacío
            'birth_date' => $validatedData['birth_date'] ?? '', // Si no se proporciona, enviar vacío
            'email' => $validatedData['email'] ?? '',         // Si no se proporciona, enviar vacío
            'location' => $validatedData['location'] ?? '',   // Si no se proporciona, enviar vacío
            'phone' => $validatedData['phone'] ?? '',         // Si no se proporciona, enviar vacío
            'number' => $validatedData['number'] ?? '',       // Si no se proporciona, enviar vacío
            'investment_number' => $validatedData['investment_number'] ?? '', // Si no se proporciona, enviar vacío
            'document' => $validatedData['document'] ?? '',   // Si no se proporciona, enviar vacío
        ];

        // Manejar la imagen si se sube
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $updateData['image'] = base64_encode(file_get_contents($image->getRealPath()));
        }

        try {
            // Hacer la solicitud para actualizar el investor
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->put("https://apiemprendelink-production-9272.up.railway.app/api/investors/{$investor}", $updateData);

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                return redirect()->route('Home1.index')->with('success', 'Perfil actualizado correctamente.');
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
