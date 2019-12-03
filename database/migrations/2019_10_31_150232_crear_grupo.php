<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo',function(Blueprint $table){
            $table->increments('id');
            $table->UnsignedInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('departamento')->delete('cascade');
            $table->String('cod_colciencias',16);  
            $table->String('nombre',50);      
            $table->String('descripcion',300);
                        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo');
    }
    
}
