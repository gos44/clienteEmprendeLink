<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PerfilUsuarioController extends Controller
{
    public function index(Request $request)
    {
        // Intentar obtener el token de múltiples fuentes
        $token = $request->session()->get('token') ??
                 $request->session()->get('user_token') ??
                 \Session::get('token') ??
                 $request->get('token') ??
                 $request->bearerToken() ??
                 $request->header('Authorization') ??
                 null;

        if (!$token) {
            return response()->json([
                'error' => 'No se encontró token de autenticación',
                'status' => 'unauthorized',
                'debug' => [
                    'session_data' => $request->session()->all(),
                    'request_all' => $request->all()
                ]
            ], 401);
        }

        try {
            // Hacer la solicitud a la API con el token
            $response = Http::withToken($token)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ])
                ->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Depuración: Imprimir detalles completos de la respuesta
            \Log::info('Respuesta de API de perfil:', [
                'status' => $response->status(),
                'body' => $response->body(),
                'headers' => $response->headers()
            ]);

            if ($response->successful()) {
                $userData = $response->json();

                // Devolver JSON completo para inspección
                return response()->json([
                    'status' => 'success',
                    'user_data' => $userData,
                    'token_used' => substr($token, 0, 10) . '...' // Mostrar parte del token para verificación
                ]);
            } else {
                return response()->json([
                    'error' => 'No se pudo obtener los datos del usuario',
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'token_debug' => substr($token, 0, 10) . '...'
                ], $response->status());
            }

        } catch (\Exception $e) {
            // Manejo de errores detallado
            return response()->json([
                'error' => 'Error al procesar la solicitud',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}
