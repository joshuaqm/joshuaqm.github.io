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
        Schema::create('asignatura_profe', function (Blueprint $table) {
            $table->string('CLAVE_ASIGNATURA_IMPARTIDA', 40)->index('CLAVE_ASIGNATURA_IMPARTIDA_FK');
            $table->string('CLAVE_PROF_IMPARTE', 40)->index('CLAVE_PROF_IMPARTE_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura_profe');
    }
};
