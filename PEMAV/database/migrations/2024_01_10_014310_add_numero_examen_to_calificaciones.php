<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumeroExamenToCalificaciones extends Migration
{
    public function up()
    {
        Schema::table('calificaciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_asignatura')->after('id_examen');
            $table->unsignedBigInteger('id_alumno')->after('id_asignatura');
            $table->integer('numero_examen')->after('id_alumno')->nullable();

            $table->foreign('id_asignatura')->references('id_asignatura')->on('asignatura');
            $table->foreign('id_alumno')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('calificaciones', function (Blueprint $table) {
            $table->dropForeign(['id_asignatura']);
            $table->dropForeign(['id_alumno']);
            $table->dropColumn(['numero_examen', 'id_alumno', 'id_asignatura']);
        });
    }
}
