<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaAlumnos extends Model
{
    use HasFactory;
    protected $table = 'lista_alumnos';

    protected $fillable =[
        'id_lista_alumnos',
        'id_grupo',
        'id_alumno',
    ]

    public $timestamps = false;
}
