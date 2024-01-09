<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->unsignedBigInteger('lista_alumnos')->nullable();

            // Definir la clave foránea
            $table->foreign('lista_alumnos')
                  ->references('id_lista_alumnos')
                  ->on('lista_alumnos')
                  ->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->dropForeign(['lista_alumnos']);
            $table->dropColumn('lista_alumnos');
        });
    }
};
