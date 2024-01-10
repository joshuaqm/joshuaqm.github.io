<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    protected $table = 'calificaciones';
    public $timestamps = false;

    protected $primaryKey = 'id_examen';

    protected $fillable = [
        'id_examen',
        'id_asignatura',
        'id_grupo',
        'id_alumno',
        'numero_examen',
        'fecha_examen',
        'calificacion',
    ];

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'id_asignatura');
    }

    public function alumno()
    {
        return $this->belongsTo(User::class, 'id_alumno');
    }
}
