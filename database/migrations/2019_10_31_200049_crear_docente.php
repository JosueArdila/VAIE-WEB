<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearDocente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('docente',function(Blueprint $table){
            $table -> String('num_documento',20)->unique();
            $table->primary('num_documento');
            $table->foreign('num_documento')->references('num_documento')->on('persona')->delete('cascade');
            $table -> String('codigo',20);
            $table -> date('fecha_vin_gruplac')->nullable();           
            $table -> String('contrasena',16);
            $table -> String('contrasena_director',16)->nullable();     
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
