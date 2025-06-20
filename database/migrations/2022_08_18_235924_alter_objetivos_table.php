<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('objetivos', function (Blueprint $table) {
            $table->foreign('sede_id')
            ->references('id')
            ->on('sedes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('objetivos', function (Blueprint $table) {
            $table->dropForeign('objetivos_sede_id_foreign');
        });
    }
}
