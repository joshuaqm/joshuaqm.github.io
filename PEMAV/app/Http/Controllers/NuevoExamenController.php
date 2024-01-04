<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;

class NuevoExamenController extends Controller
{
    public function index()
    {
        return view('nuevo-examen');
    }
    public function mostrarVista()
{
    // Obtener los alumnos de la base de datos
    $alumnos = Alumnos::all(); // Esto asume que tienes un modelo Alumnos

    // Pasar los datos a la vista con el nombre correcto de variable
    return view('nuevo-examen', ['alumnos' => $alumnos]);
}
}
