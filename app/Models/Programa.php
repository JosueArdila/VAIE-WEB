<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table='programa';

    public $timestamps = false;

     public function facultad(){
    	return $this->belongsTo(Facultad::class,'id_facultad');
    }
}
