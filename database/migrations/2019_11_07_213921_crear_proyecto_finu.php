<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProyectoFinu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_finu',function(Blueprint $table){
            $table->UnsignedInteger('id_proyecto')->unique();
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->delete('cascade');
            $table->primary('id_proyecto'); 
            $table -> year('ano_convocatoria');
            $table->String('numero_convocatoria',64);      
                          

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_finu');
    }
}
