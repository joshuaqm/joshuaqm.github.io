<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Asignatura extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignatura', function (Blueprint $table) {
            $table->id('id_asignatura');
            //$table->bigInteger('id_examen')->unsigned()->nullable();
            $table->string('nombre_asignatura');

            // Definición de la clave foránea
            //$table->foreign('id_examen')->references('id_examen')->on('calificaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignatura');
    }
}
