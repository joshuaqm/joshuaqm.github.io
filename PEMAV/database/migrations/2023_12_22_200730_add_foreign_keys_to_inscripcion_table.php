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
        Schema::table('inscripcion', function (Blueprint $table) {
            $table->foreign(['CLAVE_ALUMNO_INSCRITO'], 'CLAVE_ALUMNO_INSCRITO_FK')->references(['CLAVE_ALUMNO'])->on('alumnos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['CLAVE_CURSO'], 'CLAVE_CURSO_FK')->references(['CLAVE_CURSO'])->on('curso')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscripcion', function (Blueprint $table) {
            $table->dropForeign('CLAVE_ALUMNO_INSCRITO_FK');
            $table->dropForeign('CLAVE_CURSO_FK');
        });
    }
};
