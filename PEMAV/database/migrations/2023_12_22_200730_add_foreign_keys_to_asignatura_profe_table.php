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
        Schema::table('asignatura_profe', function (Blueprint $table) {
            $table->foreign(['CLAVE_ASIGNATURA_IMPARTIDA'], 'CLAVE_ASIGNATURA_IMPARTIDA_FK')->references(['CLAVE_ASIGNATURA'])->on('asignatura')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['CLAVE_PROF_IMPARTE'], 'CLAVE_PROF_IMPARTE_FK')->references(['CLAVE_PROF'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asignatura_profe', function (Blueprint $table) {
            $table->dropForeign('CLAVE_ASIGNATURA_IMPARTIDA_FK');
            $table->dropForeign('CLAVE_PROF_IMPARTE_FK');
        });
    }
};
