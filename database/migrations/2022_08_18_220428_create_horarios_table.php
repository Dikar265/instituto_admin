<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /*
      Run the migrations.
      @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->biginteger('sede_id')->unsigned()->nullable();
            $table->biginteger('carrera_id')->unsigned()->nullable();
            $table->biginteger('anio_id')->unsigned()->nullable();
            $table->biginteger('profesor_id')->unsigned()->nullable();
            $table->biginteger('materia_id')->unsigned()->nullable();
            $table->biginteger('comision_id')->unsigned()->nullable();
            $table->biginteger('dia')->unsigned()->nullable();
            $table->biginteger('modulohorario_id')->unsigned()->nullable();
            $table->biginteger('duracion');
            $table->string('comentario',255);
            $table->timestamps();             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
