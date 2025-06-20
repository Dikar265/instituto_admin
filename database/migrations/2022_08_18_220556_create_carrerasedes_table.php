<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrerasedes', function (Blueprint $table) {
            $table->id();
            $table->biginteger('sede_id')->unsigned()->nullable();
            $table->biginteger('carrera_id')->unsigned()->nullable();
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
        Schema::dropIfExists('carrerasedes');
    }
}
