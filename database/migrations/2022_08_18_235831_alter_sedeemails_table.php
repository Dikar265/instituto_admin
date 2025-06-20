<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSedeemailsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('sedeemails', function (Blueprint $table) {
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
        Schema::table('sedeemails', function (Blueprint $table) {
            $table->dropForeign('sedeemails_sede_id_foreign');
        });
    }
}
