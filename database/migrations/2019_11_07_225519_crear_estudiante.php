<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearEstudiante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('estudiante',function(Blueprint $table){
            $table -> String('cedula',20)->unique();
            $table->primary('cedula');
            $table->foreign('cedula')->references('num_documento')->on('persona')->delete('cascade');
            $table -> unsignedInteger('id_programa');
            $table->foreign('id_programa')->references('id')->on('programa')->delete('cascade');
            $table -> String('codigo',20);
              $table -> integer('semestre');      
            $table -> String('contrasena',16);   
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante');
    }
}
