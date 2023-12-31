<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Grupos extends Migration
{
    public function up(): void
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id('id_grupo');
            $table->bigInteger('id_asignatura')->unsigned();
            $table->bigInteger('id_profesor')->unsigned();
            $table->string('salon');
            $table->time('horario_inicio');
            $table->time('horario_fin');
            $table->json('dias_seleccionados')->nullable();

            $table->foreign('id_asignatura')->references('id_asignatura')->on('asignatura')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
}
