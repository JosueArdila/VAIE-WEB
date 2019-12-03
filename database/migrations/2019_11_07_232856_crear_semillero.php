<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearSemillero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semillero',function(Blueprint $table){
            $table->increments('id');
            $table->UnsignedInteger('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupo')->delete('cascade');
            $table->String('nombre',50);      
            $table->String('descripcion',50);            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semillero');
    }
}
