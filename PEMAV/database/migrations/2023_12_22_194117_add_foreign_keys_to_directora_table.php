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
        Schema::table('directora', function (Blueprint $table) {
            $table->foreign(['CLAVE_PERMISO_PAGINA'], 'CLAVE_PERMISO_PAGINA_FK')->references(['CLAVE_PERMISO'])->on('control_escolar')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directora', function (Blueprint $table) {
            $table->dropForeign('CLAVE_PERMISO_PAGINA_FK');
        });
    }
};
