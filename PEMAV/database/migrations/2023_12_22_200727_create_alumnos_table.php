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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('CLAVE_ALUMNO', 40)->primary();
            $table->string('CLAVE_CURSO_DADO', 40)->index('CLAVE_CURSO_DADO_FK');
            $table->binary('QR');
            $table->decimal('AVANCE_CREDITOS', 30, 0);
            $table->date('FECHA_INSCRIPCION');
            $table->string('NOMBRE_ALU', 40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
};
