<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProDesaTecnologico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pro_desa_tecnologico',function(Blueprint $table){
        $table->UnsignedInteger('id_producto')->unique();
        $table->foreign('id_producto')->references('id_producto')->on('producto')->delete('cascade');
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
        Schema::dropIfExists('pro_desa_tecnologico');
    }
}
