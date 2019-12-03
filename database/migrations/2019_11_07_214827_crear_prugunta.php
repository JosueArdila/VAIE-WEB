<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPrugunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('prugunta',function(Blueprint $table){
            $table->increments('id_pregunta');
            $table->UnsignedInteger('id_categoria');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria')->delete('cascade');            
            $table->String('nombre',128);                     
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prugunta');
    }
}
