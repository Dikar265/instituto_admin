<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('anios');
            $table->string ('resolucion', 50); 
            $table->string ('texto',3000);
            $table->string ('imagen', 255);
            $table->string('nombre_carpeta', 120);
            $table->timestamps();
        }); 
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carreras');
    }
}
