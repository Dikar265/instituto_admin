<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteMateriaComisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('comisions', 'materia_id')) {
            Schema::table('comisions', function($table) {
                $table->dropForeign('comisions_materia_id_foreign');                
                $table->dropColumn('materia_id');       
            }); }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('comisions', 'materia_id')) {
            Schema::table('comisions', function($table) {
                $table->dropForeign('comisions_materia_id_foreign');                
                $table->dropColumn('materia_id');       
            });
      }
    }
}
