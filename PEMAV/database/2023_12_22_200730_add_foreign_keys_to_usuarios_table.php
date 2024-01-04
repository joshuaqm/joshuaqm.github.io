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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign(['CLAVE_USUARIO_ALU'], 'CLAVE_USUARIO_ALU_FK')->references(['CLAVE_ALUMNO'])->on('alumnos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['CLAVE_USUARIO_DIRECTORA'], 'CLAVE_USUARIO_DIRECTORA_FK')->references(['CLAVE_DIRECTORA'])->on('directora')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['CLAVE_USUARIO_PROFE'], 'CLAVE_USUARIO_PROFE_FK')->references(['CLAVE_PROF'])->on('profesores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('CLAVE_USUARIO_ALU_FK');
            $table->dropForeign('CLAVE_USUARIO_DIRECTORA_FK');
            $table->dropForeign('CLAVE_USUARIO_PROFE_FK');
        });
    }
};
