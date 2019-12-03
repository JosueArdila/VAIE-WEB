<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamento';

    public $timestamps = false;

    public function facultad(){
    	return $this->belongsTo(Facultad::class,'id_facultad');
    }
}
