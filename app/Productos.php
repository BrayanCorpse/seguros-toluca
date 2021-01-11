<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $fillable = ['id','nombre','existencia','costo','descripcion','foto'];
    public $timestamps = false;
}
