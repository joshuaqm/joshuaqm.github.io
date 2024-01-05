<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Grupos extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id('id_grupo');
            $table->bigInteger('id_asignatura')->unsigned(); // Asignatura debe ser un tipo compatible con id_usuario en usuarios
            $table->bigInteger('id_profesor')->unsigned(); // Profesor debe ser un tipo compatible con id_usuario en usuarios
            $table->string('salon');

            // Definición de las claves foráneas
            $table->foreign('id_asignatura')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
}
