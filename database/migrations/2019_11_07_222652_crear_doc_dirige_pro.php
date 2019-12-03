<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearDocDirigePro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       schema::create('doc_dirige_pro',function(Blueprint $table){
            $table -> String('num_documento',20)->index();
            $table->foreign('num_documento')->references('num_documento')->on('docente')->delete('cascade');
            $table -> unsignedInteger('id_proy');
            $table->foreign('id_proy')->references('id')->on('proyecto')->delete('cascade');
            $table -> date('fecha_inicio');
            $table -> date('fecha_retiro');
            $table->primary(array('num_documento', 'id_proy', 'fecha_inicio'));       
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_dirige_pro');
    }
}
