<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    protected $primaryKey='num_documento';
    public $timestamps = false;

    public function reconocimiento(){
    	return $this->belongsTo(ReconocimientoColciencias::class,'id_rec_colc');
    }

    public function docente(){
    	return $this->hasOne(Docente::class);
    }


}
