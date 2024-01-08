<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;

class CalendarioController extends Controller
{
    public function index()
    {
        //$asistencias = Asistencia::all();

        // Formatear los datos para FullCalendar.js
        //$events = [];
        //foreach ($asistencias as $asistencia) {
          //  $events[] = [
          //      'title' => $asistencia->nombre, 
          //      'start' => $asistencia->fecha, 
          //  ];
        //}

        //return view('calendario.index', compact('events'));
        return view('calendario');
        
    }
}
