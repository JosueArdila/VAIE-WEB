<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoNuevoConocimiento extends Model
{
    protected $table='producto_nuevo_concimiento';
    public $timestamps = false; 
    protected $primaryKey='id_producto';
}
