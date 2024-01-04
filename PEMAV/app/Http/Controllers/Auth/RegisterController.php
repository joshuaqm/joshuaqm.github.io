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
    

    //try {
        // Crear el usuario en la tabla 'usuarios''
        //CLAVE_USUARIO_ALU	CLAVE_USUARIO_PROFE	CLAVE_USUARIO_DIRECTORA
        $usuario = User::create([
            'CLAVE_USUARIO_ALU' => '1',
            'CLAVE_USUARIO_PROFE' => '1',
            'CLAVE_USUARIO_DIRECTORA' => '1',
            'CORREO' => $request->email,
            'PERMISO' => $request->role_id,
            'CONTRASENA' =>$request->password,
            // ... otros campos que desees guardar en 'usuarios'
        ]);
        //dd($usuario);
        $usuario->save();
        // Crear el registro de alumno en la tabla 'alumnos'
        if ($request->role_id === '0') {
            //CLAVE_ALUMNO	CLAVE_CURSO_DADO AVANCE_CREDITOS	FECHA_INSCRIPCION	NOMBRE_ALU	

            $alumno=Alumnos::create([
                'CLAVE_ALUMNO' => $usuario->id,
                'CLAVE_CURSO_DADO' => $request->clave_curso_dado,
                'AVANCE_CREDITOS' => $request->avance_creditos,
                'FECHA_INSCRIPCION' => $request->fecha_inscripcion,
                'NOMBRE_ALU' => $request->name,
                // ... otros campos que desees guardar en 'alumnos'
            ]);
            $alumno->save();
        }

       return redirect()->route('home')->with('success', 'Usuario registrado exitosamente');
    //} catch (\Exception $e) {
    //    return redirect()->route('register')->with('error', 'Error al registrar usuario');
    //}
    }
}
