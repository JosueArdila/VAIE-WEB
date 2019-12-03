<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VincularDocente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          schema::create('doc_pertenece_gru',function(Blueprint $table){
            $table -> String('num_documento',20)->index();
            $table->foreign('num_documento')->references('num_documento')->on('docente')->delete('cascade');
            $table -> unsignedInteger('id_grupo');
            $table->foreign('id_grupo')->references('id')->on('grupo')->delete('cascade');
            $table -> date('fecha_inicio');
            $table -> date('fecha_retiro')->nullable();
            $table->primary(array('num_documento', 'id_grupo', 'fecha_inicio'));       
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_pertenece_gru');
    }
}
