<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios', // Ajusta 'usuarios' al nombre de tu tabla
            'contrasena' => 'required|string|min:8',
            'permiso' => 'required|in:alumno,profesor,directora',
        ]);

        $user = User::create([
            'nombre' => $request->name,
            'correo' => $request->email,
            'contrasena' => Hash::make($request->password),
            // Añade los campos adicionales dependiendo del rol
            'CLAVE_USUARIO_ALU' => ($request->role === 'alumno') ? $someValue : null,
            'CLAVE_USUARIO_PROFE' => ($request->role === 'profesor') ? $someValue : null,
            'CLAVE_USUARIO_DIRECTORA' => ($request->role === 'directora') ? $someValue : null,
            // ...
        ]);

        // Añade cualquier redirección o lógica adicional después del registro
        if ($user) {
            return redirect('/')->with('success', '¡Registro exitoso!');
        } else {
            return back()->withErrors(['error' => 'Error al registrar usuario']);
        }
    }
}
