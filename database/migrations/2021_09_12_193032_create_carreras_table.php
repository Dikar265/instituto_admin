<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//php artisan make:model Carrera --all
class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up() {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();            
            $table->string('carrera', 255)
                    ->onDelete('cascade')
                    ->onUpdate('cascade');  });

        Schema::table('noticias', function (Blueprint $table) {
            $table->bigInteger('carrera_id')->unsigned()->nullable();
            $table->foreign('carrera_id')
                    ->references('id')
                    ->on('carreras')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');  });   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('noticias', function (Blueprint $table) {
           $table->dropForeign('noticias_carrera_id_foreign');
         });
        Schema::dropIfExists('carreras');   }
}
