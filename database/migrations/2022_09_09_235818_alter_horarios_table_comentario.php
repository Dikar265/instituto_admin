<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//composer require doctrine/dbal
class AlterHorariosTableComentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('horarios', function (Blueprint $table) { //nombre d tabla
            $table->string('comentario',255)->nullable()->change();
        });

        if (Schema::hasColumn('horarios', 'duracion')) {
            Schema::table('horarios', function($table) {
                $table->dropColumn('duracion');       
            }); }
     

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->string('comentario',255)->nullable(false)->change();
        });
    }
}
