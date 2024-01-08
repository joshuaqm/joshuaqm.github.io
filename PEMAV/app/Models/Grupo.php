<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';

    public $timestamps = false;

    protected $fillable = [
        'id_grupo',
        'id_asignatura',
        'id_profesor',
        'salon',
        'horario_inicio',
        'horario_fin',
        'dias',
    ];

    protected $casts = [
        'horario_inicio' => 'datetime',
        'horario_fin' => 'datetime',
    ];
}
