<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturaSeeder extends Seeder
{
    public function run()
    {
        $asignaturas = [
            ['id_asignatura'=> 1,'nombre_asignatura' => 'Español'],
            ['id_asignatura'=> 2,'nombre_asignatura' => 'Matematicas'],
            ['id_asignatura'=> 3,'nombre_asignatura' => 'HabilidadMatematica'],
            ['id_asignatura'=> 4,'nombre_asignatura' => 'HabilidadVerbal'],
            ['id_asignatura'=> 5,'nombre_asignatura' => 'Fisica'],
            ['id_asignatura'=> 6,'nombre_asignatura' => 'Quimica'],
            ['id_asignatura'=> 7,'nombre_asignatura' => 'Biologia'],
            ['id_asignatura'=> 8,'nombre_asignatura' => 'Historia'],
            ['id_asignatura'=> 9,'nombre_asignatura' => 'Geografia'],
            ['id_asignatura'=> 10,'nombre_asignatura' => 'FormacionCivicaYEtica'],         
        ];

        DB::table('asignatura')->insert($asignaturas);
    }
}
