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
        Schema::create('tipo_examen', function (Blueprint $table) {
            $table->string('CLAVE_EXAMEN', 40)->primary();
            $table->decimal('CALIFICACION', 10, 0);
            $table->string('GRADO_CURSO', 40);
            $table->string('TIPO', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_examen');
    }
};
