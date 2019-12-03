<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        schema::create('persona',function(Blueprint $table){
            $table -> String('tipo_documento',20);
            $table -> String('num_documento',20);
            $table->primary('num_documento');
            $table->unsignedInteger('id_rec_colc');
            $table->foreign('id_rec_colc')->references('id')->on('reconocimiento_colc')->delete('cascade');
            $table -> String('primer_nombre',20);
            $table -> String('segundo_nombre',20);
            $table -> String('primer_apellido',20);
            $table -> String('segundo_apellido',20);
            $table -> String('correo',50);
            $table -> String('link_hoja_cvlac',100)->nullable();
            $table -> String('enl_cod_orcid',100)->nullable();
            $table -> String('enlace_researchgate',100)->nullable();
            $table -> String('enlace_google_academico',100)->nullable();



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
