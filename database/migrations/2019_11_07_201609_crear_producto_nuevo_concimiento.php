<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProductoNuevoConcimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_nuevo_concimiento',function(Blueprint $table){
        $table->UnsignedInteger('id_producto')->unique();
        $table->foreign('id_producto')->references('id_producto')->on('producto')->delete('cascade');
        $table->UnsignedInteger('id_tipo_pnc')->unique();
        $table->foreign('id_tipo_pnc')->references('id')->on('tipo_pnc')->delete('cascade');
        $table->primary('id_producto');

        
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_nuevo_concimiento');
    }
}
