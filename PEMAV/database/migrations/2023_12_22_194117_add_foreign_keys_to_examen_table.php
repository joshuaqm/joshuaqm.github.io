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
        Schema::table('examen', function (Blueprint $table) {
            $table->foreign(['CLAVE_ASIGNATURA_APLICA'], 'CLAVE_ASIGNATURA_APLICA_FK')->references(['CLAVE_ASIGNATURA'])->on('asignatura')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['CLAVE_EXAMEN_APLICADO'], 'CLAVE_EXAMEN_APLICADO_FK')->references(['CLAVE_EXAMEN'])->on('tipo_examen')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examen', function (Blueprint $table) {
            $table->dropForeign('CLAVE_ASIGNATURA_APLICA_FK');
            $table->dropForeign('CLAVE_EXAMEN_APLICADO_FK');
        });
    }
};
