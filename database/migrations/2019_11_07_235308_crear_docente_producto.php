<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearDocenteProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      schema::create('docente_producto',function(Blueprint $table){
            $table -> String('dec_docen',20)->index();
            $table->foreign('dec_docen')->references('num_documento')->on('docente')->delete('cascade');
            $table -> unsignedInteger('id_produc');
            $table->foreign('id_produc')->references('id_producto')->on('producto')->delete('cascade');
            $table->primary(array('dec_docen', 'id_produc'));       
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_producto');
    }  //
    

    
}
