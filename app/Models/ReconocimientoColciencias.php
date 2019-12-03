<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReconocimientoColciencias extends Model
{
    protected $table='reconocimiento_colc';

    public $timestamps = false;

    public function personas(){
    	return $this->hasMany(Persona::class);
    }
}
