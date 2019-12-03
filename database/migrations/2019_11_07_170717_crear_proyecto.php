<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto',function(Blueprint $table){
            $table->increments('id');
            $table->UnsignedInteger('id_tipo_finaciacion');
            $table->foreign('id_tipo_finaciacion')->references('id')->on('tipo_proyecto_financiacion')->delete('cascade');
            $table->UnsignedInteger('id_impacto_general');
            $table->foreign('id_impacto_general')->references('id')->on('impacto_general')->delete('cascade');
            $table->UnsignedInteger('id_impacto_directo');            
            $table->foreign('id_impacto_directo')->references('id')->on('impacto_directo')->delete('cascade');
            $table->UnsignedInteger('id_evalu_impacto');
            $table->foreign('id_evalu_impacto')->references('id')->on('evalu_impacto')->delete('cascade');             
            $table->String('nombre',50);      
            $table->String('descripcion',3500); 
            $table->String('tipo_proyecto',50); 
            $table->double('monto_financiacion')->nullable();
            $table -> date('fecha_inicio');
            $table -> date('fecha_retiro')->nullable();
            $table->boolean('formacion_joven_investigador')->nullable();
            $table->String('numero_convo_ji',50)->nullable(); 
            $table->String('poblacion_beneficiada',)->nullable();
            $table->String('alianza',64)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}
