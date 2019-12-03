<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearLinaeInvestigacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('linae_investigacion',function(Blueprint $table){
            $table->increments('id');
                       $table->unsignedInteger('id_grupo');  
            $table->foreign('id_grupo')->references('id')->on('grupo')->delete('cascade');  
             $table->String('nombre',64);           

        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linae_investigacion');
    }
}
