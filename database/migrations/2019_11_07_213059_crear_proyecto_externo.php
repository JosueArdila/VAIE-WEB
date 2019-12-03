<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProyectoExterno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('proyecto_externo',function(Blueprint $table){
            $table->UnsignedInteger('id_proyecto')->unique();
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->delete('cascade');
            $table->primary('id_proyecto'); 
            $table -> year('ano_convocatoria');
            $table->String('nombre_convocatoria',128);      
            $table->String('entidad_patronizadora',128)->nullable(); 
            $table->String('entidad_participantes',128)->nullable(); 
                       

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_externo');
    }
}
