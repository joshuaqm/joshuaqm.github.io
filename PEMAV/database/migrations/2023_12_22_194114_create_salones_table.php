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
        Schema::create('salones', function (Blueprint $table) {
            $table->string('CLAVE_SALON', 40)->primary();
            $table->string('CLAVE_ASIGNATURA_DADA', 40)->index('CLAVE_ASIGNATURA_DADA_FK');
            $table->string('CLAVE_PROFE_DA', 40)->index('CLAVE_PROFE_DA_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salones');
    }
};
