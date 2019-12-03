<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table='articulo';
    public $timestamps = false; 
    protected $primaryKey='id_producto';
}
