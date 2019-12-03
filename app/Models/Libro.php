<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table='libro';
    public $timestamps = false; 
    protected $primaryKey='id_producto';
}
