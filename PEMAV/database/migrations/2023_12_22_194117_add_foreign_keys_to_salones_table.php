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
        Schema::table('salones', function (Blueprint $table) {
            $table->foreign(['CLAVE_ASIGNATURA_DADA'], 'CLAVE_ASIGNATURA_DADA_FK')->references(['CLAVE_ASIGNATURA'])->on('asignatura')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['CLAVE_PROFE_DA'], 'CLAVE_PROFE_DA_FK')->references(['CLAVE_PROF'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salones', function (Blueprint $table) {
            $table->dropForeign('CLAVE_ASIGNATURA_DADA_FK');
            $table->dropForeign('CLAVE_PROFE_DA_FK');
        });
    }
};
