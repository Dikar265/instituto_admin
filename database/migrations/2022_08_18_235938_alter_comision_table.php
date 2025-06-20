<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//php artisan make:model Carrera --all
class AlterComisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('comisions', function (Blueprint $table) { //nombre d tabla
            $table->foreign('sede_id')//nombre fk 
                ->references('id')
                ->on('sedes')// nombre d la otra tabla
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('carrera_id')
                ->references('id')
                ->on('carreras')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('materia_id')
                ->references('id')
                ->on('materias')
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
        Schema::table('comisions', function (Blueprint $table) {
            $table->dropForeign('comisions_sede_id_foreign');
            $table->dropForeign('comisions_carrera_id_foreign');
            if (Schema::hasColumn('comisions', 'materia_id')) {            
             $table->dropForeign('comisions_materia_id_foreign');
            }
        });
    }
}
