<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table='docente';
    public $timestamps = false;
    protected $primaryKey = 'num_documento';

    public function persona(){
    	return $this->hasOne(Persona::class,'num_documento');
    }

    public function DocenteDirecGrupo(){
    	return $this->hasMany(DocenteDirectorGrupo::class);
    }

    public function DocentePerteneceGrupo(){
    	return $this->hasMany(DocentePerteneceGrupo::class);
    }

}
