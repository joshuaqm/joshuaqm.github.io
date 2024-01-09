<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrador = [
            'id' => 1,
            'name' => 'Administrador',
            'email' => 'administrador@correo.com',
            'email_verified_at' => NULL,
            'password' => bcrypt('admin'),
            'remember_token' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
            'role' => '1',
        ];
        
        DB::table('users')->insert($administrador);
    }
}
