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
    //CLAVE_ALUMNO	CLAVE_CURSO_DADO	QR	AVANCE_CREDITOS	FECHA_INSCRIPCION	NOMBRE_ALU	

    protected $fillable = [
        'CLAVE_ALUMNO',
        'CLAVE_CURSO_DADO',
        'AVANCE_CREDITOS',
        'FECHA_INSCRIPCION',
        'NOMBRE_ALU'
        // ... otros campos que desees guardar en 'alumnos'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumnos'; // Ajusta al nombre de tu tabla

    // Define relaciones, mutadores, accesores u otros métodos según sea necesario
    // ...
}
