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
        Schema::table('curso_profe', function (Blueprint $table) {
            $table->foreign(['CLAVE_CURSO_IMPARTIDO'], 'CLAVE_CURSO_IMPARTIDO_FK')->references(['CLAVE_CURSO'])->on('curso')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['CLAVE_PROFE_IMPARTE'], 'CLAVE_PROFE_IMPARTE_FK')->references(['CLAVE_PROF'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curso_profe', function (Blueprint $table) {
            $table->dropForeign('CLAVE_CURSO_IMPARTIDO_FK');
            $table->dropForeign('CLAVE_PROFE_IMPARTE_FK');
        });
    }
};
