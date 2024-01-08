<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $table = 'asignatura';

    public $timestamps = false;

    protected $fillable = [
        'id_asignatura',
        'nombre_asignatura',
    ];
}
