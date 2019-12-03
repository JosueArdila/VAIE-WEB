<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearEstParticipaProye extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       schema::create('est_participa_proye',function(Blueprint $table){
            $table -> String('ced_est',20)->index();
            $table->foreign('ced_est')->references('cedula')->on('estudiante')->delete('cascade');
            $table -> unsignedInteger('id_proy');
            $table->foreign('id_proy')->references('id')->on('proyecto')->delete('cascade');
            $table -> date('fecha_inicio');
            $table -> date('fecha_retiro')->nullable();
            $table->primary(array('ced_est', 'id_proy', 'fecha_inicio'));       
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('est_participa_proye');
    }
}
