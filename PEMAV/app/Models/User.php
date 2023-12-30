<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'CLAVE_USUARIO_ALU',
        'CLAVE_USUARIO_PROFE',
        'CLAVE_USUARIO_DIRECTORA',
        'PERMISO',
        // Agrega los campos adicionales según los roles
        // ...
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'CONTRASENA', // Agrega los campos que deseas ocultar
        // ...
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'PERMISO' => 'binary', // Ajusta los casts según los tipos de datos en la base de datos
        // ...
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios'; // Ajusta al nombre de tu tabla

    // Define relaciones, mutadores, accesores u otros métodos según sea necesario
    // ...
}
