<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCarrerasedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('carrerasedes', function (Blueprint $table) { 
            $table->foreign('carrera_id') 
                ->references('id')
                ->on('carreras') 
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::table('carrerasedes', function (Blueprint $table) {
            $table->dropForeign('carrerasedes_carrera_id_foreign');
            $table->dropForeign('carrerasedes_sede_id_foreign');
        }); 
    }
}
