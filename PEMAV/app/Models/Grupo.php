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
        'lista_alumnos',
    ];

    protected $casts = [
        'horario_inicio' => 'datetime',
        'horario_fin' => 'datetime',
    ];

    public function alumnos()
    {
        return $this->belongsToMany(User::class, 'lista_alumnos', 'id_grupo', 'id_alumno');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'id_asignatura');
    }


    public function profesor()
    {
        return $this->belongsTo(User::class, 'id_profesor');
    }
}
