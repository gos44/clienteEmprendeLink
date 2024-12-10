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

            // Ver contenido de la respuesta
            $investorData = $investorResponse->json();

            // Verificar si `user_id` existe
            if (!isset($investorData['user_id'])) {
                return redirect()->back()->withErrors(['error' => 'La respuesta de la API no contiene el campo "user_id".']);
            }

            $userId = $investorData['user_id'];

            // Obtener datos del usuario asociado
            $userResponse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get("https://apiemprendelink-production-9272.up.railway.app/api/users/{$userId}");

            if (!$userResponse->successful()) {
                return redirect()->back()->withErrors(['error' => 'No se pudo obtener información del usuario.']);
            }

            $userData = $userResponse->json();

            // Pasar los datos a la vista
            return view('Views_gos/EditarPerfilInversionista', [
                'user' => $userData, // Aquí pasas los datos del usuario a la vista
                'investor_id' => $id, // Pasa el ID del inversor si es necesario para la acción del formulario
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al intentar obtener los datos del perfil: ' . $e->getMessage()]);
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
            'image' => 'nullable|image|max:2048'
        ]);

        try {
            // Preparar los datos para enviar
            $updateData = [
                'name' => $validatedData['name'],
                'lastname' => $validatedData['lastname'],
                'birth_date' => $validatedData['birth_date'],
                'email' => $validatedData['email'],
                'location' => $validatedData['location'],
                'phone' => $validatedData['phone'],
                'number' => $validatedData['number']
            ];

            // Manejar la imagen si se sube
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $updateData['image'] = base64_encode(file_get_contents($image->getRealPath()));
            }

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
