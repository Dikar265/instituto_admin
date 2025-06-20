<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up() {

        Schema::table('programas', function (Blueprint $table) {
         
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
            $table->foreign('comision_id')
                    ->references('id')
                    ->on('comisions')
                    ->onDelete('cascade')
                    ->onUpdate('cascade'); 
             $table->foreign('profesor_id')
                    ->references('id')
                    ->on('profesors')
                    ->onDelete('cascade')
                    ->onUpdate('cascade'); 
                });  
                 }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('programas', function (Blueprint $table) {
           $table->dropForeign('programas_sede_id_foreign');
           $table->dropForeign('programas_carrera_id_foreign');
           $table->dropForeign('programas_anio_id_foreign');
           $table->dropForeign('programas_materia_id_foreign');
           $table->dropForeign('programas_comision_id_foreign');
           $table->dropForeign('programas_profesor_id_foreign');
         });
}
}