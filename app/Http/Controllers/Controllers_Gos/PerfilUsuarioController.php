<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PerfilController extends Controller
{
    /**
     * Mostrar el perfil del usuario
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function perfil(Request $request)
    {
        // Verificar si hay token de autenticación
        if (!$request->session()->has('token')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        $token = $request->session()->get('token');

        try {
            // Intentar obtener los datos del usuario con el token
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Depurar el estado y el contenido de la respuesta
            dd($response->status(), $response->json());

            // Si la respuesta es exitosa, mostrar perfil
            if ($response->successful()) {
                $userData = $response->json()['user_data'];
                return view('perfilUser.index', ['user' => $userData]);
            }

            // Si falla, redirigir a login
            return redirect()->route('login')->with('error', 'Sesión expirada');

        } catch (\Exception $e) {
            // Registrar el error para depuración
            Log::error('Error al obtener datos de perfil: ' . $e->getMessage());

            // En caso de error, redirigir a login
            return redirect()->route('login')->with('error', 'Error al validar sesión');
        }
    }

    /**
     * Cerrar sesión del usuario
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Eliminar token de la sesión
        $request->session()->forget('token');

        // Redirigir al login
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }

    /**
     * Mostrar formulario de edición de perfil
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function editarPerfil(Request $request)
    {
        // Verificar si hay token de autenticación
        if (!$request->session()->has('token')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        $token = $request->session()->get('token');

        try {
            // Intentar obtener los datos del usuario con el token
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->post('https://apiemprendelink-production-9272.up.railway.app/api/auth/me');

            // Si la respuesta es exitosa, mostrar formulario de edición
            if ($response->successful()) {
                $userData = $response->json()['user_data'];
                return view('perfilUser.editar', ['user' => $userData]);
            }

            // Si falla, redirigir a login
            return redirect()->route('login')->with('error', 'Sesión expirada');

        } catch (\Exception $e) {
            // Registrar el error para depuración
            Log::error('Error al obtener datos para edición de perfil: ' . $e->getMessage());

            // En caso de error, redirigir a login
            return redirect()->route('login')->with('error', 'Error al validar sesión');
        }
    }

    /**
     * Actualizar datos de perfil
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function actualizarPerfil(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'celular' => 'required|string|max:20',
            // Agregar más validaciones según sea necesario
        ]);

        // Verificar si hay token de autenticación
        if (!$request->session()->has('token')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        $token = $request->session()->get('token');

        try {
            // Enviar datos actualizados a la API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->put('https://apiemprendelink-production-9272.up.railway.app/api/auth/actualizar-perfil', [
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'celular' => $request->input('celular'),
                // Agregar más campos según sea necesario
            ]);

            // Si la actualización es exitosa
            if ($response->successful()) {
                return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente');
            }

            // Si falla, mostrar error
            return redirect()->back()->with('error', 'No se pudo actualizar el perfil');

        } catch (\Exception $e) {
            // Registrar el error para depuración
            Log::error('Error al actualizar perfil: ' . $e->getMessage());

            // En caso de error, redirigir al formulario de edición
            return redirect()->back()->with('error', 'Error al actualizar el perfil');
        }
    }
}
