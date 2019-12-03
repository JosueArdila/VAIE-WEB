<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('departamento',function(Blueprint $table){
            $table->increments('id');
            $table->String('nombre',200); 
            $table->unsignedInteger('id_facultad');  
            $table->foreign('id_facultad')->references('id')->on('facultad')->delete('cascade');
                        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamento');
    }
}
