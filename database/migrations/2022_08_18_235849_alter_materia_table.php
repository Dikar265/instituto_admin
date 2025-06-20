<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * Aylen
     */
    public function up()
    {
        Schema::table('materias', function (Blueprint $table) {
            $table->foreign('carrera_id')//nombre fk 
            ->references('id')
            ->on('carreras')// nombre d la otra tabla
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('anio_id')//nombre fk 
            ->references('id')
            ->on('anios')// nombre d la otra tabla
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('profesor_id')//nombre fk 
            ->references('id')
            ->on('profesors')// nombre d la otra tabla
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
        Schema::table('materias', function (Blueprint $table) {
            $table->dropForeign('materias_carrera_id_foreign');
            $table->dropForeign('materias_anio_id_foreign');
            $table->dropForeign('materias_profesor_id_foreign');
        });
    }
}
