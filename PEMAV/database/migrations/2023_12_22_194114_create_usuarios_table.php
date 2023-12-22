<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('CLAVE_USUARIO_ALU', 40)->index('CLAVE_USUARIO_ALU_FK');
            $table->string('CLAVE_USUARIO_PROFE', 40)->index('CLAVE_USUARIO_PROFE_FK');
            $table->string('CLAVE_USUARIO_DIRECTORA', 40)->index('CLAVE_USUARIO_DIRECTORA_FK');
            $table->string('CORREO', 40);
            $table->binary('PERMISO');
            $table->string('CONTRASENA', 40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
