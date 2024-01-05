<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id_usuario', 
        'correo',
        'nombre',
        'contrasena',
        'permiso'
        // ... otros campos que desees guardar en 'usuarios'
    ];

    protected $hidden = [
        'contrasena',
        // ...
    ];

    protected $casts = [
        'permiso' => 'int',
        
        // ...
    ];

    protected $table = 'usuarios';

    // Define relaciones, mutadores, accesores u otros métodos según sea necesario
    // ...
}
