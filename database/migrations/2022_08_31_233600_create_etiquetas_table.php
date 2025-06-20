<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateEtiquetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('etiquetas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('descripcion', 512);
            $table->timestamps();    });
//Creamos la tabla para la relación muchos a muchos 
    Schema::create('noticias_etiquetas', function (Blueprint $table) {
            $table->bigInteger('noticia_id')->unsigned();
            $table->foreign('noticia_id')
                    ->references('id')
                    ->on('noticias')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');            
            $table->bigInteger('etiqueta_id')->unsigned();
            $table->foreign('etiqueta_id')
                    ->references('id')
                    ->on('etiquetas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');            
            $table->bigInteger('user_id')->unsigned()->default(1);
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');            
            $table->timestamps(); });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias_etiquetas');
        Schema::dropIfExists('etiquetas');
    }
}
