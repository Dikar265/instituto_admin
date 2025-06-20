<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AlterHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('horarios', function (Blueprint $table) { //nombre d tabla
            $table->foreign('sede_id') 
                ->references('id')
                ->on('sedes') 
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('carrera_id')
                ->references('id')
                ->on('carreras')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->foreign('anio_id')
                ->references('id')
                ->on('anios')
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
        Schema::table('horarios', function (Blueprint $table) {
            $table->dropForeign('horarios_sede_id_foreign');
            $table->dropForeign('horarios_carrera_id_foreign');
            $table->dropForeign('horarios_anio_id_foreign');
            $table->dropForeign('horarios_materia_id_foreign');
        });
    }
}
