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
        Schema::create('grupos', function (Blueprint $table) {
            $table->string('CLAVE_GRUPO', 40)->primary();
            $table->string('CLAVE_SALON_IMPARTE', 40)->index('CLAVE_SALON_IMPARTE_FK');
            $table->decimal('NO_ALUMNOS', 30, 0);
            $table->decimal('AVANCE_GRUPO', 10, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
};
