<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->biginteger('sede_id')->unsigned()->nullable();
            $table->biginteger('carrera_id')->unsigned()->nullable();
            $table->biginteger('anio_id')->unsigned()->nullable();
            $table->biginteger('materia_id')->unsigned()->nullable();
            $table->biginteger('comision_id')->unsigned()->nullable();
            $table->biginteger('profesor_id')->unsigned()->nullable();
            $table->string('nombrearchivo')->nullable( );
            $table->string('ruta',255)->nullable( ) ;
            $table->date('fechaentrega');
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
        Schema::dropIfExists('programas');
    }
}
