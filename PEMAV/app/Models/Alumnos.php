<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id_alumno',

    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumnos'; // Ajusta al nombre de tu tabla

}
