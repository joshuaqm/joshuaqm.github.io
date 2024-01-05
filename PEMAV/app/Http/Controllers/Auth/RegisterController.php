<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_usuario' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'nombre' => ['required', 'string', 'max:255'],
            'contrasena' => ['required', 'string', 'min:8', 'confirmed'],
            'permiso' => ['required', 'int'],
        ]);
    }

    public function register(Request $request)
    {
        //try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:usuarios,correo',
                'password' => 'required|string|min:8|confirmed',
                'permiso' => 'required|string',
                // ... otros campos que desees validar
            ]);

            $usuario = User::create([
                'correo' => $request->email,
                'nombre' => $request->name,
                'contrasena' => Hash::make($request->password),
                'permiso' => $request->permiso,
                // ... otros campos que desees guardar en 'usuarios'
            ]);
            $usuario->save();
            dd($usuario);
            if ($request->role_id === '0') {
                // No se está usando el campo 'id_alumno', considera si realmente lo necesitas aquí
                $alumno = Alumnos::create([
                    // 'id_alumno' => $request->id_usuario, // Esto debería venir del modelo Alumnos
                    // ... otros campos que desees guardar en 'alumnos'
                ]);
            }

            return redirect()->route('home')->with('success', 'Usuario registrado exitosamente');
        //} catch (\Exception $e) {
           // return redirect()->route('register')->with('error', 'Error al registrar usuario');
        }
}
