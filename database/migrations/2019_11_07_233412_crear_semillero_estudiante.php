<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearSemilleroEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('semillero_estudiante',function(Blueprint $table){
            $table -> String('cedula',20)->index();
            $table->foreign('cedula')->references('cedula')->on('estudiante')->delete('cascade');
            $table -> unsignedInteger('id_semi');
            $table->foreign('id_semi')->references('id')->on('semillero')->delete('cascade');
            $table -> date('fecha_inicio');
            $table -> date('fecha_retiro')->nullable();
            $table->primary(array('cedula', 'id_semi', 'fecha_inicio'));       
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semillero_estudiante');
    }
}
