<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProyectoLinea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      schema::create('proyecto_linea',function(Blueprint $table){
            
            $table -> unsignedInteger('id_proy')->index();
            $table->foreign('id_proy')->references('id')->on('proyecto')->delete('cascade');
           $table -> unsignedInteger('id_linea')->unique();
            $table->foreign('id_linea')->references('id')->on('linae_investigacion')->delete('cascade');
            $table->primary(array('id_proy', 'id_linea'));  
            $table->String('respuesta',8);     
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_linea');
    }
}
