<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class CrearUsuariosController extends Controller
{
    public function index()
    {
        return view('vistas-administrador.crear-usuarios');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' =>$request->role,
        ]);

        event(new Registered($user));

        // No iniciar sesión automáticamente después de registrarse
        // Auth::login($user);

        // Redireccionar a la vista de registro sin redireccionar a ninguna página
        return redirect()->route('crear-usuarios')->with('success', 'Usuario creado exitosamente');
    }

    public function verUsuarios(Request $request)
    {
        $alumnos = User::where('role', '0')->get();
        $administradores = User::where('role', '1')->get();
        $profesores = User::where('role', '2')->get();

        $role = $request->input('role'); // Obtener el valor del filtro de rol desde la solicitud

        if ($role !== null) {
            $users = User::where('role', $role)->get(); // Filtrar usuarios por el rol especificado
        } else {
            $users = User::all(); // Obtener todos los usuarios si no se proporciona un rol específico
        }

        return view('vistas-administrador.crear-usuarios', compact('administradores', 'profesores', 'alumnos', 'users'));
    }



    public function eliminarUsuario(Request $request)
    {
        $request->validate([
            'user' => ['required', 'exists:users,id'], // Asegura que el usuario exista en la base de datos
        ]);

        $userId = $request->input('user');
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            return redirect()->route('crear-usuarios')->with('success', 'Usuario eliminado exitosamente.');
        } else {
            return redirect()->route('crear-usuarios')->with('error', 'No se pudo encontrar el usuario.');
        }
    }


}
