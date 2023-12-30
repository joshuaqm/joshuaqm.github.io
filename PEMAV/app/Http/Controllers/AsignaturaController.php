<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    // Método para mostrar el formulario de inicio de sesión
    public function index()
    {
        return view('asignatura');
    }

    //public function showAsignatura($nombreAsignatura) {
        //return view('asignatura')->with('nombreAsignatura', $nombreAsignatura);
    //}
    

    // Otros métodos del controlador...
}
