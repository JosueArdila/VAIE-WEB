<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table='grupo';

    public $timestamps = false;

      public function departamento(){
    	return $this->belongsTo(Departamento::class,'id_departamento');
    }

    public function DocenteDirecGrupo(){
    	return $this->hasMany(DocenteDirectorGrupo::class);
    }

    public function DocentePerteneceGrupo(){
    	return $this->hasMany(DocentePerteneceGrupo::class);
    }
}
