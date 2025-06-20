<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSedetelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * //AYLEN
     */
    public function up()
    {
        Schema::table('sedetelefonos', function (Blueprint $table) {
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
        Schema::table('sedetelefonos', function (Blueprint $table) {
            $table->dropForeign('sedetelefonos_sede_id_foreign');
        });
    }
}
