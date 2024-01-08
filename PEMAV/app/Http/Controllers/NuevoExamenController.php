<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\User;

class NuevoExamenController extends Controller
{
    public function index()
    {
        return view('nuevo-examen');
    }
    public function mostrarVista()
    {
    // Obtener los alumnos de la base de datos
    $usuarios = User::all(); 

    // Pasar los datos a la vista con el nombre correcto de variable
    return view('nuevo-examen', ['usuarios' => $usuarios]);
}
}
