<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AsignarDocenteDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          schema::create('doc_pertenece_dep',function(Blueprint $table){
            $table -> String('num_documento',20)->index();
            $table->foreign('num_documento')->references('num_documento')->on('docente')->delete('cascade');
            $table -> unsignedInteger('id_depar');
            $table->foreign('id_depar')->references('id')->on('departamento')->delete('cascade');
            $table -> date('fecha_inicio');
            $table -> date('fecha_retiro')->nullable();
            $table->primary(array('num_documento','id_depar','fecha_inicio'));       
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_pertenece_dep');
    }
}
