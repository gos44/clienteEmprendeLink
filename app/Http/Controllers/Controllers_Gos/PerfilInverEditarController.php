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

    // Aquí ya no hacemos validación de los campos, porque no nos importa si están vacíos
    $updateData = $request->only([
        'name',
        'lastname',
        'birth_date',
        'email',
        'location',
        'phone',
        'number',
        'investment_number',
        'document',
        'image'  // Si es que es parte del formulario y lo deseas subir
    ]);

    try {
        // Si se ha subido una imagen, la codificamos en base64
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
