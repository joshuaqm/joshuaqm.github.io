<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Método para mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Otros métodos del controlador...
}
