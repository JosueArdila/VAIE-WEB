<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocenteDirectorGrupo extends Model
{
    protected $table='doc_dirige_gru';
    public $timestamps = false; 
    //Cuando la llave primaria es distinta a 'id' debemos especificarla aca   
    protected $primaryKey = 'id_grupo';
    
    public function docente(){
    	return $this->belongsTo(Docente::class,'num_documento');
    }

    public function grupo(){
    	return $this->belongsTo(Grupo::class,'id_grupo');
    }
}
