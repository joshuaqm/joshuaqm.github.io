<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalificacionesController extends Controller
{
    public function index()
    {
        // Aquí podrías obtener las calificaciones desde tu base de datos
        //$calificaciones = [
            //['materia' => 'Matemáticas', 'calificacion' => 90],
            //['materia' => 'Ciencias', 'calificacion' => 85],
            //['materia' => 'Historia', 'calificacion' => 95],
            // ... más calificaciones
        //];
        
        //return view('calificaciones.index', compact('calificaciones'));
        return view('calificaciones');
    }
}
