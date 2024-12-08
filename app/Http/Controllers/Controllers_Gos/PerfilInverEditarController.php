<?php

namespace App\Http\Controllers\Controllers_Gos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para obtener el usuario autenticado
use Illuminate\Support\Facades\Storage; // Para manejar archivos
use App\Models\User; // Modelo del usuario (ajusta esto si el modelo tiene otro nombre)

class PerfilInverEditarController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Retornar la vista con los datos del usuario
        return view('Views_gos/EditarPerfilInversionista', compact('user'));
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'location' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'gender' => 'required|in:Masculino,Femenino,Otro',
            'document' => 'required|numeric|digits_between:10,15',
            'investment_experience_file' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Actualizar los datos del usuario
        $user->name = $request->name;
        $user->birthdate = $request->birthdate;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->document = $request->document;

        // Manejar el archivo de experiencia de inversión
        if ($request->hasFile('investment_experience_file')) {
            // Eliminar archivo anterior si existe
            if ($user->investment_experience_file) {
                Storage::delete($user->investment_experience_file);
            }
            // Guardar nuevo archivo
            $path = $request->file('investment_experience_file')->store('investment_experiences');
            $user->investment_experience_file = $path;
        }

        // Guardar los cambios
        $user->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('perfilInver.index')->with('success', 'Perfil actualizado exitosamente');
    }
}
