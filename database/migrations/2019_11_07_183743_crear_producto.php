<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto',function(Blueprint $table){
            $table->increments('id_producto');
            $table->UnsignedInteger('id_tipo_producto');
            $table->foreign('id_tipo_producto')->references('id_tipo_producto')->on('tipo_producto')->delete('cascade');
            $table->UnsignedInteger('id_proyecto');
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->delete('cascade');
                        
            $table->String('titulo',50);      
            $table -> date('fecha_publicacion')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
