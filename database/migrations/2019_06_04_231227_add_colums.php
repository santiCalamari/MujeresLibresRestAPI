<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('respuestas', function (Blueprint $table) {
            $table->date('date_at')->nullable();
            $table->string('semaforo_activo')->nullable();
            $table->string('c_amarillas')->nullable();
            $table->string('c_naranjas')->nullable();
            $table->string('c_rojas')->nullable();           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('respuestas', function (Blueprint $table) {
            //
        });
    }
}
