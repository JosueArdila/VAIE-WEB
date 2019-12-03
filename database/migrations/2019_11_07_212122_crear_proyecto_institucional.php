<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProyectoInstitucional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('proyecto_institucional',function(Blueprint $table){
            $table->UnsignedInteger('id_proyecto')->unique();
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->delete('cascade');
            $table->primary('id_proyecto'); 
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_institucional');
    }
}
