<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table='facultad';

    public $timestamps = false;

     public function departamentos(){
    	return $this->hasMany(Departamento::class);
    }

      public function programas(){
    	return $this->hasMany(Programa::class);
    }
}
