<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user(); // Obtener el usuario autenticado

        return view('perfil', ['user' => $user]);
    }
}
