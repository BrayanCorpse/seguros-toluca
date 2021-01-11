<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $table = "modelos";
    protected $fillable = ["id","modelo"];
    public $timestamps = false;
    protected $guard = ["id"];

    function autos(){
    	return $this->hasMany('App\Autos');
    }
}
