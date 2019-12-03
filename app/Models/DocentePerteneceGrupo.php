<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocentePerteneceGrupo extends Model
{
    protected $table='doc_pertenece_gru';

    public $timestamps = false;

    public function docente(){
    	return $this->belongsTo(Docente::class,'num_documento');
    }

    public function grupo(){
    	return $this->belongsTo(Grupo::class,'id_grupo');
    }
}
