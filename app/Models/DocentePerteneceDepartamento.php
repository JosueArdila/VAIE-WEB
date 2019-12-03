<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocentePerteneceDepartamento extends Model
{
    protected $table='doc_pertenece_dep';

    public $timestamps = false;

    public function docente(){
    	return $this->belongsTo(Docente::class,'num_documento');
    }

    public function departamento(){
    	return $this->belongsTo(Departamento::class,'id_depar');
    }
}
