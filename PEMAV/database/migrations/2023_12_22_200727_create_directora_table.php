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
        Schema::create('directora', function (Blueprint $table) {
            $table->string('CLAVE_DIRECTORA', 40)->primary();
            $table->string('CLAVE_PERMISO_PAGINA', 40)->index('CLAVE_PERMISO_PAGINA_FK');
            $table->string('NOMBRE', 40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directora');
    }
};
