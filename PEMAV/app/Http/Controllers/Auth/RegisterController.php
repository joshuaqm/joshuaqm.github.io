<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
{
    // Validación de campos (ajústalo según tus necesidades)
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:usuarios,CORREO',
        'password' => 'required|string|min:8|confirmed',
        'role_id' => 'required|string',
        'fecha_inscripcion' => 'required|date',
        // ... otros campos que desees validar
    ]);

    try {
        // Crear el usuario en la tabla 'usuarios'
        $usuario = User::create([
            'CORREO' => $request->email,
            'PERMISO' => $request->role_id,
            'CONTRASENA' => Hash::make($request->password),
            // ... otros campos que desees guardar en 'usuarios'
        ]);

        // Crear el registro de alumno en la tabla 'alumnos'
        if ($request->role_id === '0') {
            Alumnos::create([
                'CLAVE_USUARIO_ALU' => $usuario->id,
                'FECHA_INSCRIPCION' => $request->fecha_inscripcion,
                'NOMBRE_ALU' => $request->name,
                // ... otros campos que desees guardar en 'alumnos'
            ]);
        }

        return redirect()->route('home')->with('success', 'Usuario registrado exitosamente');
    } catch (\Exception $e) {
        return redirect()->route('register')->with('error', 'Error al registrar usuario');
    }
}
}
