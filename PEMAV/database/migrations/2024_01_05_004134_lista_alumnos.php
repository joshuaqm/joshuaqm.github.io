<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListaAlumnos extends Migration
{
    public function up(): void
    {
        Schema::create('lista_alumnos', function (Blueprint $table) {
            $table->id('id_lista_alumnos');
            $table->bigInteger('id_grupo')->unsigned();
            $table->bigInteger('id_alumno')->unsigned();

            $table->foreign('id_grupo')->references('id_grupo')->on('grupos')->onDelete('cascade');
            $table->foreign('id_alumno')->references('id_alumno')->on('alumnos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lista_alumnos');
    }
}
