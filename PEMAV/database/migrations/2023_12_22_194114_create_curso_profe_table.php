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
        Schema::create('curso_profe', function (Blueprint $table) {
            $table->string('CLAVE_CURSO_IMPARTIDO', 40)->index('CLAVE_CURSO_IMPARTIDO_FK');
            $table->string('CLAVE_PROFE_IMPARTE', 40)->index('CLAVE_PROFE_IMPARTE_FK');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_profe');
    }
};
