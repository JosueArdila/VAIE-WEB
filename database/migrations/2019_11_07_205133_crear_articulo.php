<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('articulo',function(Blueprint $table){
            $table->UnsignedInteger('id_producto')->unique();
            $table->foreign('id_producto')->references('id_producto')->on('producto_nuevo_concimiento')->delete('cascade');
            $table->primary('id_producto'); 
            $table->String('tipo_articulo',16); 
            $table->String('nombre_revista',64)->nullable(); 
            $table->String('issn',32)->nullable();
            $table->String('ambito_revista',16)->nullable();
            $table->String('link_articulo',50)->nullable(); 
            }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}
