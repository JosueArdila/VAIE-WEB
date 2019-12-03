<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearLibro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro',function(Blueprint $table){
            $table->UnsignedInteger('id_producto')->unique();
            $table->foreign('id_producto')->references('id_producto')->on('producto_nuevo_concimiento')->delete('cascade');
            $table->primary('id_producto'); 
            $table->String('isbn',32)->nullable(); 
            $table->String('ambito',16)->nullable(); 
            $table->String('editorial',64)->nullable();
            $table->String('nomero_capitulos',128);
            $table->integer('numero_paginas'); 
            
            }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro');
    }
}
