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
        Schema::create('control_escolar', function (Blueprint $table) {
            $table->string('CLAVE_PERMISO', 40)->primary();
            $table->string('CLAVE_PROFES', 40)->index('CLAVE_PROFESORES_FK');
            $table->string('CLAVE_ALUMNOS', 40)->index('CLAVE_ALUMNOS_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_escolar');
    }
};
