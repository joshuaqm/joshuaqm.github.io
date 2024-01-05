<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListaAlumnos extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lista_alumnos', function (Blueprint $table) {
            // Definición de las columnas como claves foráneas
            $table->bigInteger('id_grupo')->unsigned();
            $table->bigInteger('id_alumno')->unsigned();

            // Definición de las claves foráneas
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
            $table->foreign('id_alumno')->references('id_alumno')->on('alumnos')->onDelete('cascade'); // Modifica 'alumno' a 'alumnos'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_alumnos');
    }
}
