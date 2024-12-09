<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PerfilInverEditarController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el token desde la sesión
        $token = session('token', null);

        if (!$token) {
            return redirect()->route('login')->with('error', 'Por favor inicie sesión');
        }

        try {
            // Hacer la solicitud para obtener los datos del usuario
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            if ($response->successful()) {
                $userData = $response->json();
                return view('Views_gos.PerfilEditarInversionista', ['user' => $userData]);
            } else {
                return redirect()->route('login')->with('error', 'No se pudieron obtener los datos del perfil');
            }
        } catch (\Exception $e) {
            Log::error('Error al obtener datos de perfil: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Ocurrió un error al cargar el perfil');
        }
    }

    public function update(Request $request)
    {
        $token = session('token', null);

        if (!$token) {
            return redirect()->back()->with('error', 'Por favor inicie sesión');
        }

        // Validar los datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email',
            'location' => 'required|string',
            'phone' => 'required|string|size:10',
            'gender' => 'required|string|in:Masculino,Femenino,Otro',
            'document' => 'required|string|min:10|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Preparar los datos para enviar a la API
            $userData = $validator->validated();

            // Manejar la carga de certificado de inversión si existe
            if ($request->hasFile('investment_certificate')) {
                $certificate = $request->file('investment_certificate');
                $userData['investment_certificate'] = base64_encode(file_get_contents($certificate->getRealPath()));
            }

            // Realizar la solicitud de actualización a la API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ])->put('https://apiemprendelink-production-9272.up.railway.app/api/auth/update-profile', $userData);

            if ($response->successful()) {
                return redirect()->route('perfilInver.index')
                    ->with('success', 'Perfil actualizado exitosamente');
            } else {
                Log::error('Error en la actualización del perfil: ' . $response->body());
                return redirect()->back()
                    ->with('error', 'No se pudo actualizar el perfil')
                    ->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Excepción al actualizar perfil: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Ocurrió un error inesperado')
                ->withInput();
        }
    }
}
