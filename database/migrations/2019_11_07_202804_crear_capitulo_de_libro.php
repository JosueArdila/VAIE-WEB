<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearCapituloDeLibro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capitulo_de_libro',function(Blueprint $table){
            $table->UnsignedInteger('id_producto')->unique();
            $table->foreign('id_producto')->references('id_producto')->on('producto_nuevo_concimiento')->delete('cascade');
            $table->primary('id_producto'); 
            $table->String('isbn',32)->nullable(); 
            $table->String('ambito',16)->nullable(); 
            $table->String('editorial',64)->nullable();
            $table->integer('numero_paginas'); 
            $table->String('nombre_libro',128);
            });         
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capitulo_de_libro');
    }
}
