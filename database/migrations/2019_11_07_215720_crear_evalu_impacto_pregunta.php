<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearEvaluImpactoPregunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       schema::create('evalu_impacto_pregunta',function(Blueprint $table){
            
            $table -> unsignedInteger('id_evalu_impacto')->index();
            $table->foreign('id_evalu_impacto')->references('id')->on('evalu_impacto')->delete('cascade');
           $table -> unsignedInteger('id_pregunta')->unique();
            $table->foreign('id_pregunta')->references('id_pregunta')->on('prugunta')->delete('cascade');
            $table->primary(array('id_evalu_impacto', 'id_pregunta'));  
            $table->String('respuesta',8);      
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evalu_impacto_pregunta');
    }
}
