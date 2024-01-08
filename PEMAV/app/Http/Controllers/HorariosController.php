<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    public function index()
    {
        // Obtener los horarios de clase del usuario autenticado
        $user = Auth::user();
        //$horarios = $user->horarios; // Asumiendo que los horarios están definidos en una relación en el modelo User
        //return view('horarios', ['horarios' => $horarios]);
        //return view('horarios', compact('horarios'));
        
        return view('horarios');
    }
}
