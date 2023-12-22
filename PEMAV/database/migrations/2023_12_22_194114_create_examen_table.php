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
        Schema::create('examen', function (Blueprint $table) {
            $table->string('CLAVE_EXAMEN_APLICADO', 40)->index('CLAVE_EXAMEN_APLICADO_FK');
            $table->string('CLAVE_ASIGNATURA_APLICA', 40)->index('CLAVE_ASIGNATURA_APLICA_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen');
    }
};
