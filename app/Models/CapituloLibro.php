<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CapituloLibro extends Model
{
    protected $table='capitulo_de_libro';
    public $timestamps = false; 
    protected $primaryKey='id_producto';
}
