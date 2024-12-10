<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilInverEditarController extends Controller
{
    public function edit($id)
    {
        $token = session('token', null);

        if (!$token) {
            return redirect()->route('login')->withErrors(['error' => 'Token no encontrado en la sesión.']);
        }

        try {
            // Hacer la solicitud para obtener datos del inversor
            $investorResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if (!$investorResponse->successful()) {
                return redirect()->back()->withErrors(['error' => 'No se pudo obtener información del inversor.']);
            }

            // Obtener los datos del inversor
            $investorData = $investorResponse->json();

            // Pasar los datos a la vista
            return view('Views_gos/EditarPerfilInversionista', ['user' => $investorData]);

        } catch (\Exception $e) {
            // Devolver un mensaje de error genérico para el usuario sin hacer que se vea el mensaje rojo
            return redirect()->back()->withErrors(['error' => 'Error al intentar obtener los datos del perfil. Por favor, intente más tarde.']);
        }
    }

    public function update(Request $request, $investor)
    {
        $token = session('token', null);

        // Verificar si el token está en la sesión
        if (!$token) {
            return redirect()->back()->withErrors(['error' => 'Token no encontrado en la sesión.']);
        }

        // Validación de los datos
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'number' => 'nullable|string|max:20',
            'investment_number' => 'nullable|string',
            'document' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Preparar los datos para la actualización
        $updateData = [
            'name' => $validatedData['name'] ?? '',
            'lastname' => $validatedData['lastname'] ?? '',
            'birth_date' => $validatedData['birth_date'] ?? '',
            'email' => $validatedData['email'] ?? '',
            'location' => $validatedData['location'] ?? '',
            'phone' => $validatedData['phone'] ?? '',
            'number' => $validatedData['number'] ?? '',
            'investment_number' => $validatedData['investment_number'] ?? '',
            'document' => $validatedData['document'] ?? '',
        ];

        // Manejar la imagen si se sube
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $updateData['image'] = base64_encode(file_get_contents($image->getRealPath()));
        }

        try {
            // Hacer la solicitud para actualizar el perfil
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->put("https://apiemprendelink-production-9272.up.railway.app/api/investors/{$investor}", $updateData);

            // Verificar si la respuesta es exitosa
            if ($response->successful()) {
                return redirect()->route('Home1.index')->with('success', 'Perfil actualizado correctamente.');
            } else {
                // Si la respuesta falla, mostrar un mensaje de error sin el mensaje rojo
                return redirect()->back()->withErrors(['error' => 'Error al actualizar el perfil. Intente nuevamente.']);
            }

        } catch (\Exception $e) {
            // Manejo de error general
            return redirect()->back()->withErrors(['error' => 'Ocurrió un error al intentar actualizar el perfil. Por favor, intente más tarde.']);
        }
    }
}
