<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = "detalles_autos";
    protected $fillable = ["id","detalle"];
    public $timestamps = false;
    protected $guarded = ['id'];

    function autos(){
    	return $this->hasMany('App\Autos');
    }
}
